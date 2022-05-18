@extends('layouts.base')

@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 120px;">&nbsp;</div>

<div class="card bg-dark text-white">
            <h4 class="display-15" style="text-align:center;">Book Details</h4>
        </div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;" class="table table-striped">
    <thead>
        <tr>
            <th style="width:50%">Title</th>
            <th style="width:20%">Author</th>
            <th style="width:20%">Date of release</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->authors}}</td>
            <td>{{$book->released_at}}</td>
            <td><a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Show book</a></td>
        </tr>
    </tbody>
</table>

<div class="card bg-dark text-white">
            <h4 class="display-15" style="text-align:center;">Rental Details</h4>
        </div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;"  class="table table-striped">
    <thead>
        <tr>
            <th>Name of the reader</th>
            <th>Date of rental request</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$borrow->created_at}}</td>
            <td>{{$borrow->status}}</td>
        </tr>
    </tbody>
</table>

@if($borrow->status !== 'PENDING' && !is_null($borrow->request_processed_at) && !is_null(app\Models\User::find($borrow->request_managed_by)))
<div class="card bg-dark text-white">
            <h4 class="display-15" style="text-align:center;">Procession Details</h4>
        </div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;" class="table table-striped ">
    <thead>
        <tr>
            <th>Request processed at:</th>
            <th>Processed by:</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$borrow->request_processed_at}}</td>
            <td>{{ app\Models\User::find($borrow->request_managed_by)->name}}</td>
        </tr>
    </tbody>
</table>
@endif

@if($borrow->status == 'RETURNED' && !is_null($borrow->returned_at) && app\Models\User::find($borrow->return_managed_by))
<div class="card bg-dark text-white">
            <h4 class="display-15" style="text-align:center;">Return Details</h4>
        </div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;" class="table table-striped ">
    <thead>
        <tr>
            <th>Returned at:</th>
            <th>Returned managed by:</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$borrow->returned_at}}</td>
            <td>{{app\Models\User::find($borrow->return_managed_by)->name}}</td>
        </tr>
    </tbody>
</table>
@endif

@if($borrow->status == 'RETURNED' && $borrow->returned_at > $borrow->deadline)
<p style="text-align:center;"><button type="button" style="width:200px" class="btn btn-danger">Late rental</button></p>

@endif


@if(Auth::check() && (Auth::user()->is_librarian))
<div class="card bg-dark text-white">
            <h3 class="display-8" style="text-align:center;">Edit Rental</h3>
        </div>
<form style="vertical-align: middle;background-color:#E6E6FA;font-size:18px;font-weight:bold;padding-left:20px" action="{{ route('borrows.update', $borrow->id) }}" method="POST">

@method('put')
@csrf
<div class="form-group">
    <label for="deadline"><br>Rental deadline: </label>
    <input
        name="deadline"
        type="datetime-local"
        class="form-control @error('deadline') is-invalid @enderror"
        id="deadline"
        placeholder=""
        value="{{ old('', $borrow->deadline ) }}">

    @error('deadline')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
        <label for="status"><br>Rental status: </label>
        <select name="status" required id="status">
        <option value="" selected disabled hidden>Choose status</option>
            <option value="PENDING">PENDING</option>
            <option value="ACCEPTED">ACCEPTED</option>
            <option value="REJECTED">REJECTED</option>
            <option value="RETURNED">RETURNED</option>
        </select>
    </div>
<br>
<div class="form-group">
    <p style="text-align:center;"><button type="submit" style="width:200px" class="btn btn-primary">Update rental</button></p>
</div>
@endif

<div id="fix-for-navbar-fixed-bottom-spacing" style="height: 200px;">&nbsp;</div>

@endsection