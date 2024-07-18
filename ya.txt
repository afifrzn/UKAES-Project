<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request) {

        if($request){
        $Book = Book::where('title', 'like', '%'.$request->search.'%')->get();
        $Author = Author::where('name', 'like', '%'.$request->search.'%')->get();
        }else{
        $Book = Book::get();
        $Author = Author::get();
        }

        return view('books.index', compact('Book', 'Author','request'));
    }

    public function create(){
        return view('books.create', [
            'author' => Author::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'min:3'],
            'cover' => ['required'],
            'year' => ['required', 'numeric']
        ], [
            'title.required' => 'Kolom Judul Tidak Boleh Kosong',
            'cover.required' => 'Kolom Cover Tidak Boleh Kosong',
            'year.required' => 'Kolom Tahun Tidak Boleh Kosong'
        ]);

        $cover = null;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('covers');
        }

        $book = new Book();

        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->cover = $cover;
        $book->year = $request->year;

        $book->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('book.index');
    }

    public function show($id)
    {
        return view('books.show', [
            'authors' => Author::find($id),
            'books' => Book::get(),
        ]);
    }

    public function edit($id)
    {
        $book = Book::find($id);

        return view('books.edit', [
            'book' => $book, 
            'author' => Author::get(),
        ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'min:3'],
            'cover' => ['required'],
            'year' => ['required', 'numeric']
        ], [
            'title.required' => 'Kolom Judul Tidak Boleh Kosong',
            'cover.required' => 'Kolom Cover Tidak Boleh Kosong',
            'year.required' => 'Kolom Tahun Tidak Boleh Kosong'
        ]);
        
        $book = Book::find($id);

        $cover = null;

        if ($request->hasFile('cover')) {
            if(Storage::exists($book->cover)){
                Storage::delete($book->cover);
            }
            $cover = $request->file('cover')->store('covers');
        }

        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->cover = $cover;
        $book->year = $request->year;

        $book->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('book.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        $book->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('book.index');
    }
}
