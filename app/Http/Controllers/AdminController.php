<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Video;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\UpdateVideoReqeuest;
use App\Services\Sitemap;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Video::select('*')->where('state', '!=', 'delete')->orderByDesc('created_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('thumb_html', function ($row) {
                    $ret = '<img src="' . url(Storage::url($row->thumb)) . '" width="120">';
                    return $ret;
                })
                ->addColumn('description_short', function ($row) {
                    // $ret = $row->seo_description ? (substr($row->seo_description, 0, 160) . '...') : '';
                    $ret = $row->seo_description;
                    return $ret;
                })
                ->addColumn('created_at_format', function ($row) {
                    $ret = date_format($row->created_at, 'd-m-Y');
                    return $ret;
                })
                ->addColumn('state', function ($row) {
                    $ret = $row->state;
                    switch ($row->state) {
                        case 'public':
                            $ret = '<span class="badge badge-success">Publiczny</span>';
                            break;
                        case 'not_public':
                            $ret = '<span class="badge badge-warning">Niepubliczny</span>';
                            break;
                        case 'private':
                            $ret = '<span class="badge badge-danger">Prywatny</span>';
                            break;
                    }

                    return $ret;
                })
                ->addColumn('action', function ($row) {
                    $ret = '';
                    if ($row->slug) {
                        $ret .= '<button onclick="window.open(\'' . $row->slug . '\',\'_blank\');" class="btn-action btn btn-success btn-sm"><i class="bi bi-eye"></i></button>';
                    }
                    $ret .=   '<button onclick="window.location.href = \'edit/' . $row->id . '\'" class="btn-action btn btn-primary btn-sm"><i class="bi bi-pencil"></i></button>';
                    $ret .= '<button onclick="removeVideo(' . $row->id . ');" class="btn-action btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>';
                    return $ret;
                })
                ->rawColumns(['thumb_html', 'action', 'state'])
                ->make(true);
        }

        return view('admin.index');
    }

    /**
     * Show edit video form.
     * 
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function edit($id, Request $request)
    {
        $video = Video::findOrFail($id);
        $categories = Tag::where('state', '=', 'public')->pluck('name', 'id');
        return view('admin.edit', ['video' => $video, 'categories' => $categories]);
    }

    /**
     * Update video model.
     * 
     * @param  int $id
     * @param  \App\Http\Requests\UpdateVideoReqeuest $request
     * @return void
     */
    public function update($id, UpdateVideoReqeuest $request)
    {
        $video = Video::findOrFail($id);
        $input = $request->all();
        $videoFile = $request->file('video_file') ?? false;
        $thumbFile = $request->file('thumb_file') ?? false;
        $toRemove = [];

        $seo_description = trim($request->input('seo_description') ?? '');
        if (empty($seo_description)) {
            $input['seo_description'] = htmlToString($request->input('description') ?? $video->description ?? '');
        }

        if (!empty($input['seo_keywords'])) {
            $input['seo_keywords']  = trim($input['seo_keywords']);
        }

        if (!empty($videoFile)) {
            ini_set('max_execution_time', 7200); //2h
            $videoNewPath =  $videoFile->store('videos', 'public');

            if ($videoNewPath) {
                $input['filename'] = $videoNewPath;
            }

            !empty($video->filename) ? $toRemove[] = $video->filename : false;
        }

        if (!empty($thumbFile)) {
            $thumbNewPath =  $thumbFile->store('thumbs', 'public');

            if ($thumbNewPath) {
                $input['thumb'] = $thumbNewPath;
            }

            !empty($video->thumb) ? $toRemove[] = $video->thumb : false;
        }

        $video->elapsed_time = timeElapsedString($video->created_at);

        if ($video->update($input)) {
            foreach ($toRemove as $file) {
                Storage::delete('public/' .  $file);
            }

            $videoDuration = $video->getDuration();
            if (!empty($videoDuration)) {
                $video->duration = $videoDuration;
                $video->save();
            }


            $tagsIds = $request->input('TagsList');
            $video->tags()->sync($tagsIds);

            Session::flash('status', 'Wideo zostało zaktualizowane');

            Sitemap::create();

            Artisan::call('cache:clear');
        }

        return redirect()->route('admin.index');
    }

    /**
     * Add new video.
     * 
     * @return void
     */
    public function add()
    {
        $video = Video::createEmpty();
        return redirect('edit/' . $video->id);
    }

    /**
     * Remove video.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function remove(Request $request)
    {
        $input = $request->all();
        $video = Video::findOrFail($input['id']);
        $video->state = 'delete';
        if ($video->save()) {
            return response()->json(array('status' => 'success'), 200);
        }
    }
}
