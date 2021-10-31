<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CKEditorUpload;

class CKEditorController extends Controller
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
     * Upload image (CKEditor library).
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function upload(Request $request)
    {
        $response = CKEditorUpload::upload($request, 'upload/images');
        return response($response, 200, ['Content-Type => text/html']);
    }
}
