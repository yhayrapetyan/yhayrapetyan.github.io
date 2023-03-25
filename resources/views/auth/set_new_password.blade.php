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
@include('includes/success_alert')
@include('includes/errors_alert')
<section class="ft-co-section" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Write your new password </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <form action={{route('set.new.password')}} class="signing-form" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label class="label" for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password"
                           required>
                </div>
                <div class="form-group mb-3">
                    <label class="label" for="password">Password Confirm</label>
                    <input id="password" type="password" name="password_confirm" class="form-control" placeholder="Password"
                           required>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section>
</body>
</html>
