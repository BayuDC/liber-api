<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Genre::create(['name' => 'Romance']);
        Genre::create(['name' => 'Horror']);
        Genre::create(['name' => 'Fantasy']);

        Book::create(['title' => 'Buku 1', 'author' => 'Saya Sendiri', 'genre_id' => 1]);
        Book::create(['title' => 'Buku 2', 'author' => 'Saya Sendiri', 'genre_id' => 1]);
        Book::create(['title' => 'Buku 3', 'author' => 'Temen Saya', 'genre_id' => 2]);
        Book::create(['title' => 'Ga Ada Judulnya', 'author' => 'Ga Tau Siapa', 'genre_id' => 3]);
    }
}
