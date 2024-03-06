@extends('templates.default')

@php
  $title = "Daftar Publisher";
  $preTitle = "Data Perpustakaan"
@endphp

@push('page-action')
  <a href="{{ route('publisher.create') }}" class="btn btn-primary">Tambah Publisher</a>
@endpush

@section('content')
    <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Address</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach ($publishers as $publisher)
                            <tr>
                          <td>{{ $publisher->name }}</td>
                          <td>
                            {{ $publisher->address }}
                          </td>
                          <td>
                            <a href="{{ route('publisher.edit', $publisher->id) }}">Edit</a>
                            <form action="{{ route('publisher.destroy', $publisher->id) }}" method="post">
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