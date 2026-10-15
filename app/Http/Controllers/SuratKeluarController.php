<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index(){
        $suratKeluar = [
            [
                'id'         => 1,
                'nomor_surat'=>'200',
                'tanggal'    =>'10-10-2006',
                'pengirim'   =>'pepew',
                'perihal'    =>'perang'
            ],
            [
                'id'         => 2,
                'nomor_surat'=>'100',
                'tanggal'    =>'11-10-2006',
                'pengirim'   =>'pecu',
                'perihal'    =>'pembelian'
            ],
            [
                'id'         => 3,
                'nomor_surat'=>'400',
                'tanggal'    =>'1-10-2006',
                'pengirim'   =>'peri',
                'perihal'    =>'upacara'
            ]
        ];
        return view ('surat-keluar.index', compact('suratKeluar'));
    }
    public function show($id){
        // return 'dtail surat Keluar dengan ID '.$id;
        
        $suratKeluarDtail = [
            1=>[
                 'id'         => 1,
                'nomor_surat'=>'200',
                'tanggal'    =>'10-10-2006',
                'pengirim'   =>'pepew',
                'perihal'    =>'perang'
            ],
            2=>[
                'id'         => 2,
                'nomor_surat'=>'100',
                'tanggal'    =>'11-10-2006',
                'pengirim'   =>'pecu',
                'perihal'    =>'pembelian'
            ],
            3=>[
                 'id'         => 3,
                'nomor_surat'=>'400',
                'tanggal'    =>'1-10-2006',
                'pengirim'   =>'peri',
                'perihal'    =>'upacara'
            ]
        ];
        $surat = $suratKeluarDtail [$id] ?? null;
        return view ('surat-keluar.show', compact('surat'));
    }
}
