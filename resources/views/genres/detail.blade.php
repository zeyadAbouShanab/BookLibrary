
@extends('layouts.base')

@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 140px;">&nbsp;</div>

<div class="card bg-dark text-white">
<h1 class="display-8" style="text-align:center;font-family: Copperplate">Genre &#8594 {{ $genre->name }}</h1>
</div>
<div class="row">
    @foreach ($genre->books as $book)
    <div class="col-sm-4 my-4">
        <div class="card h-100 bg-dark text-white">
            <img src="{{ $book->cover_image }}" width="200" height="400" class="card-img-top">
            <div class="card-body">
                <h4 class="card-title" style="font-size: 110% ">{{ substr($book->title,0,75) }}</h4>
                <p class="card-text"><strong><br>Author:</strong> &nbsp;{{ $book->authors }}</p>
                <p class="card-text"><strong>Date:</strong> &nbsp;{{ $book->released_at }}</p>
                <p class="card-text"><strong>Description:</strong> &nbsp;{{ substr($book->description,0,50) }}</p>

            </div>
            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Show book details</a>

        </div>
    </div>
    @endforeach
    @endsection