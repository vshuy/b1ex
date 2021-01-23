<?php

namespace App\Http\Controllers;

use App\Models\dethi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class PartController extends Controller
{
    public function getRandomIdDe()
    {
        $randomidade  = DB::table('dethis')
            ->inRandomOrder()
            ->limit(1)
            ->get();
        //echo "Values of arr is :" . $randomidade[0]->id;
        return $randomidade[0]->id;
    }
    public function getRandomAnExam()
    {
        $oneRandomExam = [
            "part1" => $this->getPart1(),
            "part2" => $this->getPart2(),
            "part3dot1" => $this->getPart3dot1(),
            "part3dot2" => $this->getPart3dot2(),
            "part4" => $this->getPart4(),
            "part5" => $this->getPart5(),
            "part6" => $this->getPart6(),
            "part7" => $this->getPart7(),
            "part8" => $this->getPart8(),
            "part9" => $this->getPart9(),
            "part10" => $this->getPart10(),
            "part11" => $this->getPart11(),
            "part12" => $this->getPart12(),
            "part13" => $this->getPart13(),
        ];
        dd($oneRandomExam);
        return $oneRandomExam;
    }
    public function getPart1()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 1)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart2()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 2)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart3dot1()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 3.1)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart3dot2()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 3.2)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart4()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 4)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart5()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 5)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart6()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 6)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart7()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 7)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart8()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 8)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart9()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 9)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart10()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 10)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart11()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 11)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart12()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 12)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart13()
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 13)
            ->get();
        $listCauHoiOfPart = DB::table('cauhois')
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();
        $idCauhoiArray = [];
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        $idTaiLieuArray = [];
        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $result = [
            "part" => $inForPart,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
}
