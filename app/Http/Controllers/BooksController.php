<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
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
    public function create()
    {
        return view('books.create');
    }
  


public function store(Request $request)
{
    $request->validate([
        'book_name' => 'required|string|max:255',
        'Author' => 'required|string|max:255',
        'year' => 'required|string|max:4',
        'description' => 'required|string',
        'category' => 'required|string|max:255',
        'status' => 'required|string|max:50',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'pdf' => 'required|mimes:pdf|max:10000',
    ]);

    // ✅ رفع الصورة وتخزينها
    $imagePath = $request->file('image')->store('books/images', 'public');

    // ✅ رفع ملف الـ PDF وتخزينه
    $pdfPath = $request->file('pdf')->store('books/pdfs', 'public');

    $book = Book::create([
        'book_name' => $request->book_name,
        'Author' => $request->Author, // 
        'year' => $request->year,
        'description' => $request->description,
        'image' => $imagePath,
        'pdf' => $pdfPath,
        'category' => $request->category,
        'status' => $request->status,
    ]);

    return redirect()->route('dashboard')->with('success', 'Book added successfully!');
}

}