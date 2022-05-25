<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $path = $request->file('upload')->store('datafordoc');
            ///////////////////////
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $msg = 'Image successfully uploaded';
            $host = $request->getSchemeAndHttpHost();
            $url = $host . "/" . $path;
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
