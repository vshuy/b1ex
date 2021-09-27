<?php

namespace App\Http\Controllers;

use App\Models\dethi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
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
        $listde = dethi::all();
        return view('dashboard', ['listde' => $listde]);
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
        $dethi = new dethi();
        $dethi->name = $request->exam_name;
        $dethi->save();
        $exam_id = $dethi->id;
        $this->exSavePartByExamIdAndPartName($exam_id, '1');
        $this->exSavePartByExamIdAndPartName($exam_id, '2');
        $this->exSavePartByExamIdAndPartName($exam_id, '3.1');
        $this->exSavePartByExamIdAndPartName($exam_id, '3.2');
        $this->exSavePartByExamIdAndPartName($exam_id, '4');
        $this->exSavePartByExamIdAndPartName($exam_id, '5');
        $this->exSavePartByExamIdAndPartName($exam_id, '6');
        $this->exSavePartByExamIdAndPartName($exam_id, '7');
        $this->exSavePartByExamIdAndPartName($exam_id, '8');
        $this->exSavePartByExamIdAndPartName($exam_id, '9');
        $this->exSavePartByExamIdAndPartName($exam_id, '10');
        $this->exSavePartByExamIdAndPartName($exam_id, '11');
        $this->exSavePartByExamIdAndPartName($exam_id, '12');
        $this->exSavePartByExamIdAndPartName($exam_id, '13');
        return redirect()->route('dashboard');
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
        DB::table('dethis')->where('id', '=', $id)->delete();
        return redirect()->route('dashboard');
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
            ->join('dethi_cauhois', 'dethi_cauhois.cauhoi_id', '=', 'cauhois.id')
            ->join('phans', 'phans.id', '=', 'cauhois.phan_id')
            ->select('cauhois.id', 'cauhois.phan_id', 'cauhois.noidung_cauhoi')
            ->where('dethi_cauhois.dethi_id', $idde)
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
    ////////////////////////////////////////////////////////////////////////help function for create exam/////////////////
    public function exSavePartByExamIdAndPartName($exam_id, $part_name) //ok notest this part
    {
        // $exam_id = 1;
        // $part_name = 1;
        $randomIdPart = DB::table('phans')
            ->select('phans.id')
            ->where('phans.name', '=', $part_name)
            ->inRandomOrder()
            ->limit(1)
            ->get();
        $tmpIdPart = $randomIdPart[0]->id;
        $listQuestion = DB::table('cauhois')
            ->select('cauhois.id')
            ->where('cauhois.phan_id', '=', $tmpIdPart)
            ->get();
        $listQuestionId = [];
        foreach ($listQuestion as $aItem) {
            $listQuestionId[] = [
                'dethi_id' => $exam_id,
                'cauhoi_id' => $aItem->id
            ];
        }
        DB::table('dethi_cauhois')->insert($listQuestionId);
        // return $listQuestionId;
    }
}
