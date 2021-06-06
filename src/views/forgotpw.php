<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Andy Company - Forgot Password</title>
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



</head>

<body id="page-top">
    <!-- Navigation-->
    <?php include 'layout/header.php'; ?>

    <section class="masthead">
        <div class="container padding-bottom-3x mb-2 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="forgot">
                        <h2>Forgot your password?</h2>
                        <ol class="list-unstyled">
                            <li><span class="text-primary text-medium">1. </span>Enter your email or phone number
                                address below.</li>
                            <li><span class="text-primary text-medium">2. </span>Our system will send you password</li>
                            <li><span class="text-primary text-medium">3. </span>Use that password to login</li>
                        </ol>
                    </div>
                    <form class="card mt-4" action="checkForgotPw.php" method="POST">
                        <div class="card-body">
                            <div class="form-group text-black-50"> 
                            <label for="getPass">Enter your email address or phone number</label> 
                                    <input class="form-control" id="getPass" name="getPass" type="text">
                                    <small class="form-text text-muted">
                                        Enter the email address or phone number you used to register account. Then we will send password for you.</small>
                            </div>
                        </div>
                        <?php if (isset($_GET['error']))
            { ?>
                <p class="text-danger"> <?php echo $_GET['error']; ?>   </p>

            <?php }
            ?>

                        <div class="card-footer"> <button class="btn btn-success" type="submit">Get
                                Password</button>
                        </div>
                        <div class="text-center w-100">
                            <a href="/login1" class="text-primary ml-2">Back To Login</a></p>
                        </div>
                    </form>

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