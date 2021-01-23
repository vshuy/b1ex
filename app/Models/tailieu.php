<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tailieu extends Model
{
    protected $table = "tailieus";
    public $timestamps = false;
    public function phuongan()
    {
        return $this->hasMany(phuongan::class, 'tailieu_id', 'id');
    }
    public function tailieujpg()
    {
        return $this->hasMany(phan::class, 'tailieujpg_id', 'id');
    }
    public function tailieump3()
    {
        return $this->hasMany(phan::class, 'tailieump3_id', 'id');
    }
}
