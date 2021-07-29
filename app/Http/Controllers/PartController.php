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
    public function deleteListFile($list_file)
    {
        // Storage::disk('s3')->delete('path/file.jpg');
        // $path = Storage::path('1sVvk9eEUTIzmp9aSY95yRtbcVb24SKmH5y9K1Zy.mp3');
        // return $path;
        $headpath = str_replace("app", "", app_path());
        foreach ($list_file as $aItem) {
            unlink($headpath . '/storage/app/' . $aItem);
        }
    }
    public function detailAnExam($idde)
    {
        $aExam = collect([
            $this->getPart1ById($idde),
            $this->getPart2ById($idde),
            $this->getPart3Dot1ById($idde),
            $this->getPart3Dot2ById($idde),
            $this->getPart4ById($idde),
            $this->getPart5ById($idde),
            $this->getPart6ById($idde),
            $this->getPart7ById($idde),
            $this->getPart8ById($idde),
            $this->getPart9ById($idde),
            $this->getPart10ById($idde),
            $this->getPart11ById($idde),
            $this->getPart12ById($idde),
            $this->getPart13ById($idde),
        ]);
        //  return $aExam[0]['part'][0]->id;
        //  return $aExam[0]['questions'][0]->noidung_cauhoi;
        // return $aExam[9]['listPartDocumentArray'][0]->url;
        //    return $aExam[9];
        // return $aExam->toJson();
        return view('detailanexam', ['oneExam' => $aExam]);
    }
    public function deletePart1ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 1)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart2ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 2)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart3d1ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 3.1)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart3d2ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 3.2)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart4ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 4)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart5ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 5)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart6ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 6)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart7ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 7)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart8ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 8)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart9ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 9)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart10ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 10)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart11ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 11)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart12ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 12)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }
    public function deletePart13ById($idde)
    {
        $inForPart = DB::table('phans')
            ->select(['id', 'tailieujpg_id', 'tailieump3_id'])
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 13)
            ->get();

        $idTaiLieuArray = [];

        if ($inForPart[0]->tailieump3_id != 1) {
            $idTaiLieuArray[] = $inForPart[0]->tailieump3_id;
        }         /// list id document of part
        $idTaiLieuArray[] = $inForPart[0]->tailieujpg_id;

        $idPartDocumentArray = [];
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url'])
            ->whereIn('id', $idPartDocumentArray)
            ->get();

        $listCauHoiOfPart = DB::table('cauhois')
            ->select(['id'])
            ->where('phan_id', '=', $inForPart[0]->id)
            ->get();

        $idCauhoiArray = [];                              ///list id cau hoi use to delete id tai lieu
        foreach ($listCauHoiOfPart as $aCauhoi) {
            $idCauhoiArray[] = $aCauhoi->id;
        }

        $listPhuongAnOfPart = DB::table('phuongans')
            ->select(['tailieu_id'])
            ->whereIn('cauhoi_id', $idCauhoiArray)
            ->get();

        foreach ($listPhuongAnOfPart as $aPhuongAn) {
            if ($aPhuongAn->tailieu_id != 1) {
                $idTaiLieuArray[] = $aPhuongAn->tailieu_id;
            }
        }

        $listTaiLieuOfPart = DB::table('tailieus')
            ->select(['url'])      ///list id tai lieu
            ->whereIn('id', $idTaiLieuArray)
            ->get();

        $listFile = [];

        foreach ($listTaiLieuOfPart as $aItem) {
            $listFile[] = $aItem->url;
        }

        foreach ($listPartDocumentArray as $aItem) {
            $listFile[] = $aItem->url;
        }

        DB::table('tailieus')
            ->whereIn('id', $idTaiLieuArray)
            ->delete();
        $this->deleteListFile($listFile);

        // return $result;
    }

    public function deleteAnExamById($idde)
    {
        $this->deletePart1ById($idde);
        $this->deletePart2ById($idde);
        $this->deletePart3d1ById($idde);
        $this->deletePart3d2ById($idde);
        $this->deletePart4ById($idde);
        $this->deletePart5ById($idde);
        $this->deletePart6ById($idde);
        $this->deletePart7ById($idde);
        $this->deletePart8ById($idde);
        $this->deletePart9ById($idde);
        $this->deletePart10ById($idde);
        $this->deletePart11ById($idde);
        $this->deletePart12ById($idde);
        $this->deletePart13ById($idde);
        DB::table('dethis')->where('id', '=', $idde)->delete();
        return redirect()->route('dashboard');
    }
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
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
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getPart1ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 1)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart2ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 2)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart3Dot1ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 3.1)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart3Dot2ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 3.2)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart4ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 4)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart5ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 5)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart6ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 6)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart7ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 7)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart8ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 8)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart9ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 9)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart10ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 10)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart11ById($idde)
    {
        $idde = $this->getRandomIdDe();
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 11)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart12ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 12)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getPart13ById($idde)
    {
        $inForPart = DB::table('phans')
            ->where('dethi_id', '=', $idde)
            ->where('ten_phan', '=', 13)
            ->get();
        $idPartDocumentArray = [];
        $idPartDocumentArray[] = $inForPart[0]->tailieujpg_id;
        $idPartDocumentArray[] = $inForPart[0]->tailieump3_id;
        $listPartDocumentArray = DB::table('tailieus')
            ->select(['url', 'kieutl'])
            ->whereIn('id', $idPartDocumentArray)
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
            "listPartDocumentArray" => $listPartDocumentArray,
            "questions" => $listCauHoiOfPart,
            "answers" => $listPhuongAnOfPart,
            "document" => $listTaiLieuOfPart,
        ];
        return $result;
    }
    public function getOneExamById($idde)
    {
        $oneExam = [
            "part1" => $this->getPart1ById($idde),
            "part2" => $this->getPart2ById($idde),
            "part3dot1" => $this->getPart3Dot1ById($idde),
            "part3dot2" => $this->getPart3Dot2ById($idde),
            "part4" => $this->getPart4ById($idde),
            "part5" => $this->getPart5ById($idde),
            "part6" => $this->getPart6ById($idde),
            "part7" => $this->getPart7ById($idde),
            "part8" => $this->getPart8ById($idde),
            "part9" => $this->getPart9ById($idde),
            "part10" => $this->getPart10ById($idde),
            "part11" => $this->getPart11ById($idde),
            "part12" => $this->getPart12ById($idde),
            "part13" => $this->getPart13ById($idde),
        ];
        return $oneExam;
    }
}
