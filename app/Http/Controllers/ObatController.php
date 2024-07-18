<?php

namespace App\Http\Controllers;

use App\Models\Obat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    public function index(Request $request) {

        if($request){
        $obat = Obat::where('nama_obat', 'like', '%'.$request->search.'%')->get();
        }else{
        $obat = Obat::get();
        }

        return view('obats.index', compact('obat','request'));
    }

    public function create(){
        return view('obats.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_obat' => ['required'],
            'stok_obat' => ['required', 'numeric'],
            'kegunaan' => ['required']
        ], [
            'nama_obat.required' => 'Kolom Nama Tidak Boleh Kosong',
            'stok_obat.required' => 'Kolom Stok Tidak Boleh Kosong',
            'kegunaan.required' => 'Kolom Kegunaan Tidak Boleh Kosong'
        ]);

        $obat = new Obat();

        $obat->nama_obat = $request->nama_obat;
        $obat->stok_obat = $request->stok_obat;
        $obat->kegunaan = $request->kegunaan;

        $obat->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('obat.index');
    }

    public function show($id)
    {
      //
    }

    public function edit($id)
    {
        $obat = Obat::find($id);

        return view('obats.edit', [
            'obat' => $obat,
        ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_obat' => ['required'],
            'stok_obat' => ['required', 'numeric'],
            'kegunaan' => ['required']
        ], [
            'nama_obat.required' => 'Kolom Nama Tidak Boleh Kosong',
            'stok_obat.required' => 'Kolom Stok Tidak Boleh Kosong',
            'kegunaan.required' => 'Kolom Kegunaan Tidak Boleh Kosong'
        ]);
        
        $obat = Obat::find($id);

       $obat->nama_obat = $request->nama_obat;
        $obat->stok_obat = $request->stok_obat;
        $obat->kegunaan = $request->kegunaan;


        $obat->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('obat.index');
    }

    public function destroy($id)
    {
        $obat = Obat::find($id);

        $obat->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('obat.index');
    }
}
