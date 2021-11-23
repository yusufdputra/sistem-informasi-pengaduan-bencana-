<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bencana extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'bencana';
    protected $dates = ['deleted_at'];
}
