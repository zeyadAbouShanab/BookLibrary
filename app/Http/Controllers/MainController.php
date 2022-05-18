<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $users = User::all();
        $books = Book::all();
        $genres = Genre::all();
       

        $rentals = Borrow::where('status', '=', 'ACCEPTED')->get();

        return view('index', [
            'users' => $users,
            'books' => $books,
            'genres' => $genres,
            'rentals' => $rentals,
        ]);
    }

    public function genre($genre)
    {
        $users = User::all();
        $books = Book::all();
        $genres = Genre::all();
        $rentals = Borrow::where('status', '=', 'ACCEPTED')->get();

        
        return view('index', [
            'users' => $users,
            'books' => $books,
            'genres' => $genres,
            'rentals' => $rentals,
        ]);
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function show()
    {
        $user = Auth::user();
        return view('profile', [
            'user' => $user,
        ]);
    }
}
