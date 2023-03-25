<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/pages/user_book_reviews_index.css')}}">
    <link rel="stylesheet" href="{{asset('css/components/alerts.css')}}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>MY Reviews</title>
</head>
<body>
@include('includes/success_alert')
@include('includes/errors_alert')


@foreach($keys as $i => $key)
    <article class="book-review" >
        <div class="img-container">
            <img alt="cover_img" src="{{asset($books[$key]['cover_path'])}}" height="250">
        </div>
        <div class="text-container">
            <h1 class="book-title">Title: {{$books[$key]['title']}}</h1>
            <form action="{{route('book_reviews.destroy',$book_reviews[$i]['id'])}}" method="POST">
                @csrf
                @method('DELETE')
                <button >Delete Review</button>
            </form>
            <a href="{{ route('book_reviews.edit',$book_reviews[$i]['id']) }}">
                <button>Change Review</button>
            </a>
            <h1>Author: {{$books[$key]['author']}}</h1>
            <h1>Rating:{{ round($book_reviews->average('rating'),2)}}</h1>
            <h1 >Review</h1>
            <p style="white-space: pre-line;">{{$book_reviews[$i]['review']}}</p>
        </div>
    </article>
@endforeach
</body>
</html>
