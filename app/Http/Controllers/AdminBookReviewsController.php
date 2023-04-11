<?php

namespace App\Http\Controllers;

use App\Models\BookReview;
use http\Env\Response;
use Illuminate\Http\Request;


class AdminBookReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = BookReview::query()->paginate(10);
        return view('admin_panel/book_reviews_index',['reviews'=>$reviews]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_panel/book_reviews_create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = BookReview::query()->find($id);
        return view('admin_panel/book_reviews_update',['review'=>$review]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $review = BookReview::query()->find($id);

        $validate = $request->validate([
            'review' => [ 'ascii'],
            'rating' => ['digits_between:1,5'],
            'book_id' =>['exists:books,id'],
            'user_id' => ['exists:users,id'],

        ]);
        $review->update([
            'review' => $validate['review'],
            'rating' => $validate['rating'],
            'book_id' => $validate['book_id'],
            'user_id' => $validate['user_id'],
        ]);

        return redirect()->route('admin.book_reviews.index')->withSuccess(["review changed successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = BookReview::query()->find($id);
        $review->delete();
        return redirect()->back()->withSuccess(["review deleted successfully"]);
    }
}
