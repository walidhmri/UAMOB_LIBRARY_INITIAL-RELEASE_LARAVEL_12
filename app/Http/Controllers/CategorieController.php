<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Book::all();
        return view('books.categories', ['categories' => $categories]);
    }
    
}
