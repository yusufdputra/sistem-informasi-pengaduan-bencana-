<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kuisioner extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kuisioner';
    protected $dates = ['deleted_at'];

    public function mhs()
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'id_mahasiswa')->withTrashed();
    }
}
