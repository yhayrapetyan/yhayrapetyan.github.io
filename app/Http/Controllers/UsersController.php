<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class UsersController extends Controller
{
    public function show()
    {
        $user = User::find(Auth::id());
        $reviews_count = BookReview::query()->where('user_id',  $user['id'])->count();
        return view('main/user_show',['user' => $user, 'reviews_count' => $reviews_count]);

    }

    public function edit($id)
    {
       $user = User::find($id);
       return view('main/user_edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::query()->find($id);

        $validate = $request->validate([
            'name' => ['required', 'alpha'],
            'username' => ['required', 'alpha_dash', 'unique:users,username,'.$user->id],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
        ]);

        $user->update($validate);
        return redirect()->route('users.show')->withSuccess(["{$user['username']} changed successfully"]);

    }

}
