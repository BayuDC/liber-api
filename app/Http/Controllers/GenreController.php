<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|unique:App\Models\Genre,name'
        ], [
            'name.regex' => 'The genre :attribute must only contain letters or space.',
            'name.unique' => 'The genre :attribute must be unique'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();

        return response()->json($genre->fresh(), 201);
    }
    public function update(Genre $genre, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|regex:/^[a-zA-Z\s]+$/|unique:App\Models\Genre,name'
        ], [
            'name.regex' => 'The genre :attribute must only contain letters or space.',
            'name.unique' => 'The genre :attribute must be unique'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if ($genre->name) $genre->name = $request->name;
        $genre->save();

        return response()->json($genre->fresh(), 200);
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
