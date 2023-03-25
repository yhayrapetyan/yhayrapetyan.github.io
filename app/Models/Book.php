<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookReview;

class Book extends Model
{
    use HasFactory;

    public function bookReviews()
    {
        return $this->hasMany(BookReview::class);
    }

    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_path',
        'cover_img',
        'genre',

    ];

}
