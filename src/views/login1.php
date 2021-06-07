
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Andy Company</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/assets/css/home.css" rel="stylesheet" />
    <link href="/assets/css/login1.css" rel="stylesheet" />

    <style>
    h3 {
        margin-top: 10px;
        margin-bottom: 50px;
    }
    </style>

</head>

<body id="page-top">
    <!-- Navigation-->
    <?php include 'layout/header.php'; ?>

    <section class="masthead">

        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h3 class="section-heading text-muted ">Login</h3>

                            <?php if (isset($_GET['inform']))
                            { ?>

                            <p class="text-success"> <?php echo $_GET['inform']; ?> </p>

                            <?php }
                            ?>

                            <?php if (isset($_GET['success']))
                            { ?>

                            <p class="text-success"> <?php echo $_GET['success']; ?> </p>

                            <?php }
                            ?>
                            <form class="form-signin" action="/doLogin" method="POST">
                                <div class="form-label-group">
                                    <input type="username" id="username" name="username" class="form-control"
                                        value = "<?php if (isset($_COOKIE["member_login"])){ echo $_COOKIE["member_login"];} ?>" placeholder="Username" required autofocus>
                                    <label for="username">Username</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" name="password" class="form-control" 
                                    value="<?php if(isset($_COOKIE["member_password"])){ echo $_COOKIE["member_password"];}?>"
                                        placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember_me" 
                                    <?php if(isset($_COOKIE["member_login"])){ ?> checked <?php }  ?>>
                                    <label class="custom-control-label text-black-50" for="customCheck1"
                                     >Remember
                                        password</label>
                                </div>
                                <?php if (isset($_GET['wrong']))
                                { ?>

                                <p class="text-danger"> <?php echo $_GET['wrong']; ?> </p>

                                <?php }
                             ?>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign
                                    in</button>
                                <!-- <hr class="my-4">
                                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                        class="fab fa-google mr-2"></i> Sign in with Google</button>
                                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                        class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->

                            </form>
                            <div class="text-center">
                                <a href="/forgotpw">Forgot password?</a>
                            </div>
                            <div class="text-black-50 text-center">
                                <p>Don't have an account? <a href="/register">Register Here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>




    <!-- Footer-->
    <?php include 'layout/footer.php'; ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="/assets/mail/jqBootstrapValidation.js"></script>
    <script src="/assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="/assets/js/scripts.js"></script>

</body>

</html>