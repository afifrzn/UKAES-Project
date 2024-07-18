@extends('templates.default')

@php
  $title = "Daftar Obat";
  $preTitle = "Data UKS"
@endphp


@push('page-action')
  <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
@endpush

@section('content')
<form action="{{ route('obat.index') }}" method="GET">
<input type="search" name="search" class="form-control" id="search"style="width: 380px"><br>
</form>
    <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Nama Obat</th>
                          <th>Stok</th>
                          <th>Kegunaan</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach ($obat as $obat)
                            <tr>
                           <td>{{ $obat->nama_obat }}</td>
                           <td>{{ $obat->stok_obat }}</td>
                           <td>{{ $obat->kegunaan }}</td>
                          <td>
                            <a href="{{ route('obat.edit', $obat->id) }}">Edit</a>
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="post">
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