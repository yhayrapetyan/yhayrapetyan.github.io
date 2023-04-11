<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/pages/user_book_reviews_index.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Books</title>
</head>
<body>
@include('includes/success_alert')
@include('includes/errors_alert')
<div class="search">
<form action="{{ route('books.search') }}" method="GET">
    @csrf
    <label for="query"></label>
    <input id="query" type="text" name="query" placeholder="Search...">
    <button type="submit"  >Search</button>
</form>
</div>
<div class="my-profile" >
    <a href="{{route('users.show')}}">
        <i class="glyphicon glyphicon-user">My Profile</i>
    </a>

</div>
@foreach($books as $book)
    <article class="book-review">
        <a href="{{route('books.show',$book['id'])}}" style="text-decoration: none; color:black"  >
            <div class="img-container">
                <img src="{{asset($book['cover_path'])}}" alt="Cover img" >
            </div>
            <div class="text-container">
                <h2 class="u-custom-font u-font-ubuntu u-text u-block-f416-36">
                    Title: {{$book['title']}}
                </h2>
                <h3 class="u-custom-font u-font-ubuntu u-text u-block-f416-38">Author:{{$book['author']}}</h3>
                <p class="u-text u-text-grey-40 u-block-f416-37">{{$book['description']}}</p>
                <h3 class="u-custom-font u-font-ubuntu u-text u-block-f416-38">Genre: {{$book['genre']}}</h3>
            </div>
        </a>
    </article>
@endforeach
<div>{{ $books->links('vendor/pagination/tailwind') }}</div>
</body>
</html>
