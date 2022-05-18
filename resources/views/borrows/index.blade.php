@extends('layouts.base')

@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 120px;">&nbsp;</div>

<div class="card bg-dark text-white">
    <h4 class="display-15" style="text-align:center;">Pending rentals</h4>
</div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;"
    class="table table-striped">
    <thead>
        <tr>
            <th style="width:40%">Book title</th>
            <th style="width:15%">Author</th>
            <th style="width:15%">Date of rental</th>
            <th style="width:15%">Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->readerBorrows->where('status','PENDING') as $borrow)
        <tr>
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')->first()}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')->first()}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>

        </tr>
        @endforeach
    </tbody>
</table>

<div class="card bg-dark text-white">
    <h4 class="display-15" style="text-align:center;">On-time rentals</h4>
</div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;"
    class="table table-striped">
    <thead>
        <tr>
            <th style="width:40%">Book title</th>
            <th style="width:15%">Author</th>
            <th style="width:15%">Date of rental</th>
            <th style="width:15%">Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->readerBorrows->where('status','RETURNED') as $borrow)
        @if($borrow->returned_at <= $borrow->deadline)
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')->first()}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')->first()}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>
            </tr>
            @endif
            @endforeach
    </tbody>
</table>

<div class="card bg-dark text-white">
    <h4 class="display-15" style="text-align:center;">Late rentals</h4>
</div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;"
    class="table table-striped">
    <thead>
        <tr>
            <th style="width:40%">Book title</th>
            <th style="width:15%">Author</th>
            <th style="width:15%">Date of rental</th>
            <th style="width:15%">Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->readerBorrows->where('status','RETURNED') as $borrow)
        @if($borrow->returned_at > $borrow->deadline)
        <tr>
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')->first()}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')->first()}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>
        </tr>
        @endif
        @endforeach

    </tbody>
</table>

<div class="card bg-dark text-white">
    <h4 class="display-15" style="text-align:center;">Accepted rentals</h4>
</div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;"
    class="table table-striped">
    <thead>
        <tr>
            <th style="width:40%">Book title</th>
            <th style="width:15%">Author</th>
            <th style="width:15%">Date of rental</th>
            <th style="width:15%">Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->readerBorrows->where('status','ACCEPTED') as $borrow)
        <tr>
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')->first()}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')->first()}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="card bg-dark text-white">
    <h4 class="display-15" style="text-align:center;">Rejected rentals</h4>
</div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;"
    class="table table-striped">
    <thead>
        <tr>
            <th style="width:40%">Book title</th>
            <th style="width:15%">Author</th>
            <th style="width:15%">Date of rental</th>
            <th style="width:15%">Deadline</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->readerBorrows->where('status','REJECTED') as $borrow)
        <tr>
            <td>{{$books->where('id',$borrow->book_id)->pluck('title')->first()}}</td>
            <td>{{$books->where('id',$borrow->book_id)->pluck('authors')->first()}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->deadline}}</td>
            <td><a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-primary">Show borrow details</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<div id="fix-for-navbar-fixed-bottom-spacing" style="height: 40px;">&nbsp;</div>

@endsection