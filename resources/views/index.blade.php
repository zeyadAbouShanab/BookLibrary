@extends('layouts.base')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 70px;">&nbsp;</div>

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="mt-4 p-5 bg-dark text-white ">
            <h1 style="font-family: Monaco">Welcome to the MyLibrary!</h1>
            <p style="font-size: 125% ;font-family: Didot">A library where you can find different books of all genres</p>
        </div>
    </div>
</div>
<div class="container mt-3 ">
    <div class="container mt-3 ">
        <div class="card bg-dark text-white">
            <h1 class="display-8" style="font-family: Cursive;text-align:center;">Statistics</h1>
        </div>
        <table style="font-size: 125% ;color:white;border-collapse: collapse; border: none; background-color:#212529; color:colorname" class="table table-no-padding">
        <tbody>
              <tr style="color:white; border: none;">
                <td style="border: none;padding-left:300px"><strong>Number of users:</strong></td>
                <td style="border: none;padding-right:300px"><button type="button" class="btn btn-success btn-sm">{{count($users)}}</button></td>
            </tr>
              <tr style="border: none;">
                <td style="border: none;padding-left:300px"><strong>Number of genres:</strong></td>
                 <td style="border: none;padding-right:300px"><button type="button" class="btn btn-success btn-sm">{{count($genres)}}</button></td>
            </tr>
              <tr style="border: none;">
                <td style="border: none;padding-left:300px"><strong>Number of books:</strong></td>
                 <td style="border: none;padding-right:300px"> <button type="button" class="btn btn-success btn-sm">{{count($books)}}</button></td>
            </tr>
              <tr style="border: none;">
                <td style="border: none;padding-left:300px"><strong>Number of active rentals:</strong></td>
                 <td style="border: none;padding-right:300px">  <button type="button" class="btn btn-success btn-sm">{{count($rentals)}}</button></td>
            </tr>
        </tbody>
    </table>
    <div class="container mt-3 ">
        <div class="card bg-dark text-white">
            <h1 class="display-8" style="font-family: Cursive;text-align:center;">List of genres</h1>
        </div>
        <div class="row">
            @foreach ($genres as $genre)
            <div class="col-sm-4 my-4 ">
                <div class="card h-100 bg-dark text-white" >
                    <div class="card-body">
                        <h5 class="card-title">{{ $genre->name }}</h5>

                        <p class="card-text"><strong>Style:</strong> {{ $genre->style }}</p>
                        <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-primary">View books in this
                            genre</a>
                    </div>
                </div>
            </div>
            @endforeach
            <hr class="my-4">
        </div>
    </div>
    @endsection