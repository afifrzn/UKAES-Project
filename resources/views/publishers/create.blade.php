@extends('templates.default')

@php
  $title = "Daftar Publisher";
  $preTitle = "Data Perpustakaan"
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('publisher.store') }}" class="" method="post">
                @csrf
                <div class="mb-3">
                <label class="form-label">Name</label>
                <input type ="text" name="name" class="form-control 
                @error('name')
                    is-invalid
                @enderror" placeholder="Insert Name" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Addres</label>
                <input type ="text" name="address" class="form-control
                @error('address')
                    is-invalid
                @enderror
                " placeholder="Insert Address" value="{{ old('address') }}">
                @error('address')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <input type="submit" value="Tambah" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
@endsection