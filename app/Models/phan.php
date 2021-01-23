<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phan extends Model
{
    protected $table = "phans";
    public $timestamps = false;
    public function cauhoi()
    {
        return $this->hasMany(cauhoi::class, 'phan_id', 'id');
    }
}
