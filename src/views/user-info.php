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
            <form name="infoForm" class="infoForm" action="/doChangeInfo" method="POST">
                <div class="text-center">
                    <br> <br>
                    <h2 class="section-heading text-black-50">Your Account</h2>
                    <br>

                    <!-- <h3 class="section-subheading text-muted">Get started with your free account.</h3> -->
                </div>

                <div class="group row">
                    <label for="firstName" class="col-3 col-form-label text-black-50">First name:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" name="firstName" id="firstname"
                            onfocus="this.placeholder=''" value="<?php echo $_SESSION['fname']; ?>" disabled required>
                        <div class="text-left">
                            <span id="availfname"> </span>
                        </div>
                    </div>
                </div>

                <div class="group row ">
                    <label for="lastName" class="col-3 col-form-label text-black-50">Last name:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" name="lastName" id="lastname"
                            onfocus="this.placeholder=''" value="<?php echo $_SESSION['lname']; ?>" disabled required>
                        <div class="text-left">
                            <span id="availlname"> </span>
                        </div>
                    </div>
                </div>

                <div class="group row">
                    <label for="phonenumber" class="col-3 col-form-label text-black-50">Phone number:</label>
                    <div class="col-9">
                        <input type="tel" class="form-control col-9" id="phone" name="phone"
                            value="<?php echo $_SESSION['phonenum'];?>" onfocus="this.placeholder=''"
                            pattern="[0]{1}[0-9]{3}[0-9]{3}[0-9]{3}" disabled required>
                        <div class="text-left">
                            <span id="availphone"> </span>
                        </div>
                    </div>

                </div>
                <div class="group row">
                    <label for="email" class="col-3 col-form-label text-black-50">Email:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" id="email" name="email"
                            onfocus="this.placeholder=''" value="<?php echo $_SESSION['email']; ?>" disabled required>
                        <div class="text-left">
                            <span id="availemail"> </span>
                        </div>
                    </div>
                </div>
                <div class="group row">
                    <label for="username" class="col-3 col-form-label text-black-50">Username:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" id="username1" name="username"
                            onfocus="this.placeholder=''" value="<?php echo $_SESSION['username']; ?>" readonly disabled>
                        <div class="text-left">
                            <span id="availname"> </span>
                        </div>
                    </div>
                </div>



                <div class="group row">
                    <label class="col-3 col-form-label text-black-50">Birthday:</label>
                    <div class="col-9 d-flex">
                        <input type="text" class="form-control col-9" id="bdate" name="bdate"
                            onfocus="this.placeholder=''" value="<?php echo $_SESSION['bdate']; ?>" disabled required>

                    </div>
                </div>

                <div class="group row">
                    <label for="firstName" class="col-3 col-form-label text-black-50">Address:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" name="address" id="address"
                            onfocus="this.placeholder=''" value="<?php echo $_SESSION['address']; ?>" disabled required>
                    </div>
                </div>
                <div class="group row pw d-none">
                    <label for="password" class="col-3 col-form-label text-black-50">Password:</label>
                    <div class="col-9">
                        <input type="password" class="form-control col-9" name="password" id="password1"
                            onfocus="this.placeholder=''" 
                            placeholder="Enter Password ..." required>
                        <div class="text-left">
                            <span id="availpass"> </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <?php if (isset($_GET['error']))
                        { 
                            ?>
                        <p class="text-danger"> <?php echo $_GET['error']; ?> </p>

                        <?php 
                        }
                         ?> <?php if (isset($_GET['success']))
                         { 
                             ?>
                         <p class="text-success"> <?php echo $_GET['success']; ?> </p>
 
                         <?php 
                         }
                          ?>
                        <div>
                            <button name="saveinfo" id="saveinfo" class="btn btn-primary d-none saveinfo">Save</button>
                            <a type="button" name="exitsave" id="exitsave" class="btn btn-primary d-none exitsave"
                                href="/info"; >Exit</a>

                        </div>
                        <div>
                            <a type="button" name="changeinfo" id="changeinfo" class="btn btn-primary changeinfo"
                                value="Change Infomation">Change Infomation </a>

                            <a name="btnSubmit" class="btn btn-primary changepass" href="/changePass"> Change Password</a>

                        </div>

                    </div>
                </div>
                <br>
            </form>
        </div>
    </header>



    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var button = document.querySelector('.changeinfo');
        var saveinfo = document.querySelector('.saveinfo');
        var exit = document.querySelector('.exitsave');
        var changepassBtn = document.querySelector('.changepass');
        var pw = document.querySelector('.pw');
        button.onclick = function() {
            saveinfo.classList.toggle("d-none");
            button.classList.toggle("d-none");
            exit.classList.toggle("d-none");
            changepassBtn.classList.toggle("d-none");
            pw.classList.toggle("d-none");

        }




    }, false);

    $(document).ready(function() {
        $("#changeinfo").click(function() {
            $('input').attr('disabled', false);
            //  document.getElementById("GFG_down").innerHTML  
            //             = "Read-Only attribute enabled"; 
        });
        $("#exitsave").click(function() {
            $('input').attr('disabled', true);
            //  document.getElementById("GFG_down").innerHTML  
            //             = "Read-Only attribute enabled"; 
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
    <script src=/assets/js/ajaxCheck.js> </script>

</body>

</html>