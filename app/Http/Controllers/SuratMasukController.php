<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingLetter;

class SuratMasukController extends Controller
{
    public function index(){
        $SuratMasuk = Incomingletter::orderBy('id', 'desc')->get();

        return view ('surat-masuk.index', compact('SuratMasuk'));
    }
    public function create(){
        return view('surat-masuk.create');
    }
    public function store(Request $request){
        $validate = $request->validate([
            'nomor-surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max255',
            'keterangan' => 'nullable|string',
        ]);
        IncomingLetter::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil ditambahkan.');
    }
    public function show($id){
        // return 'dtail surat masuk dengan ID '.$id;
        
        IncommingLetter::FindOrFail($id);
        
        return view ('surat-masuk.show', compact('surat'));
    }
    public function edit($id)
    {
        $surat = IncomingLetter::findOrFail($id);
        return view('surat-masuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = IncomingLetter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'pengirim'    => 'required|string|max:255',
            'perihal'     => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
        ]);

        $surat->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = IncomingLetter::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil dihapus.');
    }
}

