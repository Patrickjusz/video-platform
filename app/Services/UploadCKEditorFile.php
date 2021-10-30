<?php

namespace App\Services;

use Illuminate\Http\Request;


interface Upload
{
    public static function upload(Request $request, string $destinationPath): string;
}

class UploadCKEditorFile implements Upload
{
    /**
     * Upload file from CKEditor 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  string $destinationPath
     * @return string
     */
    public static function upload(Request $request, string $destinationPath): string
    {
        $response = '';

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            // Adding slash at the end
            $destinationPath = (substr($destinationPath, -1) == '/') ?  $destinationPath : ($destinationPath . '/');

            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $file->move(public_path($destinationPath), $fileName);
            $CKEditorFuncNum = $CKEditorFuncNum;
            $url = asset($destinationPath . $fileName);
            $msg = 'Zdjęcie wgrane poprawnie';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        }

        return $response;
    }
}
