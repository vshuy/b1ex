<?php

namespace App\Http\Controllers;

use App\Models\dethi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartController extends Controller
{
    public function showListExam()
    {
        $listde = dethi::all();
        return view('dashboard', ['listde' => $listde]);
    }

    public function deleteAnExamById($idde)
    {
        DB::table('dethis')->where('id', '=', $idde)->delete();
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
    public function detailAnExam($idde)
    {
        $aExam = collect([
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '1'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '2'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '3.1'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '3.2'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '4'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '5'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '6'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '7'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '8'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '9'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '10'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '11'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '12'),
            $this->getPartInforByExamIdAndPartNameNoImg($idde, '13'),
        ]);
        //  return $aExam[0]['part'][0]->id;
        //  return $aExam[0]['questions'][0]->noidung_cauhoi;
        // return $aExam[9]['listPartDocumentArray'][0]->url;
        //    return $aExam[9];
        // return $aExam->toJson();
        return view('detailanexam', ['oneExam' => $aExam]);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
            ->join('tailieu_dapans', 'tailieu_dapans.dapan_id', '=', 'dapans.id')
            ->select('dapans.id', 'dapans.cauhoi_id', 'dapans.noidung_dapan', 'dapans.dapan', 'tailieu_dapans.url')
            ->whereIn('dapans.cauhoi_id', $idQuestionArray)
            ->get();
        $result = collect([
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listQuestionOfPart,
            "answers" => $listAnswerOfPart,
        ]);
        return $result;
    }
    public function getPartInforByExamIdAndPartNameNoImg($idde, $partName)
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
        $result = collect([
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listQuestionOfPart,
            "answers" => $listAnswerOfPart,
        ]);
        return $result;
    }

    public function getOneExamById($idde)
    {
        $oneExam = collect([
            "part1" => $this->getPartInforByExamIdAndPartName($idde, '1'),
            "part2" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '2'),
            "part3dot1" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '3.1'),
            "part3dot2" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '3.2'),
            "part4" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '4'),
            "part5" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '5'),
            "part6" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '6'),
            "part7" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '7'),
            "part8" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '8'),
            "part9" => $this->getPartInforByExamIdAndPartName($idde, '9'),
            "part10" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '10'),
            "part11" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '11'),
            "part12" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '12'),
            "part13" => $this->getPartInforByExamIdAndPartNameNoImg($idde, '13'),
        ]);
        return $oneExam;
    }

    public function getPart1ById($idde)
    {
        return $this->getPartInforByExamIdAndPartName($idde, '1');
    }
    public function getPart2ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '2');
    }
    public function getPart3dot1ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '3.1');
    }
    public function getPart3dot2ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '3.2');
    }
    public function getPart4ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '4');
    }
    public function getPart5ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '5');
    }
    public function getPart6ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '6');
    }
    public function getPart7ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '7');
    }
    public function getPart8ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '8');
    }
    public function getPart9ById($idde)
    {
        return $this->getPartInforByExamIdAndPartName($idde, '9');
    }
    public function getPart10ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '10');
    }
    public function getPart11ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '11');
    }
    public function getPart12ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '12');
    }
    public function getPart13ById($idde)
    {
        return $this->getPartInforByExamIdAndPartNameNoImg($idde, '13');
    }
}
