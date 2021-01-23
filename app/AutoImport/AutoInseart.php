<?php

namespace App\AutoImport;

use App\Models\cauhoi;
use App\Models\dethi;
use App\Models\phan;
use App\Models\phuongan;
use App\Models\tailieu;

class AutoInseart
{
    public function inseartMotTaiLieu($url, $kieutl)
    {
        $tailieu = new tailieu();
        $tailieu->url = $url;
        $tailieu->kieutl = $kieutl;
        $tailieu->save();
        return $tailieu->id;
    }
    public function moveFileByName($request, $name)
    {
        if ($name == "") {
            return 1;
        }
        foreach ($request->listfileimg as $afile) {
            $filename = $afile->getClientOriginalName();
            if ($filename == $name) {
                $exfile = $afile->getClientOriginalExtension();
                $path = $afile->store('datafordb');
                return $this->inseartMotTaiLieu($path, $exfile);
            }
        }
    }
    public function inseartMotDet($tende)
    {
        $dethi = new dethi();
        $dethi->ten_de = $tende;
        $dethi->save();
        return $dethi->id;
    }
    public function inseartMotPhan($dethi_id, $tenphan, $tailieupng_id, $tailieump3_id)
    {
        $phan = new phan();
        $phan->dethi_id = $dethi_id;
        $phan->ten_phan = $tenphan;
        $phan->tailieujpg_id = $tailieupng_id;
        $phan->tailieump3_id = $tailieump3_id;
        $phan->save();
        return $phan->id;
    }
    public function inseartMotCauHoi($phan_id, $noi_dung_cau_hoi)
    {
        $cauhoi = new cauhoi();
        $cauhoi->phan_id = $phan_id;
        $cauhoi->noidung_cauhoi = $noi_dung_cau_hoi;
        $cauhoi->save();
        return $cauhoi->id;
    }
    public function inseartMotPhuongAn($cauhoi_id, $tailieu_id, $noidung_pa, $dapan)
    {
        $phuongan = new phuongan();
        $phuongan->cauhoi_id = $cauhoi_id;
        $phuongan->tailieu_id = $tailieu_id;
        $phuongan->noidung_pa = $noidung_pa;
        $phuongan->dapan = $dapan;
        $phuongan->save();
    }
}
