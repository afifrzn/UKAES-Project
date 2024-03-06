<?php

namespace App\Http\Controllers;

use App\Models\Author;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'photo' => ['image']
        ], [
            'name.required' => 'Kolom Nama Tidak Boleh Kosong',
            'photo.required' => 'Kolom Foto Tidak Boleh Kosong'
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }


        $author = new Author();

        $author->name = $request->name;
        $author->photo = $photo;

        $author->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $author = author::find($id);

        return view('authors.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'photo' => ['required']
        ], [
            'name.required' => 'Kolom Nama Tidak Boleh Kosong',
            'photo.required' => 'Kolom Foto Tidak Boleh Kosong'
        ]);

        $author = Author::find($id);

        $photo = null;

        if ($request->hasFile('photo')) {
            if(Storage::exists($author->photo)){
                Storage::delete($author->photo);
            }
            $photo = $request->file('photo')->store ('photos');
        }

        $author->name = $request->name;
        $author->photo = $photo;

        $author->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $author = Author::find($id);

        $author->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('author.index');
    }
}
