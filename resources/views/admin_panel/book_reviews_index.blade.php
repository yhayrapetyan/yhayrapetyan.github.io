@extends('layouts.base_admin')

@include('includes/success_alert')

@section('select_table')
    <form action="{{ route('admin.books.index') }}" id="my-form" onchange="updateAction()" method="GET">
        <label for="tables">Choose a table:</label>
        <select id="tables" name="tables" >
            <option value="{{ route('admin.books.index') }}">Books</option>
            <option value="{{ route('admin.users.index') }}">Users</option>
        </select>
        <button type="submit">Submit</button>
    </form>

{{--    <script>--}}
{{--        function updateAction() {--}}
{{--            let form = document.getElementById("my-form");--}}
{{--            let select = document.getElementById("tables");--}}
{{--            form.action = select.options[select.selectedIndex].value;--}}
{{--        }--}}
{{--    </script>--}}

@endsection
@section('table_name')
    Reviews
@endsection

@section('head')
    <th>Id</th>
    <th>review</th>
    <th>rating</th>
    <th>book_id</th>
    <th>user_id</th>
    <th>&nbsp;&nbsp<th>
@endsection

@section('content')
    @foreach($reviews as $review)
        <tr class="clickable-row" id="{{$review['id']}}" role="alert">
            <td>{{$review['id']}}</td>
            <td>{{$review['review']}}</td>
            <td>{{$review['rating']}}</td>
            <td><a href="{{route('admin.books.edit',$review['book_id'])}}">{{$review['book_id']}}</a></td>
            <td><a href="{{route('admin.users.edit',$review['user_id'])}}">{{$review['user_id']}}</a></td>
            <td>
                <form  action={{route('admin.book_reviews.destroy',$review['id'] )}}} method='post'>
                    @method('DELETE')
                    @csrf
                    <div class="form-group">

                        <button onclick="confirmDelete('#deleteBookReviewForm')" class="button-77" role="button" style="background-color: #99b19c">Delete Review
                        </button>

                    </div>
                </form>

            </td>
            <td>
                <form  action={{route('admin.book_reviews.edit',$review['id'] )}} method='get'>
                    @csrf
                    <div class="form-group">

                        <button class="button-77" role="button" style="background-color: #99b19c">Change Review
                        </button>

                    </div>
                </form>

            </td>
        </tr>
    @endforeach
@endsection
@section('pagination')
    {{ $reviews->links('vendor/pagination/tailwind') }}
@endsection
