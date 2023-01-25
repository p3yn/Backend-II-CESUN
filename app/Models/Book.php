<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors(){ 
        return $this->belongsTo(Author::class, 'book:author');
    }    

    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'author', 'release_year', 'isbn'];
}
