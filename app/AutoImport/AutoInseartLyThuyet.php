<?php

namespace App\AutoImport;

use App\Models\dapan_lythuyet;
use App\Models\cauhoi_lythuyet;

class AutoInseartLyThuyet
{
    public function inseartMotCauHoi($lythuyet_id, $noi_dung_cau_hoi)
    {
        $cauhoi = new cauhoi_lythuyet();
        $cauhoi->lythuyet_id = $lythuyet_id;
        $cauhoi->noidung_cauhoi = $noi_dung_cau_hoi;
        $cauhoi->save();
        return $cauhoi->id;
    }
    public function inseartMotPhuongAn($cauhoi_id, $noidung_pa, $dapan)
    {
        $phuongan = new dapan_lythuyet();
        $phuongan->cauhoi_id = $cauhoi_id;
        $phuongan->noidung_dapan = $noidung_pa;
        $phuongan->dapan = $dapan;
        $phuongan->save();
    }
}
