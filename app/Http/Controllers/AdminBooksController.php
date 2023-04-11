<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class AdminBooksController extends Controller
{
    public function index()
    {
        $books = Book::query()->paginate('10');
        return view('admin_panel/books_index', ['books' => $books]);
    }

    public function create()
    {
        return view('admin_panel/books_create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => ['required', 'alpha_dash',],
            'author' => ['required', 'alpha_dash'],
            'description' => ['required', 'ascii',],
            'cover_img' => ['image',],
            'genre' => ['required'],
        ]);

        $file = $request->file('cover_img');

        if (! is_null($file)) {
            $path = $file->store('public/images/covers');
        } else {
            $path = 'public/images/covers/base_cover.png';
        }
        $book = Book::create([
            'title' => $validate['title'],
            'author' => $validate['author'],
            'description' => $validate['description'],
            'cover_path' =>  str_replace('public/', '/storage/', $path),
            'genre' => $validate['genre'],
        ]);
        $book->save();

        return redirect()->back()->withSuccess(["{$validate['title' ]} created successfully"]);
    }


    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin_panel/books_update', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::query()->find($id);

        $validate = $request->validate([
            'title' => ['required', 'alpha_dash',],
            'author' => ['required', 'alpha_dash'],
            'description' => ['required', 'ascii',],
            'cover_img' => ['image',],
            'genre' => ['required'],
        ]);

        $book->update([
            'title' => $validate['title'],
            'author' => $validate['author'],
            'description' => $validate['description'],
            'genre' => $validate['genre'],
        ]);

        if (! is_null($request['cover_img'])) {
            $file = $request->file('cover_img');
            $old_path = substr($book['cover_path'], 9);
            $path = $file->store('public/images/covers');
            $book->update([
                'cover_path' => str_replace('public/', '/storage/', $path),
            ]);
            Storage::disk('public')->delete($old_path);
        }
        return redirect()->route('admin.books.index')->withSuccess(["{$validate['title']} changed successfully"]);
    }

    public function destroy($id)
    {
        $book = Book::query()->find($id);
        if(!str_contains($book['cover_path'],'base_cover'))
        {
            Storage::disk('public')->delete(substr($book['cover_path'], 9));
        }
        $book->delete();
        return redirect()->back()->withSuccess(["{$book['title']} deleted successfully"]);
    }
}
