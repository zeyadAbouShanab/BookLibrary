<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowRequest;
use App\Http\Requests\UpdateBorrowRequest;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsReader;

class BorrowController extends Controller
{
    public function __construct()
{
         $this->middleware('auth');
        $this->middleware('isReader')->only(['index','store','create']);
        $this->middleware('isLibrarian')->only(['list','update']);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $books = Book::all();

        return view('borrows/index', [
            'user' => $user,
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBorrowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::find($request->book) ;
        $user = Auth::user();
        Borrow::create([
            'reader_id' => $user->id,
            'book_id' => $book->id,
            'status' => 'PENDING',
        ]);
        return redirect()->route('books.show',$book->id);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        $book=Book::find($borrow->book_id);
        $user=User::find($borrow->reader_id);

        return view('borrows/detail', [
            'book' => $book,
            'user' => $user,
            'borrow' => $borrow,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBorrowRequest  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBorrowRequest $request, Borrow $borrow){
        $validated_data = $request->validated();
        if($validated_data['status'] === 'RETURNED'){
            $validated_data['returned_at'] = date('Y-m-d H:i:s');
            $validated_data['return_managed_by'] = Auth::id();
        }
        else{
            $validated_data['request_processed_at'] = date('Y-m-d H:i:s');
            $validated_data['request_managed_by'] = Auth::id();
        }
        
        
        $borrow->update($validated_data);
        return redirect()->route('borrows.show', $borrow->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $borrows = Borrow::all();
        $books = Book::all();


        return view('borrows/list', [
            'borrows' => $borrows,
            'books' => $books,
        ]);
    }
}