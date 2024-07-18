@extends('templates.default')

@php
  $title = "Daftar Pasien";
  $preTitle = "Data UKS"
@endphp


@push('page-action')
  <a href="{{ route('pasien.create') }}" class="btn btn-primary">Tambah Pasien</a>
@endpush

@section('content')
<form action="{{ route('pasien.index') }}" method="GET">
<input type="search" name="search" class="form-control" id="search"style="width: 380px"><br>
</form>
    <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Nama Pasien</th>
                          <th>Kelas</th>
                          <th>Keluhan</th>
                          <th>Obat</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach ($pasien as $pasien)
                            <tr>
                         <td>
                            {{ $pasien->nama_pasien }}
                          </td>
                           <td>
                            {{ $pasien->kelas }}
                          </td>
                           <td>
                            {{ $pasien->keluhan }}
                          </td>
                          <td>
                            {{ $pasien->obatName->nama_obat }}
                          </td>
                          <td>
                            <a href="{{ route('pasien.edit', $pasien->id) }}">Edit</a>
                            <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post">
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