<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('sass/main.css') }}" rel="stylesheet">

    <!-- Custom styles for registration form -->
    <style>
        .bg-register {
            background-color: #f8f9fa;
        }

        .card-register {
            border: none;
        }
    </style>
</head>

<body class="bg-register">

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                <div class="card card-register">
                    <div class="card-body p-5">

                        <h2 class="text-center mb-4">Registration Form</h2>

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
