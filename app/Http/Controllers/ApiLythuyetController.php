<?php

namespace App\Http\Controllers;

use App\Models\lythuyet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiLythuyetController extends Controller
{
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
        return $listPost;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lythuyet  $lythuyet
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
        $aExam = collect([
            "detailLythuyet" => $aPost,
            "listQuestion" => $listQuestion,
            "listAnswer" => $listAnswer,
        ]);
        return $aExam;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lythuyet  $lythuyet
     * @return \Illuminate\Http\Response
     */
    public function edit(lythuyet $lythuyet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lythuyet  $lythuyet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lythuyet $lythuyet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lythuyet  $lythuyet
     * @return \Illuminate\Http\Response
     */
    public function destroy(lythuyet $lythuyet)
    {
        //
    }
}
