<?php

namespace App\Exports;

use App\Models\Korban;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PengaduanExport implements FromView
{

    protected $request;
    public function __construct(Request $getRequest)
    {
        $this->request = $getRequest;
    }
    public function view(): View
    {
        setlocale(LC_ALL, 'IND');
        $tanggal = explode(" to ", $this->request->range_tgl);

        $data['pengaduan'] = Pengaduan::with('warga', 'bencana', 'daerah')
            ->where('status', 'terima')
            ->whereBetween('updated_at', [$tanggal[0], $tanggal[1]])->get();

        // get data korban
        $korban_arr = [];
        foreach ($data['pengaduan'] as $key => $value) {
            $korban_arr[$key] = unserialize($value->id_korban);
        }

        $data['korban'] = [];
        foreach ($korban_arr as $key => $value) {
            foreach ($value as $k => $v) {
                $data['korban'][$key][$k] = Korban::find($v);
            }
        }
        // dd($data['korban']);
        return view('admin.arsip.rekap', compact('data'));
    }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Pengaduan::all();
    // }
}
