<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    static function cekFile($Getfile_baru, $Getfile_lama, $Bolfile_lama ,$target)
    {
        if (($Getfile_baru != null)) {
            //jika ada upload foto
            //cek apakah ada file lama atau tidak
            if ($Bolfile_lama) {
                $file_lama = $Getfile_lama;
            } else {
                $file_lama = null;
            }
            $upload = self::uploadFile($target, $Getfile_baru, $file_lama);
        } else {
            // jika tidak ada ubah foto
            $upload = $Getfile_lama;
        }
        return $upload;
    }
    static function uploadFile($target, $file, $file_lama)
    {
        try {
            if ($file_lama != null) {
                // update file
                // hapus file lama
                self::unlinkFile($file_lama);
            }
            // upload file baru
            $file_name = uniqid(rand(), true).'_'.time() . '_' . $file->getClientOriginalName();
            $file_path = $file->storeAs('uploads/' . $target, $file_name, 'public');
            return $file_path;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    static function unlinkFile($target)
    {
        try {
            unlink(storage_path('app/public/'. $target));
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
