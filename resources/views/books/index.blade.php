@extends('templates.default')

@php
  $title = "Daftar Buku";
  $preTitle = "Data Perpustakaan"
@endphp


@push('page-action')
  <a href="{{ route('book.create') }}" class="btn btn-primary">Tambah Buku</a>
@endpush

@section('content')
<form action="{{ route('book.index') }}" method="GET">
<input type="search" name="search" class="form-control" id="search"style="width: 380px"><br>
</form>
    <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Cover</th>

                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach ($Book as $book)
                            <tr>
                          <td>
                            <a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a>
                          </td>
                          <td>
                           <img src="{{ asset('storage/' .$book->cover) }}" alt="" width="20%">
                          </td>
                          <td>
                            <a href="{{ route('book.edit', $book->id) }}">Edit</a>
                            <form action="{{ route('book.destroy', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                          </td>
                        </tr>
         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
@endsection