<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Video;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Video::select('*')->where('state', '!=', 'delete')->orderByDesc('created_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('thumb_html', function ($row) {
                    $ret = '<img src="' . Storage::url($row->thumb) . '" width="120">';
                    return $ret;
                })
                ->addColumn('description_short', function ($row) {
                    $ret = $row->description ? (substr($row->description, 0, 100) . '...') : '';
                    return $ret;
                })
                ->addColumn('created_at_format', function ($row) {
                    $ret = date_format($row->created_at, 'd-m-Y');
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
                ->rawColumns(['thumb_html', 'action'])
                ->make(true);
        }

        return view('admin.index');
    }


    /**
     * Show edit video form
     *
     * @return void
     */
    public function edit($id, Request $request)
    {
        $video = Video::findOrFail($id);
        $categories = Tag::where('state', '=', 'active')->pluck('name', 'id');
        return view('admin.edit', ['video' => $video, 'categories' => $categories]);
    }


    /**
     * Show edit video form
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'views_cache' => 'required|integer',
            'slug' => 'unique:videos,slug,' . $id . '|required',
            'state' => 'required',
            'description' => 'required',
        ]);


        $video = Video::findOrFail($id);
        $input = $request->all();
        $videoFile = $request->file('video_file') ?? false;
        $thumbFile = $request->file('thumb_file') ?? false;
        $toRemove = [];

        if (!empty($videoFile)) {
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

        if ($video->update($input)) {
            foreach ($toRemove as $file) {
                Storage::delete('public/' .  $file);
            }

            $tagsIds = $request->input('TagsList');
            $video->tags()->sync($tagsIds);


            Session::flash('status', 'Wideo zostało zaktualizowane');
        }

        return redirect()->route('admin.index');
    }


    /**
     * Show add video form
     *
     * @return void
     */
    public function add(Request $request)
    {
        $video = Video::create([
            'name' => '',
            'filename' => '',
            'thumb' => '',
            'views_cache' => 0,
            'slug' => '',
            'description' => '',
            'state' => 'inactive'
        ]);
        // $video = [];
        return redirect('edit/' . $video->id);
    }


    /**
     * Remove video form
     *
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


    /**
     * Show edit tags table
     *
     * @return void
     */
    public function editTagsTable(Request $request)
    {
        $tags = Tag::where('state', 'active')->get();
        return view('admin.edit_tags_table', ['tags' => $tags]);
    }


    /**
     * Show edit tag form
     *
     * @return void
     */
    public function editTag($id, Request $request)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.edit_tag', ['tag' => $tag]);
    }


    /**
     * Update tag
     *
     * @return void
     */
    public function updateTag($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'unique:tags,name,' . $id . '|required|max:255',
            'slug' => 'unique:tags,slug,' . $id . '|required|max:255'
        ]);

        $tag = Tag::findOrFail($id);
        $input = $request->all();

        if ($tag->update($input)) {
            Session::flash('status', 'Tag został zaktualizowane');
        }

        return redirect()->route('admin.editTagsTable');
    }


    /**
     * Remove tag
     *
     * @return void
     */
    public function removeTag(Request $request)
    {
        $input = $request->all();
        $video = Tag::findOrFail($input['id']);
        $video->state = 'delete';

        if ($video->save()) {
            Tag::removeTagsFromPivotTable($input['id']);
            Session::flash('status', 'Tag został usunięty');
            return response()->json(array('status' => 'success'), 200);
        }
    }


    /**
     * Show add video form
     *
     * @return void
     */
    public function addTag(Request $request)
    {
        $video = Tag::create([
            'name' => '',
            'slug' => '',
            'state' => 'active',
        ]);
        // $video = [];
        return redirect('edit_tags/' . $video->id);
    }
}
