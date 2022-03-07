<!doctype html>
<html lang="en">



<head>

    <meta charset="utf-8" />
    <title>Login | Webmaster Tracking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Webmaster Tracking" name="description" />
    <meta content="Webmaster Tracking" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="bg-pattern">
    <div class="bg-overlay"></div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="">
                                <div class="text-center">
                                    <a href="index.html" class="">
                                        <img src="assets/images/logo-dark.png" alt="" height="24"
                                            class="auth-logo logo-dark mx-auto">
                                        <img src="assets/images/logo-light.png" alt="" height="24"
                                            class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>
                                <!-- end row -->
                                <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                <p class="mb-5 text-center">Sign in to continue to Upzet.</p>
                                <form class="form-horizontal" action="{{ route('post_login') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="email" class="form-control" id="username" name="email"
                                                    placeholder="Enter username">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" class="form-control" name="password" id="userpassword"
                                                    placeholder="Enter password">
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="remember_me" class="form-check-input"
                                                            id="customControlInline">
                                                        <label class="form-label" class="form-check-label"
                                                            for="customControlInline">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-md-end mt-3 mt-md-0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid mt-4">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Log In</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>


</html>