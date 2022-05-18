<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\BookFormRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function __construct()
{      
        $this->middleware('isLibrarian')->only(['create','store','edit','destroy','update']);
}

public function index(Request $request){
    $books = Book::where([
        ['title', '!=', Null],
        [function ($query) use ($request){
            if(($term = $request->term)){
                $query->orWhere('title','LIKE','%' . $term . '%')->orWhere('authors','LIKE','%' . $term . '%')->get();
            }
        }]
    ])
    ->orderBy("id", "desc")
    ->paginate(100);

    return view('search', compact('books'))
    ->with('i',(request()->input('page',1) - 1) * 5);
}


     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $user = Auth::user();
        return view('books/index', [
            'book' => $book,
            'user' => $user,
        ]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books/create', [
            'genres' => $genres,
        ]);
    }

    public function store(BookFormRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['language_code'] = 'hu';
        $book = Book::create($validated_data);
        $book->genres()->sync($validated_data['genres'] ?? []);
        return redirect()->route('main');
    }

    public function edit(Book $book) {
        $genres = Genre::all();
        return view('books/edit', [
            'book' => $book,
            'genres' => $genres,
        ]);
    }

    public function update(Book $book, UpdateBookRequest $request) {
        $validated_data = $request->validated();
        $request->validate([
            'isbn' => 'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i|unique:books,isbn,' . $book->id,
        ]);
        $book->fill($request->all());
         $book->save();
        $book->genres()->sync($validated_data['genres'] ?? []);
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('main');
    }
}