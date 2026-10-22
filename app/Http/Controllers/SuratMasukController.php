<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingLetter;

class SuratMasukController extends Controller
{
    public function index(){
        $SuratMasuk = Incomingletter::all();

        return view ('surat-masuk.index', compact('SuratMasuk'));
    }
    public function show($id){
        // return 'dtail surat masuk dengan ID '.$id;
        
        IncommingLetter::FindOrFail($id);
        
        return view ('surat-masuk.show', compact('surat'));
    }
}
