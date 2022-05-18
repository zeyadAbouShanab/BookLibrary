@extends('layouts.base')

@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 120px;">&nbsp;</div>

<p style="text-align:center;"><img src="{{ $book->cover_image }}" width="300" height="300" alt="Logo"></p>

@if(Auth::check())
<div class="row">
    @php
    $query =
    Auth::user()->readerBorrows->where('reader_id',Auth::user()->id)->where('book_id',$book->id)->where('status','!=','RETURNED')
    @endphp
    @if(Auth::check() && (!Auth::user()->is_librarian && $query->count() == 0))
    <form action="{{ route('borrows.store') }}" method="POST">
        <input type="hidden" id="book" name="book" value="{{ $book->id }}" />
        @csrf
        <p style="text-align:center;"><button type="submit" class="btn btn-primary">Borrow</button></p>
    </form>
    @elseif(Auth::check() && (!Auth::user()->is_librarian))
    <p style="text-align:center;"><button class="btn btn-danger">Already Borrowed</button></p>
    @endif

    @if(Auth::check() && (Auth::user()->is_librarian))
    <p style="text-align:center;"><a href="{{ route('books.edit', $book->id) }}" style="width:200px" class="btn btn-primary">Edit</a></p>
    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <p style="text-align:center;"><button type="submit" style="width:200px" class="btn btn-danger">Delete</button></p>
    </form>
    @endif
    @endif
    <div class="card bg-dark text-white">
            <h3 class="display-8" style="text-align:center;">Book Info</h3>
        </div>
    <table class="table table-striped" style="vertical-align: middle;background-color:#FFFFE0;">
        <tbody>
            <tr>
                <td><strong>Book title:</strong></td>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <td><strong>Book authors:</strong></td>
                <td>{{ $book->authors }}</td>
            </tr>
            <tr>
                <td><strong>Book genres:</strong></td>
                <td> @foreach ($book->genres as $genre)
                    <span>
                        {{ $genre->name }}
                        <small>{{ $genre->style }}</small>
                    </span>
                    </p>
                    </a>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td><strong>Book date of publish:</strong></td>
                <td>{{ $book->released_at }}</td>
            </tr>
            <tr>
                <td><strong>Book number of pages:</strong></td>
                <td>{{ $book->pages }}</td>
            </tr>
            <tr>
                <td><strong>Book language:</strong></td>
                <td>{{ $book->language_code }}</td>
            </tr>
            <tr>
                <td><strong>Book ISBN number:</strong></td>
                <td>{{ $book->isbn }}</td>
            </tr>
            <tr>
                <td><strong>Book in stock number:</strong></td>
                <td>{{ $book->in_stock }}</td>
            </tr>
            <tr>
                <td><strong>Number of available books:</strong></td>
                <td>{{ $book->in_stock }}</td>
            </tr>
            <tr>
                <td><strong>Book description:</strong></td>
                <td>{{ $book->description }}</td>
            </tr>
        </tbody>
    </table>

</div>
<div id="fix-for-navbar-fixed-bottom-spacing" style="height: 30px;">&nbsp;</div>

@endsection