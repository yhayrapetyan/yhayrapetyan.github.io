@extends('layouts.base_admin')

@include('includes/success_alert')

@section('select_table')
    <form action="{{ route('admin.users.index') }}" id="my-form" onchange="updateAction()" method="GET">
        <label for="tables">Choose a table:</label>
        <select id="tables" name="tables" >
            <option value="{{ route('admin.users.index') }}">Users</option>
            <option value="{{ route('admin.book_reviews.index') }}">Book Reviews</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <div class="form-group">
        <a href="{{ route('admin.books.create') }}">
            <button class="button-77" role="button" style="background-color: #99b19c">Create Book</button>
        </a>
    </div>

{{--    <script>--}}
{{--        function updateAction() {--}}
{{--            let form = document.getElementById("my-form");--}}
{{--            let select = document.getElementById("tables");--}}
{{--            let selectedValue = select.options[select.selectedIndex].value;--}}
{{--            console.log("Selected value: " + selectedValue);--}}
{{--            form.action = selectedValue;--}}
{{--            console.log("Form action: " + form.action);--}}
{{--        }--}}
{{--    </script>--}}
@endsection

@section('table_name')
    Books
@endsection

@section('head')
    <th>Id</th>
    <th>Title</th>
    <th>Author</th>
    <th>Description</th>
    <th>Cover</th>
    <th>Genre</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
@endsection

@section('content')
    @foreach($books as $book)
        <tr class="alert" role="alert">
            <td>{{$book['id']}}</td>
            <td>{{$book['title']}}</td>
            <td>{{$book['author']}}</td>
            <td style="white-space: pre-line">{{$book['description']}}</td>
            <td><img alt="cover_img" src={{asset($book['cover_path'])}} width="50" height="60"></td>
            <td>{{$book['genre']}}</td>
            <td>
                <form id="deleteBookForm" action={{route('admin.books.destroy',$book['id'] )}}} method='post'>
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <button onclick="confirmDelete('#deleteBookForm')" class="button-77" role="button" style="background-color: #99b19c">Delete Book
                        </button>
                    </div>
                </form>
            </td>
            <td>
                <form  action={{route('admin.books.edit',$book['id'] )}} method='get'>
                    @csrf
                    <div class="form-group">

                        <button class="button-77" role="button" style="background-color: #99b19c">Change Book
                        </button>

                    </div>
                </form>
            </td>
        </tr>
    @endforeach
@endsection

@section('pagination')
    {{ $books->links('vendor/pagination/tailwind') }}
@endsection
