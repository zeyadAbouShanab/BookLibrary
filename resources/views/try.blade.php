@extends('layouts.base')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 100px;">&nbsp;</div>

@section('content')

<h2>Pending rentals</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Book title</th>
            <th>Author</th>
            <th>Date of rental</th>
            <th>Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows->where('status','PENDING') as $borrow)
        <tr>
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>

        </tr>
        @endforeach
    </tbody>
</table>

<h2>On-time rentals</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Book title</th>
            <th>Author</th>
            <th>Date of rental</th>
            <th>Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows->where('status','RETURNED') as $borrow)
        @if($borrow->returned_at <= $borrow->deadline)
        <td>{{$books->where('id',$borrow->book_id)->pluck('title')}}</td>
        <td>{{$books->where('id',$borrow->book_id)->pluck('authors')}}</td>
        <td>{{$borrow->created_at}}</td>
        <td>{{$borrow->deadline}}</td>
        <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<h2>Late rentals</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Book title</th>
            <th>Author</th>
            <th>Date of rental</th>
            <th>Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows->where('status','RETURNED') as $borrow)
        @if($borrow->returned_at > $borrow->deadline)
        <tr>
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>
        </tr>
        @endif
        @endforeach
        
    </tbody>
</table>

<h2>Accepted rentals</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Book title</th>
            <th>Author</th>
            <th>Date of rental</th>
            <th>Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows->where('status','ACCEPTED') as $borrow)
        <tr>
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Rejected rentals</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Book title</th>
            <th>Author</th>
            <th>Date of rental</th>
            <th>Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows->where('status','REJECTED') as $borrow)
        <tr>
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection