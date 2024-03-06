@extends('templates.default')

@php
  $title = "Daftar Buku";
  $preTitle = "Data Perpustakaan"
@endphp


@section('content')
    <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Author</th>
                          <th>Cover</th>
                          <th>Year</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach ($books as $book)
                            <tr>
                          <td>
                            {{ $book->title }}
                          </td>
                          <td>
                            {{ $book->authorName->name }}
                          </td>
                          <td>
                           <img src="{{ asset('storage/' .$book->cover) }}" alt="" width="20%">
                          </td>
                          <td>
                            {{ $book->year }}
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