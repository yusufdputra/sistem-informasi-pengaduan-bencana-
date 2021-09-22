<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Magang extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'magang';
    protected $dates = ['deleted_at'];

    public function mhs()
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'id_mahasiswa')->withTrashed();
    }

    public function dsn()
    {
        return $this->hasOne(Dosen::class, 'id', 'id_dosen')->withTrashed();
    }

    public function periode()
    {
        return $this->hasOne(Periode::class, 'id', 'id_periode')->withTrashed();
    }

    

}
