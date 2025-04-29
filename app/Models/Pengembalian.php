<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pengembalian extends Model
{
    //
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class,'peminjams_id');
    }
}

