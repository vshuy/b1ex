<?php

namespace App\Http\Controllers;

use App\AutoImport\ReadSheetExcel;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        $HandleSheetOB = new ReadSheetExcel();
        $HandleSheetOB->handleSheet($request);
        return redirect()->route('dashboard');
    }
}
