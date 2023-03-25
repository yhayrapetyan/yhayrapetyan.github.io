<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/pages/user_book_reviews_index.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Password recovery</title>
</head>
<body>
@include('includes/errors_alert')
<article class="book-review">
    <form   action="{{route('recover.password')}}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Please write your email">
        <button style="float:right; background-color: #e8e88a; border-radius: 5px; padding:8px; " type="submit" > confirm</button>
    </form>
</article>
</body>
</html>
