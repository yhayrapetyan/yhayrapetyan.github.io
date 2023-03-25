@extends('layouts/base_admin')

@include('includes/success_alert')
@include('includes/errors_alert')

@section('head')
    <th>review</th>
    <th>rating</th>
    <th>book_id</th>
    <th>user_id</th>
    <th>&nbsp;</th>
@endsection

@section('content')
<form action="@yield('action', route('admin.book_reviews.store'))" method="POST" target="_self">
    @csrf
    @yield('method')
    <tr class="alert" role="alert">
        <td>
            <div class="form-group mb-3">
                <label class="label" for="review"></label>
                <input id="review" type="text" name="review" class="form-control" placeholder="Review"  value="@yield('review')" required>
            </div>
        </td>
        <td>
            <div class="form-group mb-3">
                <label class="label" for="rating"></label>
                <input id="rating" type="number" max="5" name="rating" class="form-control" placeholder="Rating" value="@yield('rating')" required>
            </div>
        </td>
        <td>
            <div class="form-group mb-3">
                <label class="label" for="password"></label>
                <input id="password" type="password" name="password" class="form-control" placeholder="Password" value="@yield('password')">

            </div>
        </td>
        <td>
            <div class="form-group mb-3">
                <label class="label" for="role"></label>
                <select id="role" name="role">
                    <option value='user'>user</option>
                    <option value='admin'>admin</option>
                </select>
            </div>
        </td>
        <td>
            <div class="form-group mb-3">
                <label class="label" for="email"></label>
                <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="@yield('email')" required >
            </div>
        </td>
    </tr>
    <div class="form-group">
        <button style="background-color: #99b19c;" type="submit"
                class="form-control btn btn-primary rounded submit px-3">Sign In
        </button>
    </div>
</form>
@endsection
