@extends('admin_panel/books_create')

@section('action')
    {{route('admin.books.update',$book['id'])}}
@endsection
@section('method')
    @method('PATCH')
@endsection
@section('title',$book['title'])
@section('author',$book['author'])
@section('description', $book['description'])
@section('cover')
    <div>
        <p >current cover</p>
        <img alt="cover_img" src={{$book['cover_path']}} width="50" height="60">
    </div><br><br>
@endsection
@section('genre', $book['genre'])


@section('submit_name' , 'Update')


