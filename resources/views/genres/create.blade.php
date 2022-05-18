@extends('layouts.base')

@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 140px;">&nbsp;</div>

<div class="card bg-dark text-white">
            <h3 class="display-8" style="text-align:center;">New Genre</h3>
        </div>
<form style="background-color:#E6E6FA;font-size:20px;font-weight:bold;padding-left:20px" action="{{ route('genres.store') }}" method="POST">

@csrf

<div class="form-group">
    <label for="name"><br>Genre name: </label>
    <input
        name="name"
        type="text"
        class="form-control @error('name') is-invalid @enderror"
        id="name"
        placeholder="Ex. Comedy"
        value="{{ old('name', '') }}">

    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group">
        <label for="style"><br>Genre style: </label>
        <select name="style" required id="style">
        <option value="" selected disabled hidden>Choose style</option>
            <option value="primary">Primary</option>
            <option value="secondary">Secondary</option>
            <option value="success">Success</option>
            <option value="danger">Danger</option>
            <option value="warning">Warning</option>
            <option value="info">Info</option>
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select>
    </div>
<br>
<div class="form-group">
    <p style="text-align:center;"><button type="submit" style="width:200px" class="btn btn-primary">Add new genre</button></p>
</div>
<div id="fix-for-navbar-fixed-bottom-spacing" style="height: 250px;">&nbsp;</div>

@endsection