<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Home Page</title>
<link rel="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/pages/home.css')}}">
<link rel="stylesheet" href="{{asset('css/components/login_buttons.css')}}">
</head>
<body>
<div class="button-container">
    <a href="{{ route('login') }}">
        <button class="button button-77" role="button">Log in</button>
    </a>
    <a href="{{ route('register') }}">
        <button class="button button-77" role="button">Sign up</button>
    </a>
</div>
</body>
</html>
