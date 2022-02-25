<?php

namespace App\AutoImport;

use App\Models\phan;
use App\Models\dapan;
use App\Models\cauhoi;
use App\Models\dethi_goc;
use App\Models\tailieu_phan;
use App\Models\tailieu_dapan;

class AutoInseart
{
    public function inseartMotDetThiGoc($tende)
    {
        $dethi = new dethi_goc();
        $dethi->name = $tende;
        $dethi->save();
        return $dethi->id;
    }
    public function inseartMotTaiLieuPhuongAn($request, $name, $dapanid)
    {
        $path = "";
        $idTypeDocument = "";
        if ($name == "") {
            return 1;
        }
        foreach ($request->listfileimg as $afile) {
            $filename = $afile->getClientOriginalName();
            if ($filename == $name) {
                $exfile = $afile->getClientOriginalExtension();
                $path = $afile->store('datafordb');
            }
        }
        if ($exfile == "mp3") {
            $idTypeDocument = 1;
        } else {
            $idTypeDocument = 2;
        }
        $tailieu = new tailieu_dapan();
        $tailieu->url = $path;
        $tailieu->kieutailieu_id = $idTypeDocument;
        $tailieu->dapan_id = $dapanid;
        $tailieu->save();
        return $tailieu->id;
    }
    public function inseartMotTaiLieuPhan($request, $name, $phanid)
    {
        $path = "";
        $idTypeDocument = "";
        if ($name == "") {
            return 1;
        }
        foreach ($request->listfileimg as $afile) {
            $filename = $afile->getClientOriginalName();
            if ($filename == $name) {
                $exfile = $afile->getClientOriginalExtension();
                $path = $afile->store('datafordb');
            }
        }
        if ($exfile == "mp3") {
            $idTypeDocument = 1;
        } else {
            $idTypeDocument = 2;
        }
        $tailieu = new tailieu_phan();
        $tailieu->url = $path;
        $tailieu->kieutailieu_id = $idTypeDocument;
        $tailieu->phan_id = $phanid;
        $tailieu->save();
        return $tailieu->id;
    }
    // public function inseartMotDet($tende)
    // {
    //     $dethi = new dethi();
    //     $dethi->ten_de = $tende;
    //     $dethi->save();
    //     return $dethi->id;
    // }
    public function inseartMotPhan($name)
    {
        $phan = new phan();
        $phan->name = $name;
        $phan->save();
        return $phan->id;
    }
    public function inseartMotCauHoi($dethi_goc_id, $phan_id, $chua_phuongan_nhieu, $noi_dung_cau_hoi)
    {
        $cauhoi = new cauhoi();
        $cauhoi->phan_id = $phan_id;
        $cauhoi->dethi_goc_id = $dethi_goc_id;
        $cauhoi->noidung_cauhoi = $noi_dung_cau_hoi;
        $cauhoi->chua_pa_nhieu = $chua_phuongan_nhieu;
        $cauhoi->save();
        return $cauhoi->id;
    }
    public function inseartMotPhuongAn($cauhoi_id, $noidung_pa, $dapan)
    {
        $phuongan = new dapan();
        $phuongan->cauhoi_id = $cauhoi_id;
        $phuongan->noidung_dapan = $noidung_pa;
        $phuongan->dapan = $dapan;
        $phuongan->save();
        return $phuongan->id;
    }
}
