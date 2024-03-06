@extends('templates.default')

@php
  $title = "Edit Author";
  $preTitle = "Data Perpustakaan"
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('author.update', $author->id) }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                <label class="form-label">Name</label>
                <input type ="text" name="name" class="form-control
                @error('name')
                    is-invalid
                @enderror
                " placeholder="Insert Name" value="{{ old('name') ?? $author->name }}">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">photo</label>
                <input type ="file" name="photo" class="form-control
                @error('photo')
                    is-invalid
                @enderror
                " placeholder="Insert Photo" value="{{ old('photo') ?? $author->photo }}">
                @error('photo')
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