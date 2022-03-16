<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required|regex:/^[a-zA-Z\s]+$/',
            'genre' => 'required|exists:App\Models\Genre,name'
        ], [
            'author.regex' => 'The :attribute must only contain letters or space.',
            'genre.exists' => 'The :attribute does not exists.',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }


        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre_id = Genre::where('name', $request->genre)->first()?->id;
        $book->save();

        return response()->json($book, 201);
    }
    public function update(Book $book, Request $request) {
        $validator = Validator::make($request->all(), [
            'author' => 'nullable|regex:/^[a-zA-Z\s]+$/',
            'genre' => 'nullable|exists:App\Models\Genre,name'
        ], [
            'author.regex' => 'The :attribute must only contain letters or space.',
            'genre.exists' => 'The :attribute does not exists.',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

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
