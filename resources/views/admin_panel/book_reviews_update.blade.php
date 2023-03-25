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
    <form action="{{route('admin.book_reviews.update',$review['id']) }}" method="post" target="_self">
        @method('PATCH')
        @csrf
        <tr class="alert" role="alert">
            <td>
                <div class="form-group mb-3">
                    <label class="label" for="review"></label>
                    <input id="review" type="text" name="review" class="form-control" placeholder="Review"
                           value="{{$review['review']}}" required>
                </div>
            </td>
            <td>
                <div class="form-group mb-3">
                    <label class="label" for="rating"></label>
                    <input id="rating" type="number" max="5" name="rating" class="form-control" placeholder="Rating"
                           value="{{$review['rating']}}" required>
                </div>
            </td>
            <td>
                <div class="form-group mb-3">
                    <label class="label" for="book_id"></label>
                    <input id="book_id" type="number" name="book_id" class="form-control" placeholder="Book Id"
                           value="{{$review['book_id']}}">

                </div>
            </td>
            <td>
                <div class="form-group mb-3">
                    <label class="label" for="user_id"></label>
                    <input id="user_id" type="number" name="user_id" class="form-control" placeholder="User Id"
                           value="{{$review['user_id']}}">

                </div>
            </td>
        </tr>
        <div class="form-group">
            <button style="background-color: #99b19c;" type="submit"
                    class="form-control btn btn-primary rounded submit px-3">Change
            </button>
        </div>
    </form>
@endsection
