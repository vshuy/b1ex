<?php

namespace App\Http\Controllers;

use App\Models\dethi;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

class DethiController extends Controller
{
    public function getListDe()
    {
        $listde = dethi::all();
        return $listde->toJson();
    }
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

    public function createOneExam()
    {
        $dethi = new dethi();
        $dethi->name = "mot de thi";
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
}
