<?php

namespace App\Http\Controllers;

use App\Models\dethi;

class DethiController extends Controller
{
    public function getListDe()
    {
        $listde = dethi::all();
        return $listde->toJson();
    }
}
