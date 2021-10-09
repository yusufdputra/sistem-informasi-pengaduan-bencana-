<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lookbook extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'lookbook';
    protected $dates = ['deleted_at'];

    public function magang()
    {
        return $this->hasOne(Magang::class, 'id', 'id_magang')->withTrashed();
    }
}
