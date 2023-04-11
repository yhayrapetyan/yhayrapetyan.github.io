@extends('layouts.base_admin')

@include('includes/success_alert')

@section('select_table')
    <form action="{{ route('admin.books.index') }}" id="my-form" onchange="updateAction()" method="GET">
        <label for="tables">Choose a table:</label>
        <select id="tables" name="tables" >
            <option value="{{ route('admin.books.index') }}">Books</option>
            <option value="{{ route('admin.book_reviews.index') }}">Book Reviews</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <div class="form-group">
        <a href="{{ route('admin.users.create') }}">
            <button class="button-77" role="button" style="background-color: #99b19c">Create User</button>
        </a>
    </div>

@endsection
@section('table_name')
Users
@endsection

@section('head')
    <th>Id</th>
    <th>Name</th>
    <th>Username</th>
    <th>role</th>
    <th>Email</th>
    <th>&nbsp;&nbsp<th>
    <th>&nbsp</th>
@endsection

@section('content')
    @foreach($users as $user)
        <tr class="clickable-row" id="{{$user['id']}}" role="alert">
            <td>{{$user['id']}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['username']}}</td>
            <td>{{$user['role']}}</td>
            <td>{{$user['email']}}</td>
            <td>
                <form id="deleteUserForm" action="{{ route('admin.users.destroy', $user['id']) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <button onclick="confirmDelete('#deleteUserForm')" class="button-77" role="button" style="background-color: #99b19c">Delete User</button>
                    </div>
                </form>

            </td>
            <td>
                <form  action={{route('admin.users.edit',$user['id'] )}} method='get'>
                    @csrf
                    <div class="form-group">

                            <button  class="button-77" role="button" style="background-color: #99b19c">Change
                            </button>
                    </div>
                </form>

            </td>
        </tr>
    @endforeach

@endsection

@section('pagination')
    {{ $users->links('vendor/pagination/tailwind') }}
@endsection
