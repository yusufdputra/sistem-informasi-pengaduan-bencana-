<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function getDataWarga($nik)
    {
        $warga = Warga::where('nik',$nik)->first();
        if ($warga != null) {
            return $warga;
        } else {
            return 0;
        }
    }

    
}
