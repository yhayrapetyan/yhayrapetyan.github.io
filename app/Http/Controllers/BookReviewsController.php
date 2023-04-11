<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BookReview;
use Illuminate\Support\Facades\Redirect;


class BookReviewsController extends Controller
{
    public function show()
    {
        $book_reviews = BookReview::query()->where('user_id', Auth::id())->get();

        if($book_reviews->isEmpty())
        {
            return redirect()->route('user.index')->withErrors("you don't have any reviews");
        }
        $books = collect()->mapInto(Book::class);
        foreach($book_reviews as $review)
        {
            $book = Book::query()->find($review['book_id']);
            $books->push($book);
        }
        return view('main/book_reviews_index',
            [
                'book_reviews' => $book_reviews,
                'books' => $books,
                'keys' => array_keys($books->toArray()),
            ]);
    }
    public function create(Request $request)
    {
        $book_id = $request->query('book_id');
        return view('main/book_reviews_create',['book_id'=>$book_id]);
    }

    public function store(Request $request)
    {

        $book_id = $request->input('book_id');
        if(BookReview::query()
            ->where('book_id','=', $book_id)
            ->where('user_id', '=', Auth::id())
            ->exists())
        {
            return redirect()->route('books.show', $book_id)->withErrors("you can't create second review for same book");
        }
        $validate = $request->validate([
           'review' => ['required', 'ascii' ],
            'rating' => ['integer'],
        ]);
         BookReview::query()->create([
            'review' =>$validate['review'],
            'rating' => $request['rating'],
            'book_id' => $book_id,
            'user_id' => Auth::id(),
        ]);


        return redirect()->route('books.show', $book_id)->withSuccess(['your review created successfully']);
    }

    public function edit($id)
    {
        $book_review = BookReview::find($id);
        return view('main/book_reviews_edit',['book_review' => $book_review]);
    }
    public function update(Request $request, $id)
    {

        $book_review = BookReview::query()->find($id);
        $validate = $request->validate([
           'review' => ['required', 'ascii'],
            'rating' => ['integer', 'min:1', 'max:5']
        ]);

        $book_review->update([
            'review' => $validate['review']
        ]);


        if(!is_null($validate['rating'])){

            $book_review->update([
                'rating' => $validate['rating']
            ]);
        }
        return redirect()->route('book_reviews.show',$id)->withSuccess(['your review updated successfully']);
    }

    public function destroy($id)
    {

        BookReview::destroy($id);
        return redirect()->route('users.show')->withSuccess(['your review deleted successfully!']);
    }
}
