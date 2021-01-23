<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cauhoi extends Model
{
    protected $table = "cauhois";
    public $timestamps = false;
    public function phuongan()
    {
        return $this->hasMany(phuongan::class, 'cauhoi_id', 'id');
    }
}
