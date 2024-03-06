@extends('templates.default')

@php
  $title = "Tambah Buku";
  $preTitle = "Data Perpustakaan"
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('book.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                <label class="form-label">Title</label>
                <input type ="text" name="title" class="form-control 
                @error('title')
                    is-invalid
                @enderror" placeholder="Insert Title" value="{{ old('title') }}">
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <select name="author_id" id="" class="form-control">

                    @foreach ($author as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach

                </select>
                @error('author')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type ="file" name="cover" class="form-control
                @error('cover')
                    is-invalid
                @enderror
                " placeholder="Insert Cover" value="{{ old('cover') }}">
                @error('cover')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type ="numeric" name="year" class="form-control
                @error('year')
                    is-invalid
                @enderror
                " placeholder="Insert Year" value="{{ old('year') }}">
                @error('year')
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