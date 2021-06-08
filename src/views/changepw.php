<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Andy Company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/boootstrap/3.3.6/js/bootstrap.min.js"></script>
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

    <link href="/assets/css/register.css" rel="stylesheet">



</head>

<body id="page-top">
    <!-- Navigation-->
    <?php include 'layout/header.php'; ?>


    <header class="masthead">
        <div class="container">
            <form name="changePassForm" class="changePassForm" action="/doChangePass" method="POST">
                <div class="text-center">
                    <br>
                    <h2 class="section-heading text-black-50">Change Password</h2>
                    <br>

                    <!-- <h3 class="section-subheading text-muted">Get started with your free account.</h3> -->
                </div>
                <div class="group row">
                    <label for="currentpass" class="col-3 col-form-label text-black-50">Current Pass:</label>
                    <div class="col-9">
                        <input type="password" class="form-control col-9" name="currentpass" id="currentpass"
                            onfocus="this.placeholder=''" placeholder="Enter Current Password ..." required>
                        <div class="text-left">
                            <span id="availpass"> </span>
                        </div>
                    </div>
                </div>


                <div class="group row">
                    <label for="newpass" class="col-3 col-form-label text-black-50">New Pass:</label>
                    <div class="col-9">
                        <input type="password" class="form-control col-9" id="newpass" name="newpass"
                            onfocus="this.placeholder=''" placeholder="New Password ..." required>
                        <div class="text-left">
                            <span id="availNewpass"> </span>
                        </div>
                    </div>
                </div>

                <div class="group row">
                    <label for="confirmnewpass" class="col-3 col-form-label text-black-50">Confirm Pass:</label>
                    <div class="col-9">
                        <input type="password" class="form-control col-9" id="confirmnewpass" name="confirmnewpass"
                            onfocus="this.placeholder=''" placeholder="Confirm  New Password ..." required>
                        <div class="text-left">
                            <span id="availCfNewpass"> </span>
                        </div>
                    </div>
                </div>
                <!-- <div class="group row">
                    <label for="password" class="col-3 col-form-label text-black-50">Password:</label>
                    <div class="col-9">
                        <input type="password" class="form-control col-9" name="password" id="password"
                            onfocus="this.placeholder=''" 
                            placeholder="Enter Password ..." required>
                        <div class="text-left">
                            <span id="availpass"> </span>
                        </div>
                    </div>

                </div> -->
                <?php if (isset($_GET['wrong']))
                                { ?>

                <p class="text-danger"> <?php echo $_GET['wrong']; ?> </p>

                <?php }
                             ?>
                <?php if (isset($_GET['success']))
                                { ?>

                <p class="text-success"> <?php echo $_GET['success']; ?> </p>

                <?php }
                             ?>

                <div>
                    <button name="btnSubmit" type="submit" class="btn btn-primary btnChangepass"> Change
                        Password</button>

                    <a type="button" name="exitChangepass" id="exitChangepass" href="/info"
                        class="btn btn-primary exitChangepass">Exit</a>
                </div>

                <br>
            </form>
        </div>
    </header>



    <script type="text/javascript">
    $(document).ready(function() {


        $("#newpass").blur(function() {
            var newpass = $(this).val();
            $.ajax({
                url: "/checkChangePass",
                method: "POST",
                data: {
                    new_pass: newpass
                },
                datatype: "password",
                success: function(html) {
                    $('#availNewpass').html(html);
                }
            });
        });

        $("#confirmnewpass").blur(function() {
            var cfNewpass = $(this).val();
            var newPass = document.getElementById('newpass').value;
            $.ajax({
                url: "/checkChangePass",
                method: "POST",
                data: {
                    cf_new_pass: cfNewpass,
                    new_pass_cf: newPass

                },
                datatype: "password",
                success: function(html) {
                    $('#availCfNewpass').html(html);
                }
            });
        });
    });
    </script>





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