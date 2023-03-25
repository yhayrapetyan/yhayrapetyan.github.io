<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AdminUsersController extends Controller
{
    public function index()
    {
     $users = User::query()->paginate(10);
     return view('admin_panel/users_index',['users'=>$users]);
    }

    public function create()
    {
        return view('admin_panel/users_create');
    }

    public function store(Request $request)
{
        $validate = $request->validate([
            'name' => ['required', 'alpha'],
            'username' => ['required', 'alpha_dash', 'unique:users,username'],
            'password' => ['required', 'min:6'],
            'role' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
        ]);

        $user = User::create([
            'username' => $validate['username'],
            'name' => $validate['username'],
            'role' => $validate['role'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),

        ]);
        $user->save();

        return redirect()->route('admin.users.create')->withSuccess(["{$user['username']}  successfully registered!"]);

    }


    public function edit($id)
    {

        $user=User::query()->find($id);
        return view('admin_panel/users_update',['user'=>$user]);
    }

    public function update(Request $request,$id)
    {
        $user = User::query()->find($id);

        $validate = $request->validate([
            'name' => ['required', 'alpha'],
            'username' => ['required', 'alpha_dash', 'unique:users,username,'.$user->id],
            'role' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
        ]);

        $user->update($validate);
        $user->save();
        return redirect()->route('admin.users.index')->withSuccess(["{$user['username']} changed successfully"]);
    }

    public function destroy($id)
    {

        $user=User::query()->find($id);
        $user->delete();
        return redirect()->back()->withSuccess(["{$user['username']} deleted successfully "]);
    }

}
