<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'mahasiswa';
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user')->withTrashed();
    }

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'id_prodi')->withTrashed();
    }
}
