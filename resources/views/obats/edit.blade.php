@extends('templates.default')

@php
  $title = "Edit Obat";
  $preTitle = "Data UKS"
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('obat.update', $obat->id) }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                <label class="form-label">Nama Obat</label>
                <input type ="text" name="nama_obat" class="form-control
                @error('nama_obat')
                    is-invalid
                @enderror
                " placeholder="Masukkan Nama Obat" value="{{ old('nama_obat') ?? $obat->nama_obat }}">
                @error('nama_obat')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type ="numeric" name="stok_obat" class="form-control
                @error('stok_obat')
                    is-invalid
                @enderror
                " placeholder="Masukkan Stok" value="{{ old('stok_obat') ?? $obat->stok_obat }}">
                @error('stok_obat')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Kegunaan</label>
                <input type ="text" name="kegunaan" class="form-control
                @error('kegunaan')
                    is-invalid
                @enderror
                " placeholder="Masukkan Kegunaan" value="{{ old('kegunaan') ?? $obat->kegunaan }}">
                @error('kegunaan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" value="Edit" class="btn btn-danger">
            </div>
            </form>
        </div>
    </div>
@endsection