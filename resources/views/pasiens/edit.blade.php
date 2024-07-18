@extends('templates.default')

@php
  $title = "Edit Pasien";
  $preTitle = "Data UKS"
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pasien.update', $pasien->id) }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                <label class="form-label">Nama Pasien</label>
                <input type ="text" name="nama_pasien" class="form-control
                @error('nama_pasien')
                    is-invalid
                @enderror
                " placeholder="Masukkan Nama Pasien" value="{{ old('nama_pasien') ?? $pasien->nama_pasien }}">
                @error('nama_pasien')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type ="text" name="kelas" class="form-control
                @error('kelas')
                    is-invalid
                @enderror
                " placeholder="Masukkan Kelas" value="{{ old('kelas') ?? $pasien->kelas }}">
                @error('kelas')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Keluhan</label>
                <input type ="text" name="keluhan" class="form-control
                @error('keluhan')
                    is-invalid
                @enderror
                " placeholder="Masukkan Keluhan" value="{{ old('keluhan') ?? $pasien->keluhan }}">
                @error('keluhan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Obat (Jika Perlu)</label>
                <select name="obat_id" id="" class="form-control">
                    <option value="">Pilih Obat</option>
                    @foreach ($obat as $obat)
                        <option value="{{ $obat->id }}"  @selected($obat->id == $pasien->obat_id)>{{ $obat->nama_obat }}</option>
                    @endforeach

                    
                </select>
                @error('obat')
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