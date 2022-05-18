@extends('layouts.base')

@csrf
@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 140px;">&nbsp;</div>

<p style="text-align:center;"><a href="{{ route('genres.create') }}" class="btn btn-warning" style="width:200px"><strong>Add new genre</strong></a></p>
@csrf
<div class="row">
    @csrf
    @foreach ($genres as $genre)
    <div class="col-sm-4 my-4">
        <div class="card h-100 bg-dark text-white">
            <div class="card-body">
                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <p class="card-text"><br><strong>Name:</strong> &nbsp;{{ $genre->name }}</p>
                <p class="card-text"><strong>Style:</strong> &nbsp;{{ $genre->style }}</p>
            </div>
        </div>
    </div>
    @endforeach
    <div id="fix-for-navbar-fixed-bottom-spacing" style="height: 420px;">&nbsp;</div>

    @endsection