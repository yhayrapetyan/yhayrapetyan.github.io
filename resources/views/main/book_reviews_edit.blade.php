<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/pages/user_book_reviews_edit.css')}}">
    <link rel="stylesheet" href="{{asset('css/components/alerts.css')}}">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>MY Reviews</title>
</head>
<body>
@include('includes/success_alert')
@include('includes/errors_alert')



<article class="book-review">

    <div class="text-container">
        <form  class="text-container" method="POST" action="{{ route('book_reviews.update', $book_review['id']) }}">
            <label for="review">Review</label>
            <textarea id="review" name="review" >{{$book_review['review']}}</textarea>

            <label for="rating">Rating</label>
            <input id="rating" name="rating" type="number" min="1" max="5" value="{{$book_review['rating']}}">
                @csrf
                @method('PATCH')
                <button type="submit">Change</button>
        </form>
    </div>
</article>

</body>
</html>

