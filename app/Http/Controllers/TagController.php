<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::where('state', 'public')->get();
        return view('admin.edit_tags_table', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = Tag::create([
            'name' => '',
            'slug' => '',
            'state' => 'public',
        ]);

        return redirect('edit_tags/' . $video->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.edit_tag', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $input = $request->all();

        if ($tag->update($input)) {
            Session::flash('status', 'Tag został zaktualizowane');
        }

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
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
}
