<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Daerah extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'daerah';
    protected $dates = ['deleted_at'];
}
