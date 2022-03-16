<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller {
    public function index() {
        return Book::all(['id', 'title', 'author']);
    }
    public function show(Book $book) {
        return $book;
    }
    public function store(Request $request) {
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre_id = Genre::where('name', $request->genre)->first()?->id;
        $book->save();

        return response()->json($book, 201);
    }
    public function update(Book $book, Request $request) {
        if ($request->title) $book->title = $request->title;
        if ($request->author) $book->author = $request->author;
        if ($request->genre) $book->genre_id = Genre::where('name', $request->genre)->first()?->id;
        $book->save();

        return response()->json($book, 200);
    }
    public function destroy(Book $book) {
        $book->delete();

        return response()->noContent();
    }
}
