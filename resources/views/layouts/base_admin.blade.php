<!doctype html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{asset('css/pages/admin.css')}}>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/pages/admin.js')}}"></script>

</head>
<body>
@yield('select_table')
<section class="ft-co-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-4">
                <h2 class="heading-section">@yield('table_name')</h2>
            </div>
        </div>
        <div class="row">

            <table class="table">
                <thead class="thead-primary">
                <tr>
                    @yield('head')
                </tr>
                </thead>
                <tbody>

                @yield('content')
                </tbody>
            </table>
        </div>
        <div>
            @yield('pagination')
        </div>
    </div>
</section>
</body>
</html>


