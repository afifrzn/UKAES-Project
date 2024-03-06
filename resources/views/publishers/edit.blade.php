@extends('templates.default')

@php
  $title = "Daftar Publisher";
  $preTitle = "Data Perpustakaan"
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('publisher.update', $publisher->id) }}" class="" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                <label class="form-label">Name</label>
                <input type ="text" name="name" class="form-control
                @error('name')
                    is-invalid
                @enderror
                " placeholder="Insert Name" value="{{ old('name') ?? $publisher->name }}">
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
                " placeholder="Insert Address" value="{{ old('address') ?? $publisher->address }}">
                @error('address')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" value="Edit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
@endsection