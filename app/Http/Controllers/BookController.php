<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;

class BookController extends Controller {
    public function index() {
        return Book::all(['id', 'title', 'author']);
    }
    public function show(Book $book) {
        return $book->get(['id', 'title', 'author']);
    }
    public function store() {
    }
    public function update() {
    }
    public function destroy() {
    }
}
