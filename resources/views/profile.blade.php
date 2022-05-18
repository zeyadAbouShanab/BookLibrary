@extends('layouts.base')
@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 120px;">&nbsp;</div>

<div class="card bg-dark text-white">
            <h3 class="display-8" style="text-align:center;">Profile Info</h3>
        </div>

        <table style="vertical-align: middle;background-color:#E6E6FA;font-size:24px;text-align:center;" class="table table-striped ">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @if($user->is_librarian)
            <td>Librarian</td>
            @else
            <td>Reader</td>
            @endif
        </tr>
    </tbody>
</table>
<div id="fix-for-navbar-fixed-bottom-spacing" style="height: 320px;">&nbsp;</div>

@endsection