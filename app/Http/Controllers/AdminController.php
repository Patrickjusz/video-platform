<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Http\Requests\UpdateVideoReqeuest;

class AdminController extends Controller
{
    use \App\Traits\MiddlewareToolsTrait;

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
        // The logic is in API endpoint and Javascript (Datatables and Ajax) 
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
        Video::updateVideo($id, $request);
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
