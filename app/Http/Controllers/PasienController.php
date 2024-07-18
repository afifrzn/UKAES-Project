<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    public function index(Request $request) {

        if($request){
        $obat = Obat::where('nama_obat', 'like', '%'.$request->search.'%')->get();
        $pasien = Pasien::where('nama_pasien', 'like', '%'.$request->search.'%')->get();
        }else{
        $obat = Obat::get();
        $pasien = Pasien::get();
        }

        return view('pasiens.index', compact('obat', 'pasien','request'));
    }

    public function create(){
        return view('pasiens.create', [
            'obat' => Obat::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pasien' => ['required'],
            'kelas' => ['required'],
            'keluhan' => ['required']
        ], [
            'nama_pasien.required' => 'Kolom Nama Tidak Boleh Kosong',
            'kelas.required' => 'Kolom Kelas Tidak Boleh Kosong',
            'keluhan.required' => 'Kolom Keluhan Tidak Boleh Kosong'
        ]);

        $pasien = new Pasien();

        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->kelas = $request->kelas;
        $pasien->keluhan = $request->keluhan;
        $pasien->obat_id = $request->obat_id;

        $pasien->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('pasien.index');
    }

    public function show($id)
    {
       //
    }

    public function edit($id)
    {
        $pasien = Pasien::find($id);

        return view('pasiens.edit', [
            'pasien' => $pasien, 
            'obat' => Obat::get(),
        ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pasien' => ['required'],
            'kelas' => ['required'],
            'keluhan' => ['required']
        ], [
            'nama_pasien.required' => 'Kolom Nama Tidak Boleh Kosong',
            'kelas.required' => 'Kolom Kelas Tidak Boleh Kosong',
            'keluhan.required' => 'Kolom Keluhan Tidak Boleh Kosong'
        ]);
        
        $pasien = Pasien::find($id);

        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->kelas = $request->kelas;
        $pasien->keluhan = $request->keluhan;
        $pasien->obat_id = $request->obat_id;

        $pasien->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('pasien.index');
    }

    public function destroy($id)
    {
        $pasien = Pasien::find($id);

        $pasien->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('pasien.index');
    }
}
