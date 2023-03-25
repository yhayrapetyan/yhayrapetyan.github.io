<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/pages/login.css')}}">
    <title>Recovery</title>
</head>
<body>
@include('includes.errors_alert')
<form action="{{route('check.code')}}" method="post">
    @csrf
    <label for="code">Code</label>
    <input id="code" type="number" name="code" size="6">
    <input type="submit">
</form>
</body>
</html>
