<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class SearchController extends Controller
{
    /**
     * Search video feature (tmp endpoint)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $term = $request->term;
        $data = Video::where('state', 'public')
            ->where('slug', '!=', '')
            ->where('filename', '!=', '')
            ->where('thumb', '!=', '')
            ->where(function ($query) use ($term) {
                $query->where('name', 'LIKE', '%' . $term . '%')
                    ->orWhere('description', 'LIKE', '%' . $term . '%');
            })
            ->take(10)
            ->orderByDesc('views_cache')
            ->get();

        $results = array();

        foreach ($data as $key => $v) {

            $results[] = ['id' => $v->id, 'value' => $v->name, 'slug' => $v->slug];
        }

        return response()->json($results);
    }
}
