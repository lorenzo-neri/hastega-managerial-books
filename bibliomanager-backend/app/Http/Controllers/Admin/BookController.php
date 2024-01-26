<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('user_id', Auth::id())->get();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');

        if ($request->has('image')) {
            $path = Storage::put('images', $request->image);
            $val_data['image'] = $path;
        }

        $val_data['user_id'] = Auth::id();
        $new_book = Book::create($val_data);

        return to_route('admin.books.index', $new_book)->with('message', 'Libro aggiunto correttamente!📖');
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

        if ($book->user_id === Auth::id()) {
            return view('admin.books.show', compact('book'));
        }

        abort(404, 'Questo libro non esiste');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        if ($book->user_id === Auth::id()) {

            return view('admin.books.edit', compact('book'));
        }

        abort(404, 'Questo libro non esiste');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $val_data = $request->validated();

        if ($request->has('image')) {

            $path = Storage::put('images', $request->image);
            $val_data['image'] = $path;

            if (!is_Null($book->image) && Storage::fileExists($book->image)) {
                Storage::delete($book->image);
            }
        }

        $val_data['slug'] = Str::slug($request->title, '-');

        $book->update($val_data);

        if ($request->has('user_id')) {
            $book->user_id()->sync($val_data['user_id']);
        }

        return to_route('admin.books.show', $book)->with('message', 'Libro modificato con successo! 🖋');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->user_id === Auth::id()) {
            if ($book->image) {
                Storage::delete($book->image);
            }

            $book->delete();

            return to_route('admin.books.index')->with('message', 'Libro eliminato correttamente 👌');
        }

        abort(403, 'Non puoi cancellare questo libro!');
    }

    public function recycle()
    {
        $trashed_books = Book::onlyTrashed()->orderByDesc('id')->get();

        return view('admin.books.recycle', compact('trashed_books'));
    }

    public function restore($id)
    {

        $book = Book::onlyTrashed()->find($id);
        //dd($book);

        //$book->restore();

        if ($book) {
            $book->restore();
            return redirect()->route('admin.books.recycle')->with('status', 'Libro ripristinato con successo♻️');
        }
    }
}
