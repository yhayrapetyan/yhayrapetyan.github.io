<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>User</title>
</head>
<body>
@include('includes/errors_alert')
@include('includes/success_alert')
<style>
    body {
        background-image: url("/images/background_img.jpg");
        background-size: cover;
    }
    article.wrapper-2017 {
        position: relative;
        transition: 0.3s ease-in-out;
        font-size: 20px;
        margin: auto;
        max-width: 50%;
        padding: 24px;
        background: white ;
        border-radius: 8px;
        box-shadow: 0 0 0 1px rgba(53,72,91,.07), 0 2px 2px rgba(0,0,0,.01), 0 4px 4px rgba(0,0,0,.02), 0 10px 8px rgba(0,0,0,.03), 0 15px 15px rgba(0,0,0,.03), 0 30px 30px rgba(0,0,0,.04), 0 70px 65px rgba(0,0,0,.05);
    }

    p{
        font-size: 25px;
    }
    .info-box .info {
        display: block;
        box-sizing: border-box;
        /*float: left;*/
        width: 33.3333333333%;
        padding: 0;
        min-height: 50px;
    }
</style>
<article class="wrapper-2017">
    <div class="info-box">
        <a href="{{route('logout')}}">
            <button  style="float: right;" type="button" class="btn btn-warning mb-2 mx-1">
                Log Out
            </button>
        </a>
        <p>Name: {{$user['name']}}</p>
        <p>Username: {{$user['username']}}</p>
        <p>Email: {{$user['email']}}</p>
        <a href="{{route('book_reviews.show',Auth::id())}}" ><p>Reviews: {{$reviews_count}}</p></a>
        <div class="d-flex flex-wrap justify-content-end">
            <a href="{{route('users.edit',  Auth::id())}}">
            <button type="button" class="btn  btn-success">Change</button>
            </a>
        </div>
    </div>

</article>

</body>
</html>
