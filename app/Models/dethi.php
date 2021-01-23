<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dethi extends Model
{
    protected $table = "dethis";
    public $timestamps = false;
    public function phan()
    {
        return $this->hasMany(phan::class, 'dethi_id', 'id');
    }
}
