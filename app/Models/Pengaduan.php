<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaduan extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'pengaduan';
    protected $dates = ['deleted_at'];

    public function warga()
    {
        return $this->hasOne(Warga::class, 'id', 'id_warga')->withTrashed();
    }

    public function bencana()
    {
        return $this->hasOne(Bencana::class, 'id', 'id_bencana')->withTrashed();
    }

    public function daerah()
    {
        return $this->hasOne(Daerah::class, 'id', 'id_daerah')->withTrashed();
    }
}
