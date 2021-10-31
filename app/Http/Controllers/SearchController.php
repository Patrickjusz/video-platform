<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchVideo;

class SearchController extends Controller
{
    use \App\Traits\MiddlewareToolsTrait;
    
    /**
     * Search video feature (tmp endpoint)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $results = SearchVideo::search($request->term);
        return response()->json($results);
    }
}
