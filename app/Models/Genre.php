<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Genre extends Model {
    public $timestamps = false;

    public function books() {
        return $this->hasMany(Book::class);
    }
}
