<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/pages/books_show.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Book</title>
</head>
<body>
@include('includes/success_alert')
@include('includes/errors_alert')

<div style="margin-left: 0;">
    <img alt="cover_img" src="{{asset($book['cover_path'])}}" height="250">
</div>
<div>
    <h1 style=" margin-top: -230px; margin-left: 400px;"> {{$book['title']}}</h1>
    <h1 style=" margin-left: 400px;">{{$book['author']}}</h1>
    <h1 style="margin-top: 50px; margin-left: 400px;">Rating:{{round($book_reviews->average('rating'))}}</h1>
</div>
<br>
<a href="{{asset(route('book_reviews.create',['book_id' =>$book['id']]))}}">
    <button style="margin-left: 400px; background-color:#99b19c;padding: 10px 20px">Leave Review</button>
</a>

<div>
    <p style="font-size: 50px; margin-left: 50px;">Description</p>
    <p style="white-space: pre-line; margin-left: 50px;">{{$book['description']}} </p>
</div>
<h1 style="text-align: center">Reviews</h1>


@foreach($book_reviews as $book_review)
    <div>
        <div class="profile-icon">
            <img src="{{asset('images/profile_img.png')}}" alt="Profile Icon">
            <p>{{$book_review['username']}}</p>
        </div>
        <p style="margin-left: 150px;margin-top:30px; white-space: pre-line">{{$book_review['review']}}</p><br><br>
    </div>
@endforeach
<div style="{{asset('css/test.css')}}">{{ $book_reviews->links('vendor/pagination/tailwind') }}</div>
</body>
</html>
