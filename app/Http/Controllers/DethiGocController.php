<?php

namespace App\Http\Controllers;

use App\Models\dethi_goc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DethiGocController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:exam-list|exam-create|exam-edit|exam-delete', ['only' => ['index', 'show']]);
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
        $listde = dethi_goc::all();
        return view('dashboardrootexam', ['listde' => $listde]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aExam = collect([
            $this->getPartInforByExamIdAndPartName($id, '1'),
            $this->getPartInforByExamIdAndPartName($id, '2'),
            $this->getPartInforByExamIdAndPartName($id, '3.1'),
            $this->getPartInforByExamIdAndPartName($id, '3.2'),
            $this->getPartInforByExamIdAndPartName($id, '4'),
            $this->getPartInforByExamIdAndPartName($id, '5'),
            $this->getPartInforByExamIdAndPartName($id, '6'),
            $this->getPartInforByExamIdAndPartName($id, '7'),
            $this->getPartInforByExamIdAndPartName($id, '8'),
            $this->getPartInforByExamIdAndPartName($id, '9'),
            $this->getPartInforByExamIdAndPartName($id, '10'),
            $this->getPartInforByExamIdAndPartName($id, '11'),
            $this->getPartInforByExamIdAndPartName($id, '12'),
            $this->getPartInforByExamIdAndPartName($id, '13'),
        ]);
        return view('detailanexam', ['oneExam' => $aExam]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('dethi_gocs')->where('id', '=', $id)->delete();
        return redirect()->route('dashboardrootexam');
    }

    public function getPartDocumentByQuestionId($questionId)
    {
        $tmpPartId = DB::table('cauhois')
            ->select('phan_id')
            ->where('id', '=', $questionId)
            ->limit(1)
            ->get();
        $anPartId = $tmpPartId[0]->phan_id;
        $listPartDoc = DB::table('tailieu_phans')
            ->join('kieu_tailieus', 'kieu_tailieus.id', '=', 'tailieu_phans.kieutailieu_id')
            ->select('kieu_tailieus.name', 'tailieu_phans.url')
            ->where('phan_id', '=', $anPartId)
            ->get();
        return $listPartDoc;
    }
    public function getPartInforByExamIdAndPartName($idde, $partName)
    {
        $listQuestionOfPart  = DB::table('cauhois')
            ->join('phans', 'phans.id', '=', 'cauhois.phan_id')
            ->select('cauhois.id', 'cauhois.phan_id', 'cauhois.noidung_cauhoi')
            ->where('cauhois.dethi_goc_id', $idde)
            ->where('phans.name', $partName)
            ->get();
        $idQuestionArray = [];
        foreach ($listQuestionOfPart as $aQuestion) {
            $idQuestionArray[] = $aQuestion->id;
        }
        $listPartDocumentArray = $this->getPartDocumentByQuestionId($idQuestionArray[0]);
        $listAnswerOfPart = DB::table('dapans')
            ->whereIn('cauhoi_id', $idQuestionArray)
            ->get();
        $idAnswerArray = [];
        foreach ($listAnswerOfPart as $aAnswer) {
            $idAnswerArray[] = $aAnswer->id;
        }
        $listDocumentOfPart = DB::table('tailieu_dapans')
            ->select('tailieu_dapans.dapan_id', 'tailieu_dapans.url')
            ->whereIn('dapan_id', $idAnswerArray)
            ->get();
        $result = collect([
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listQuestionOfPart,
            "answers" => $listAnswerOfPart,
            "document" => $listDocumentOfPart,
        ]);
        return $result;
    }
}
