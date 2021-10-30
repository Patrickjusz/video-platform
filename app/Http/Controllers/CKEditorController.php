<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadCKEditorFile;

class CKEditorController extends Controller
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
     * Upload image (CKEditor library).
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function upload(Request $request)
    {
        $response = UploadCKEditorFile::upload($request, 'upload/images');
        return response($response, 200, ['Content-Type => text/html']);
    }
}
