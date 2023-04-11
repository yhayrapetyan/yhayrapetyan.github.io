<!doctype html>
<html lang="en">
<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/pages/login.css')}}">

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
@include('includes/errors_alert')
<section class="ft-co-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Sign up</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url('{{asset('/images/bg-1.jpg')}} ')">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                        </div>
                        <form action={{route('registering')}} class="signing-form" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="name">Name</label>
                                <input id="name" type="text"  name="name" class="form-control" placeholder="Name" >
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="username">Username</label>
                                <input id="username" type="text"  name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control" placeholder="Password"
                                       required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password_confirm">Password Confirm</label>
                                <input id="password_confirm" type="password" name="password_confirm" class="form-control" placeholder="Password"
                                       required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>>
