<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="/assets/images/company.png" alt=""></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item"><a class="nav-link " href="/">Homepage</a></li>
                <li class="nav-item"><a class="nav-link " href="/products">Products</a></li>
                <li class="nav-item"><a class="nav-link " href="/services">Services</a></li>
                <li class="nav-item"><a class="nav-link " href="/about-us">About us</a></li>
                <li class="nav-item"><a class="nav-link " href="/news">News</a></li>
                <li class="nav-item"><a class="nav-link " href="/contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link " href="/careers">Careers</a></li>
                <!-- <li class="nav-item"><a class="nav-link " href="/login1">Login</a></li> -->
                <li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown"
                        class="btn btn-outline-secondary dropdown-toggle text-white"><i
                                class="fa fa-cog fa-fw fa-lg"></i> <span
                            class="caret"></span></button>

                    <div class="dropdown-menu">
                    <?php if (!isset($_SESSION['username'])){?>  

                        <a class="dropdown-item text-center" href="/login1">Login</a>
                        <a class="dropdown-item text-center" href="/register">Register</a>
                        <?php }?>

                        <?php if (isset($_SESSION['username'])){?>  
                            <a class="dropdown-item  text-center text-lowercase" href="/info">User:   
                             <?php echo $_SESSION['username']?> </a>
                            <!-- <a class="dropdown-item  text-center" href="">My Account</a> -->

                            <a class="dropdown-item text-center  text-lowercase" href="/logout">Logout</a>


                         <?php }?>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->