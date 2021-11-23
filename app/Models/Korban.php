<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Korban extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'korban';
    protected $dates = ['deleted_at'];
    public function pengajuan()
    {
        return $this->hasOne(Pengaduan::class, 'id', 'id_pengaduan')->withTrashed();
    }
}
