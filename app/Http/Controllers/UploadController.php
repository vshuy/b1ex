<?php

namespace App\Http\Controllers;

use App\AutoImport\ReadSheetExcel;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:exam-list|exam-create|exam-edit|exam-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:exam-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:exam-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exam-delete', ['only' => ['destroy']]);
    }
    public function store(Request $request)
    {
        $HandleSheetOB = new ReadSheetExcel();
        $HandleSheetOB->handleSheet($request);
        return redirect()->route('dashboard');
    }
    public function create()
    {
        return view('uploadfile');
    }
}
