<?php

namespace App\Http\Controllers;

use App\Models\BookReview;
use Illuminate\Http\Request;
use App\Models\Book;


class BooksController extends Controller
{
    public function index()
    {
        $books = Book::query()->paginate(10);
        return view('main/books_index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::query()->find($id);
        $book_reviews = BookReview::query()
            ->select('book_reviews.*','users.username')
            ->join('users', 'book_reviews.user_id', '=', 'users.id')
            ->where('book_id', '=', $id)
            ->paginate(5);

        return view('main/books_show', ['book' => $book, 'book_reviews' => $book_reviews,]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::query()
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->orWhere('genre', 'LIKE', "%{$query}%" )
            ->paginate(10);

        return view('main/books_index', ['books' => $books]);
    }
}
