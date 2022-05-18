@extends('layouts.base')

@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 140px;">&nbsp;</div>

<div class="card bg-dark text-white">
            <h3 class="display-8" style="text-align:center;">New Book</h3>
        </div>
<form style="background-color:#E6E6FA;font-size:20px;font-weight:bold;padding-left:20px" action="{{ route('books.store') }}" method="POST">
    
    @csrf

    <div class="form-group">
        <label for="title"><br>Book title: </label>
        <input name="title" maxlength="255" type="text" class="form-control @error('title') is-invalid @enderror"
            id="title" placeholder="Ex: Harry Potter and the Philosopher's Stone" value="{{ old('title', '') }}">

        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="authors">Book author: </label>
        <input name="authors" maxlength="255" type="text" class="form-control @error('authors') is-invalid @enderror"
            id="authors" placeholder="Ex: William Shakespeare" value="{{ old('authors', '') }}">

        @error('authors')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="cover_image">Book cover image url: </label>
        <input name="cover_image" type="url" class="form-control @error('cover_image') is-invalid @enderror"
            id="cover_image" placeholder="https://example.com" value="{{ old('cover_image', '') }}">

        @error('cover_image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="released_at">Released at: </label>
        <input name="released_at" type="date" class="form-control @error('released_at') is-invalid @enderror"
            id="released_at" max="<?= date('Y-m-d'); ?>" value="{{ old('released_at', '') }}">

        @error('released_at')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="pages">Number of Pages: </label>
        <input name="pages" type="number" min="1" class="form-control @error('pages') is-invalid @enderror" id="pages"
            rows="1" placeholder="min.1" value="{{ old('pages', '') }}">

        @error('pages')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="isbn">ISBN: </label>
        <textarea name="isbn" class="form-control @error('isbn') is-invalid @enderror" id="isbn"
        placeholder="ISBN: 1-4028-9462-7" rows="1">{{ old('isbn', '')  }}</textarea>

        @error('isbn')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="description">Description: </label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
        placeholder="Can be left empty" rows="3">{{ old('description', '')  }}</textarea>

        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>

    <div class="form-group">
        <label for="genres">Genres: </label><br><br>
        @foreach ($genres as $genre)
        <input type="checkbox" id="{{ $genre->id }}" class="custom-control-input" name="genres[]"
            value="{{ $genre->id }}" />
        <label style="font-weight:normal;" class="custom-control-label" for="{{ $genre->id }}"> {{ $genre->name }}</label>
        <br>
        @endforeach
    </div>
    <br>
    <div class="form-group">
        <label for="in_stock">In stock number: </label>
        <input name="in_stock" type="number" min="1" class="form-control @error('in_stock') is-invalid @enderror"
        placeholder="min. 0" id="in_stock" rows="1" value="{{ old('pages', '') }}">

        @error('in_stock')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="form-group">
    <p style="text-align:center;"><button type="submit" style="width:200px" class="btn btn-primary">Add new book</button></p>
    </div>
    <div id="fix-for-navbar-fixed-bottom-spacing" style="height: 40px;">&nbsp;</div>

    @endsection