<!doctype html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href={{asset('css/pages/admin.css')}}>

</head>
<body>

@include('includes/success_alert')
@include('includes/errors_alert')


<section class="ft-co-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-4">
                <h2 class="heading-section">Book Reviews</h2>
            </div>
        </div>
        <div class="row">

            <table class="table">
                <thead class="thead-primary">
                <tr>
                    <th>Review</th>
                    <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{route('book_reviews.store')}}" method="POST" target="_self" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$book_id}}">
                    <tr>
                        <td>
                            <div class="form-group mb-3">
                                <label for="review" >Review</label>
                                <textarea id="review" name="review" rows="10" cols="70"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class="form-group mb-3">
                                <label for="rating">Rating</label>
                                <input id="rating" name="rating" type="number" min="1" max="5">
                            </div>
                        </td>
                    </tr>
                    <div class="form-group">
                        <button style="background-color: #99b19c;" type="submit"
                                class="form-control btn btn-primary rounded submit px-3"> Leave Review
                        </button>
                    </div>
                </form>
                <button style="background-color: #99b19c; margin-left: 10px; color: white; border-radius: 5px;"
                        onclick="history.back()">Back
                </button>
                </tbody>
            </table>
        </div>
        <div>

        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>







