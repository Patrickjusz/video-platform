<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class HomepageController extends Controller
{
    public function index()
    {
        $videos = Video::where('state', 'active')->orderByDesc('created_at')->get();

        return view('homepage', ['videos' => $videos]);
    }

    public function popular()
    {
        $videos = Video::where('state', 'active')->orderByDesc('views')->get();

        return view('homepage', ['videos' => $videos]);
    }
}
