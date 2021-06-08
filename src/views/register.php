
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Andy Company</title>
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

            <form name="registerForm" action="/sendRegister" method="POST">

                <div class="text-center">
                    <h2 class="section-heading text-uppercase text-black-50">Register</h2>
                    <h3 class="section-subheading text-muted">Get started with your free account.</h3>
                </div>

                <div class="group row">
                    <label for="firstName" class="col-3 col-form-label text-black-50">First name:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" name="firstName" id="firstname"
                            onfocus="this.placeholder=''" 
                            placeholder="Enter First name ..." required>
                        <div class="text-left">
                            <span id="availfname"> </span>
                        </div>
                    </div>

                </div>

                <div class="group row ">
                    <label for="lastName" class="col-3 col-form-label text-black-50">Last name:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" name="lastName" id="lastname"
                            onfocus="this.placeholder=''" 
                            placeholder="Enter Last name ..." required>
                        <div class="text-left">
                            <span id="availlname"> </span>
                        </div>
                    </div>
                </div>

                <div class="group row">
                    <label for="phonenumber" class="col-3 col-form-label text-black-50">Phone number:</label>
                    <div class="col-9">
                        <input type="tel" class="form-control col-9" id="phone" name="phone"
                            placeholder="Enter Phone number:" 
                            onfocus="this.placeholder=''" pattern="[0]{1}[0-9]{3}[0-9]{3}[0-9]{3}" required>
                        <div class="text-left">
                            <span id="availphone"> </span>
                        </div>
                    </div>

                </div>
                <div class="group row">
                    <label for="email" class="col-3 col-form-label text-black-50">Email:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" id="email" name="email"
                            onfocus="this.placeholder=''" 
                            placeholder="exam@exam.exam" required>
                        <div class="text-left">
                            <span id="availemail"> </span>
                        </div>
                    </div>

                </div>
                <div class="group row">
                    <label for="username" class="col-3 col-form-label text-black-50">Username:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" id="username" name="username"
                            onfocus="this.placeholder=''"
                            placeholder="Enter Username ..." required>
                        <div class="text-left">
                            <span id="availname"> </span>
                        </div>
                    </div>

                </div>

                <div class="group row">
                    <label for="password" class="col-3 col-form-label text-black-50">Password:</label>
                    <div class="col-9">
                        <input type="password" class="form-control col-9" name="password" id="password"
                            onfocus="this.placeholder=''" 
                            placeholder="Enter Password ..." required>
                        <div class="text-left">
                            <span id="availpass"> </span>
                        </div>
                    </div>

                </div>

                <div class="group row">
                    <label for="confirmpassword" class="col-3 col-form-label text-black-50">Confirm Pass:</label>
                    <div class="col-9">
                        <input type="password" class="form-control col-9" id="confirm" name="confirmpassword"
                            onfocus="this.placeholder=''" 
                            placeholder="Confirm Password ..." required>
                        <div class="text-left">
                            <span id="availcf"> </span>
                        </div>
                    </div>
                </div>


                <div class="group row">
                    <label class="col-3 col-form-label text-black-50">Birthday:</label>
                    <div class="col-9 d-flex">

                    <select class="form-control col-2" name="month">
                            <option selected disabled hnameden>Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <select class="form-control col-2" name="day">
                            <option selected disabled hnameden>Day</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                   
                        <select class="form-control col-2" name="year">
                            <option selected disabled hnameden>Year</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                            <option value="1939">1939</option>
                            <option value="1938">1938</option>
                            <option value="1937">1937</option>
                            <option value="1936">1936</option>
                            <option value="1935">1935</option>
                            <option value="1934">1934</option>
                            <option value="1933">1933</option>
                            <option value="1932">1932</option>
                            <option value="1931">1931</option>
                            <option value="1930">1930</option>
                        </select>
                    </div>
                </div>

                <div class="group row">
                    <label for="firstName" class="col-3 col-form-label text-black-50">Address:</label>
                    <div class="col-9">
                        <input type="text" class="form-control col-9" name="address" id="address"
                            onfocus="this.placeholder=''" 
                            placeholder="Enter Address ..." required>
    
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
                         ?>
                        <button name="btnSubmit" type="submit" class="btn btn-primary">Create
                            Account</button>
                    </div>
                </div>



                <!-- Divider Text -->
                <!-- <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                    <div class="border-bottom w-100 ml-5"></div>
                    <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                    <div class="border-bottom w-100 mr-5"></div>
                </div> -->

                <!-- Social Login -->
                <!-- <div class="form-group col-lg-12 mx-auto">
                    <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                        <i class="fab fa-facebook-f mr-2"></i>
                        <span class="font-weight-bold">Continue with Facebook</span>
                    </a>
                    <a href="#" class="btn btn-primary btn-block py-2 btn-twitter">
                        <i class="fab fa-twitter mr-2"></i>
                        <span class="font-weight-bold">Continue with Twitter</span>
                    </a>
                </div> -->
                <!-- Already Registered -->

                <div class="text-center w-100">
                    <p class="text-muted font-weight-bold">Already Registered? <a href="/login1"
                            class="text-primary ml-2">Login</a></p>
                </div>
            </form>
        </div>
    </header>






    <!-- 
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="brands col-12">
                    <div class="brand">
                        <a href="#"><img src="assets/images/dell.png" alt="asus"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="assets/images/hp.png" alt="asus"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="assets/images/asus.png" alt="asus"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="assets/images/msi.png" alt="asus"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="assets/images/acer.png" alt="asus"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Footer-->
    <?php include 'layout/footer.php'; ?>



    <script src=/assets/js/ajaxCheck.js> </script>
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