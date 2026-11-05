<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutcomingLetter;

class SuratKeluarController extends Controller
{
    public function index(){
        $suratKeluar = OutcomingLetter::orderBy('id','desc')->get();
        return view ('surat-keluar.index', compact('suratKeluar'));
    }
    public function create(){
        return view('surat-keluar.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',

        ]);
        OutcomingLetter::create($validated);
        return redirect()->route('surat_keluar.index')->with('success','Surat berhasil di tambahkan');
    }
    public function show($id){
        // return 'dtail surat Keluar dengan ID '.$id;
        OutcommingLetter::FindOrFail($id);
        return view ('surat-keluar.show', compact('surat'));
    }
    public function update(Request $request,$id){
        $surat = OutcomingLetter::FindOrFail($id);
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);
        $surat->update($validated);
        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil diperbarui.');

        
    }
    public function destroy($id){
        $surat = OutcomingLetter::findOrFail($id);
        $surat->delete();
        return redirect()->route('surat-keluar.index');-with('succes','Surat berhasil di hapus.');
    }
}
