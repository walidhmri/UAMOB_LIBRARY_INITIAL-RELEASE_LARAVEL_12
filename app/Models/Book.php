<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // السماح بالتخزين الجماعي للحقول
    protected $fillable = [
        'book_name',
        'Author',
        'year',
        'description',
        'image',
        'pdf',
        'category',
        'status',
    ];
}
