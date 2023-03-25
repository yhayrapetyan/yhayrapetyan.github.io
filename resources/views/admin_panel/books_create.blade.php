@extends('layouts/base_admin')

@include('includes/success_alert')
@include('includes/errors_alert')


@section('table_name')
    Books
@endsection

@section('head')
    <th>Title</th>
    <th>Author</th>
    <th>Description</th>
    <th>Cover</th>
    <th>Genre</th>
    <th>&nbsp;</th>
@endsection

@section('content')
    <form action="@yield('action', route('admin.books.store'))" method="POST" target="_self" enctype="multipart/form-data">
    @yield('method')
        @csrf
    <tr>
        <td>
            <div class="form-group mb-3">
                <label class="label" for="title"></label>
                <input id="title" type="text" name="title" class="form-control" placeholder="Title"  value="@yield('title')" required>
            </div>
        </td>
        <td>
            <div class="form-group mb-3">
                <label class="label" for="author"></label>
                <input id="author" type="text" name="author" class="form-control" placeholder="Author"  value="@yield('author')" required >
            </div>
        </td>
        <td>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="10" cols="30">@yield('description')</textarea>
            </div>
        </td>
        <td>
            @yield('cover')
            <div>
                <input type="file"  name="cover_img">
            </div>
        </td>
        <td>
            <div class="form-group mb-3">
                <label class="label" for="genre"></label>
                <input id="genre" type="text" name="genre" class="form-control" placeholder="Genre"  value="@yield('genre')" required>
            </div>
        </td>
    </tr>
    <div class="form-group">
        <button style="background-color: #99b19c;" type="submit"
                class="form-control btn btn-primary rounded submit px-3">@yield('submit_name','Create')
        </button>
    </div>
    </form>
    <button style="background-color: #99b19c; margin-left: 10px; color: white; border-radius: 5px;" onclick="location.href='{{ route('admin.books.index') }}'">Back</button>
@endsection
