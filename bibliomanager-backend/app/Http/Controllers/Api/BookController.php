<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return response()->json([
            'success' => true,
            'result' => $books
        ]);
    }

    public function show($slug)
    {
        $book = Book::where('slug', $slug)->first();

        if ($book) {
            return response()->json([
                'success' => true,
                'result' => $book
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Ops! Libro non trovato'
            ]);
        }
    }
}
