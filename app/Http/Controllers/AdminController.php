<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use DataTables;
use Illuminate\Support\Facades\Storage;

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
                    $ret .= '<a href="javascript:void(0)" class="btn-action btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>';
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
        return view('admin.edit', ['video' => $video]);
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
            'views' => 'required|integer',
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
        }

        return redirect()->route('admin.index');
    }
}
