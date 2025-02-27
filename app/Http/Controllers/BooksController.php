<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('welcome', ['books' => $books]);
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }
        return view('books.index', ['book' => $book]);
    }
}
