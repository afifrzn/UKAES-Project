@extends('templates.default')

@php
  $title = "Daftar Author";
  $preTitle = "Data Perpustakaan"
@endphp

@push('page-action')
  <a href="{{ route('author.create') }}" class="btn btn-primary">Tambah Author</a>
@endpush

@section('content')
    <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Photo</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach ($authors as $authors)
                            <tr>
                          <td>{{ $authors->name }}</td>
                          <td>
                            <img src="{{ asset('storage/' .$authors->photo) }}" alt="" width="20%">
                          </td>
                          <td>
                            <a href="{{ route('author.edit', $authors->id) }}">Edit</a>
                            <form action="{{ route('author.destroy', $authors->id) }}" method="post">
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