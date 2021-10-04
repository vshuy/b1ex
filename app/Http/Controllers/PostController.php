<?php

namespace App\Http\Controllers;

use App\loai_lythuyet;
use App\lythuyet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AutoImport\ReadSheetExcelForLyThuyet;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:exam-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:exam-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:exam-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exam-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost = DB::table('ly_thuyets')
            ->join('loai_lythuyets', 'loai_lythuyets.id', '=', 'ly_thuyets.loai_lythuyet_id')
            ->select('ly_thuyets.loai_lythuyet_id', 'loai_lythuyets.ten_loai', 'ly_thuyets.id', 'ly_thuyets.ten_lythuyet')
            ->get();
        return view('dashboardpost', ['listpost' => $listPost]);
    }
    public function listDocByIdCategory($idCategory)
    {
        $listPost = DB::table('ly_thuyets')
            ->join('loai_lythuyets', 'loai_lythuyets.id', '=', 'ly_thuyets.loai_lythuyet_id')
            ->select('ly_thuyets.loai_lythuyet_id', 'loai_lythuyets.ten_loai', 'ly_thuyets.id', 'ly_thuyets.ten_lythuyet')
            ->where('ly_thuyets.loai_lythuyet_id', $idCategory)
            ->get();
        return view('dashboardpost', ['listpost' => $listPost]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategories = loai_lythuyet::all();
        return view('uploaddocplus', ['listCategories' => $listCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namePost = $request->postname;
        $idCategory = $request->category;
        $contentPost = $request->editor1;
        $post = new lythuyet();
        $post->ten_lythuyet = $namePost;
        $post->noidung_lythuyet = $contentPost;
        $post->loai_lythuyet_id = $idCategory;
        $post->views = 0;
        $post->save();
        $HandleSheetOB = new ReadSheetExcelForLyThuyet();
        $HandleSheetOB->handleSheet($request, $post->id);
        return redirect()->route('dashboardpost');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ly_thuyets  $tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function show($idpost)
    {
        $aPost = DB::table('ly_thuyets')->find($idpost);
        $listQuestion = DB::table('cauhoi_lythuyets')
            ->where('cauhoi_lythuyets.lythuyet_id', $idpost)
            ->get();
        $idQuestionArray = [];
        foreach ($listQuestion as $aQuestion) {
            $idQuestionArray[] = $aQuestion->id;
        }
        $listAnswer = DB::table('dapan_cauhoi_lythuyets')
            ->whereIn('cauhoi_id', $idQuestionArray)
            ->get();
        return view('detailanpost', ['aPost' => $aPost, 'listQuestion' => $listQuestion, 'listAnswer' => $listAnswer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ly_thuyets  $tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function edit($idpost)
    {
        $aPost = DB::table('ly_thuyets')->find($idpost);
        return view('updatepost', ['aPost' => $aPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ly_thuyets  $tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('ly_thuyets')
            ->where('id', $request->idpost)
            ->update(['noidung_lythuyet' => $request->editor1, 'ten_lythuyet' => $request->postname]);
        return redirect()->route('dashboardpost');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ly_thuyets  $tailieu_ta
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpost)
    {
        DB::table('ly_thuyets')->where('id', '=', $idpost)->delete();
        return redirect()->route('dashboardpost');
    }
}
