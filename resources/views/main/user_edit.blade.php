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
        box-sizing: border-box;
        /*float: left;*/
        width: 33.3333333333%;
        padding: 0;
        min-height: 50px;
    }
    .info-box input{
        display: block;
    }
    .info-box form{
        overflow: hidden;
    }
    .info-box label{
        font-size: 30px;
    }
    .info-box button{
        margin-left: 10px;
        float: right;
    }
</style>
<article class="wrapper-2017">
    <div class="info-box">
        <form  class="info-box" action="{{route('users.update', $user['id'])}}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{$user['name']}}" >

            <label for="username">Username</label>
            <input id="username" name="username" type="text" value="{{$user['username']}}" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="text" value="{{$user['email']}}" required>

{{--            <a href="{{route('recover.password',['email' => $user['email']])}}">--}}
{{--                <button class="btn  btn-success" type="button">Set new Password</button>--}}
{{--            </a>--}}
            <button class="btn  btn-success" type="submit" style="margin-bottom: 15px" >Change</button>
        </form>

        <form action="{{route('recover.password')}}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{$user['email']}}">
            <button class="btn  btn-success" type="submit">Set new Password</button>
        </form>
    </div>

</article>

</body>
</html>
