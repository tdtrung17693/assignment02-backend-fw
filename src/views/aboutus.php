<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Andy Company</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/assets/css/home.css" rel="stylesheet" />
    <link href="/assets/css/about.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"> <img src="/assets/images/company.png" alt=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Company!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="/">More Infomation</a>
        </div>
    </header>
    <section class="page-section bg-light" id="aboutus">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About Us</h2>
            </div>
        </div>
        <!-- Slideshow container -->
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="/assets/images/img1.jpg" style="width:100%" class="img-fluid" alt="">
                <div class="text">Andy Corporation bring you the best of the best computer you can find</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="/assets/images/img2.jpg" style="width:100%" class="img-fluid" alt="">
                <div class="text">... with the best price ...</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="/assets/images/img3.jpg" style="width:100%" class="img-fluid" alt="">
                <div class="text">...and best services to serve you</div>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="content md-trigger" data-toggle="modal" data-target="#modal-1"
                         onmouseover="document.getElementById('avatar1').src='/assets/images/avatar1_smile.png'"
                         onmouseout="document.getElementById('avatar1').src='/assets/images/avatar1.png'">
                        <img id="avatar1" src="/assets/images/avatar1.png" class="img-fluid" alt="Mountains"
                             style="width:100%">
                        <h3>Nguyễn Trần Quang Minh</h3>
                        <blockquote>
                            <p style="font-style: italic;">“Concentrate all your thoughts upon the work in hand. The
                                sun's rays do not burn until brought to a focus.“</p>
                            <footer style="font-weight:bold;"> Alexander Graham Bell</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="col-3">
                    <div class="content md-trigger" data-toggle="modal" data-target="#modal-2"
                         onmouseover="document.getElementById('avatar2').src='/assets/images/avatar2_smile.png'"
                         onmouseout="document.getElementById('avatar2').src='/assets/images/avatar2.png'">
                        <img id="avatar2" src="/assets/images/avatar2.png" class="img-fluid" alt="Mountains"
                             style="width:100%">
                        <h3>Trần Hoàng Đăng Quân</h3>
                        <blockquote>
                            <p style="font-style: italic;">“To be yourself in a world that is constantly trying to make
                                you something else is the greatest accomplishment.“</p>
                            <footer style="font-weight:bold;"> Ralph Waldo Emerson</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="col-3">
                    <div class="content md-trigger" data-toggle="modal" data-target="#modal-3"
                         onmouseover="document.getElementById('avatar3').src='/assets/images/avatar3_smile.png'"
                         onmouseout="document.getElementById('avatar3').src='/assets/images/avatar3.png'">
                        <img id="avatar3" src="/assets/images/avatar3.png" class="img-fluid" alt="Mountains"
                             style="width:100%">
                        <h3>Trần Đình Trung</h3>
                        <blockquote>
                            <p style="font-style: italic;">“Code never lies, comments sometimes do.“</p>
                            <footer style="font-weight:bold;"> Ron Jeffries</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="col-3">
                    <div class="content md-trigger" data-toggle="modal" data-target="#modal-4"
                         onmouseover="document.getElementById('avatar4').src='/assets/images/avatar4_smile.png'"
                         onmouseout="document.getElementById('avatar4').src='/assets/images/avatar4.png'">
                        <img id="avatar4" src="/assets/images/avatar4.png" class="img-fluid" alt="Mountains"
                             style="width:100%">
                        <h3>Phạm Ngọc Sang</h3>
                        <blockquote>
                            <p style="font-style: italic;">“Never follow anyone else’s path. Unless you’re in the woods
                                and you’re lost and you see a path. Then by all means follow that path.“</p>
                            <footer style="font-weight:bold;"> Ellen DeGeneres</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>        <div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Nguyễn Trần Quang Minh</h3>
                        <div style="padding: 3vw;">
                            <ul>
                                <li><strong>Full name:</strong> Nguyễn Trần Quang Minh</li>
                                <li><strong>Job:</strong> Student</li>
                                <li><strong>Work place:</strong> Ho Chi Minh unbiversity of technology</li>
                                <li><strong>Mobile:</strong> (+84) 968919450</li>
                            </ul>
                            <p>External link: </p> <a href="">Facebook</a> <a href="">Github</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Nguyễn Trần Quang Minh</h3>
                        <div style="padding: 3vw;">
                            <ul>
                                <li><strong>Full name:</strong> Nguyễn Trần Quang Minh</li>
                                <li><strong>Job:</strong> Student</li>
                                <li><strong>Work place:</strong> Ho Chi Minh unbiversity of technology</li>
                                <li><strong>Mobile:</strong> (+84) 968919450</li>
                            </ul>
                            <p>External link: </p> <a href="">Facebook</a> <a href="">Github</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Nguyễn Trần Quang Minh</h3>
                        <div style="padding: 3vw;">
                            <ul>
                                <li><strong>Full name:</strong> Nguyễn Trần Quang Minh</li>
                                <li><strong>Job:</strong> Student</li>
                                <li><strong>Work place:</strong> Ho Chi Minh unbiversity of technology</li>
                                <li><strong>Mobile:</strong> (+84) 968919450</li>
                            </ul>
                            <p>External link: </p> <a href="">Facebook</a> <a href="">Github</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Nguyễn Trần Quang Minh</h3>
                        <div style="padding: 3vw;">
                            <ul>
                                <li><strong>Full name:</strong> Nguyễn Trần Quang Minh</li>
                                <li><strong>Job:</strong> Student</li>
                                <li><strong>Work place:</strong> Ho Chi Minh unbiversity of technology</li>
                                <li><strong>Mobile:</strong> (+84) 968919450</li>
                            </ul>
                            <p>External link: </p> <a href="">Facebook</a> <a href="">Github</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">Copyright © Andy Company</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a class="mr-3" href="#!">Privacy Policy</a>
                    <a href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

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