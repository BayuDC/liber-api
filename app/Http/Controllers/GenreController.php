<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Genre;
use Exception;

class GenreController extends Controller {
    public function index() {
        return Genre::all();
    }
    public function show(Genre $genre) {
        return $genre;
    }
    public function store(Request $request) {
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();

        return response()->json($genre, 201);
    }
    public function update(Genre $genre, Request $request) {
        if ($genre->name) $genre->name = $request->name;

        return response()->json($genre, 200);
    }
    public function destroy(Genre $genre) {
        try {
            $genre->delete();

            return response()->noContent();
        } catch (Exception) {
            return response()->noContent(406);
        }
    }
}
