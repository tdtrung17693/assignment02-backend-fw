<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Andy Company</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link href="assets/css/home.css" rel="stylesheet" />
    <link href="assets/css/products.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/images/company.png" alt=""></a>
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
            <h2 class="section-heading text-uppercase">Products</h2>
        </div>
    </header>
    <br><br>
    <div class="container">
    
    <form class="form" id="getusers" action="/products/search" method="post">
    <div class="input-group input-group-lg mb-3">
        <input id="myInput" name ="myInput" class="form-control mr-sm-2" type="search" placeholder="Search Products" aria-label="Search">
        <button id="MyBtn" class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </div>
    
    </form>
    </div>

   
    <div class="container" id = "filter">
    </div>
    <script> 
            var filter_list = new Array;
            function filter(tag){
                if (result){
                    // console.log(result);
                    for (var i=0;i<filter_list.length;i++){
                        if (filter_list[i]==tag){
                            return;
                        }
                    }
                    // console.log()
                    filter_list.push(tag);
                    showFilter();
                    // console.log(filter_list);
                    updateResult();
                    return;
                }
                console.log(filter_list);
            }

            function showFilter(){
                if (filter_list)
                    document.getElementById('filter-tags-list').innerHTML=""; 
                    for (var i = 0; i<filter_list.length;i++){
                        document.getElementById('filter-tags-list').innerHTML+='\
                            <button type="button" class="btn btn-secondary btn-sm" onclick="removeFilter(\''+
                            filter_list[i] + '\')">' + filter_list[i]+'</button>';
                        console.log(document.getElementById('filter-tags-list').innerHTML);
                    }
            }
            function removeFilter(tag){
                for (var i=0;i<filter_list.length;i++){
                    if (filter_list[i]==tag){
                        filter_list.splice(i,1);
                        showFilter();
                        updateResult(result);
                        console.log(result);
                        return;
                    }
                }
            }
            function updateResult(){
                var temp = Array.from(result);
                for (var i = 0; i<temp.length;i++){
                    var bigFlag = true;
                    for (var j = 0; j<filter_list.length;j++){
                        var flag=false;
                        var cat=filter_list[j].split('-')[0];
                        var val=filter_list[j].split('-')[1];
                        switch (cat){
                            case 'Brand':
                                if (temp[i]['product_brand'].split(' ')[0]==val) {
                                    flag = true;
                                    console.log('a'+temp[i]['product_brand'].split(' ')[0]+'a');
                                    console.log('b'+val+'b');
                                }
                                break;
                            case 'Color':
                                if (temp[i]['product_color'].split(' ')[0]==val) flag = true;
                                break;
                            case 'CPU':
                                if (temp[i]['product_chip'].split(' ')[0]==val) flag = true;
                                break;
                            case 'Graphic':
                                if (temp[i]['product_graph'].split(' ')[0]==val) flag = true;
                                break;
                            case 'Mainboard':
                                if (temp[i]['product_main'].split(' ')[0]==val) flag = true;
                                break;
                            default: return;
                        }
                        if (flag==false) bigFlag = false;

                    }
                    if (bigFlag==false) {
                        temp.splice(i,1);
                        i--;
                    }
                }
                showResult(temp);
            }
        </script>

    <!-- Search Result -->
    <div class="container" id ="records"></div> 


    <!-- Product -->
    <section class="page-section bg-light" id="products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Brands</h2>
                </div>
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Our Bestseller</h2>
                </div>
                <div class="product-carousel owl-carousel col-12">
                    <div class="product-list col-12">
                        <div class="product col-12 row">
                            <div class="col-5">
                                <div class="product__thumbnail">
                                    <img src="assets/images/precision_7510.jpg" alt="dell precision 7510">
                                </div>
                            </div>
                            <div class="product__info col-7">
                                <h3 class="product__name"><a href="/products/123">Dell Precision 7510</a></h3>
                                <div class="product__price-box"><span class="product__price">17.900.000 VND</span></div>
                            </div>
                        </div>
                        <div class="product col-12 row">
                            <div class="col-5">
                                <div class="product__thumbnail">
                                    <img src="assets/images/s340_grey.jpg" alt="lenovo ideapad s340 14iil">
                                </div>
                            </div>
                            <div class="product__info col-7">
                                <h3 class="product__name"><a href="/products/123">Lenovo IdeaPad S340 14IIL</a></h3>
                                <div class="product__price-box"><span class="product__price">16.290.000 VND</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="product-list col-12">
                        <div class="product col-12 row">
                            <div class="col-5">
                                <div class="product__thumbnail">
                                    <img src="assets/images/Acer_Aspire_7_A720.png" alt="acer aspire 7 a720">
                                </div>
                            </div>
                            <div class="product__info col-7">
                                <h3 class="product__name"><a href="/products/123">Acer Aspire 7 A715 42G R4ST</a></h3>
                                <div class="product__price-box"><span class="product__price">16.999.000 VND</span></div>
                            </div>
                        </div>
                        <div class="product col-12 row">
                            <div class="col-5">
                                <div class="product__thumbnail">
                                    <img src="assets/images/laptop_dell_vostro_3590.png" alt="dell precision 7510">
                                </div>
                            </div>
                            <div class="product__info col-7">
                                <h3 class="product__name"><a href="/products/123">Laptop Dell Vostro 3590 (GRMGK3)</a></h3>
                                <div class="product__price-box"><span class="product__price">14.689.000 VND</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="product-list col-12">
                        <div class="product col-12 row">
                            <div class="col-5">
                                <div class="product__thumbnail">
                                    <img src="assets/images/Acer_Aspire_7_A720.png" alt="acer aspire 7 a720">
                                </div>
                            </div>
                            <div class="product__info col-7">
                                <h3 class="product__name"><a href="/products/123">Acer Aspire 7 A715 42G R4ST</a></h3>
                                <div class="product__price-box"><span class="product__price">17.900.000 VND</span></div>
                            </div>
                        </div>
                        <div class="product col-12 row">
                            <div class="col-5">
                                <div class="product__thumbnail">
                                    <img src="assets/images/laptop_dell_vostro_3590.png" alt="dell precision 7510">
                                </div>
                            </div>
                            <div class="product__info col-7">
                                <h3 class="product__name"><a href="/products/123">Laptop Dell Vostro 3590 (GRMGK3)</a></h3>
                                <div class="product__price-box"><span class="product__price">14.689.000 VND</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>New Products</h2>
                </div>
                <div class="product-carousel owl-carousel col-12">
                    <div class="product col-12 row">
                        <div class="col-5">
                            <div class="product__thumbnail">
                                <img src="assets/images/precision_7510.jpg" alt="dell precision 7510">
                            </div>
                        </div>
                        <div class="product__info col-7">
                            <h3 class="product__name"><a href="/products/123">Dell Precision 7510</a></h3>
                            <div class="product__price-box"><span class="product__price">17.900.000 VND</span></div>
                        </div>
                    </div>
                    <div class="product col-12 row">
                        <div class="col-5">
                            <div class="product__thumbnail">
                                <img src="assets/images/s340_grey.jpg" alt="lenovo ideapad s340 14iil">
                            </div>
                        </div>
                        <div class="product__info col-7">
                            <h3 class="product__name"><a href="/products/123">Lenovo IdeaPad S340 14IIL</a></h3>
                            <div class="product__price-box"><span class="product__price">16.290.000 VND</span></div>
                        </div>
                    </div>
                    <div class="product col-12 row">
                        <div class="col-5">
                            <div class="product__thumbnail">
                                <img src="assets/images/Acer_Aspire_7_A720.png" alt="acer aspire 7 a720">
                            </div>
                        </div>
                        <div class="product__info col-7">
                            <h3 class="product__name"><a href="/products/123">Acer Aspire 7 A715 42G R4ST</a></h3>
                            <div class="product__price-box"><span class="product__price">16.999.000 VND</span></div>
                        </div>
                    </div>
                    <div class="product col-12 row">
                        <div class="col-5">
                            <div class="product__thumbnail">
                                <img src="assets/images/laptop_dell_vostro_3590.png" alt="dell precision 7510">
                            </div>
                        </div>
                        <div class="product__info col-7">
                            <h3 class="product__name"><a href="/products/123">Laptop Dell Vostro 3590 (GRMGK3)</a></h3>
                            <div class="product__price-box"><span class="product__price">14.689.000 VND</span></div>
                        </div>
                    </div>
                    <div class="product col-12 row">
                        <div class="col-5">
                            <div class="product__thumbnail">
                                <img src="assets/images/Acer_Aspire_7_A720.png" alt="acer aspire 7 a720">
                            </div>
                        </div>
                        <div class="product__info col-7">
                            <h3 class="product__name"><a href="/products/123">Acer Aspire 7 A715 42G R4ST</a></h3>
                            <div class="product__price-box"><span class="product__price">17.900.000 VND</span></div>
                        </div>
                    </div>
                    <div class="product col-12 row">
                        <div class="col-5">
                            <div class="product__thumbnail">
                                <img src="assets/images/laptop_dell_vostro_3590.png" alt="dell precision 7510">
                            </div>
                        </div>
                        <div class="product__info col-7">
                            <h3 class="product__name"><a href="/products/123">Laptop Dell Vostro 3590 (GRMGK3)</a></h3>
                            <div class="product__price-box"><span class="product__price">14.689.000 VND</span></div>
                        </div>
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


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        var frm = $('#getusers');
        var result;
        var searchTerm="";
        function showResult(data){
            var result = data;
            console.log(result);
            if (searchTerm=='') searchTerm = 'All products';
            else searchTerm = '"'+searchTerm+'"';
            document.getElementById('records').innerHTML =' <div class="row">\
                        <div class="col-12">\
                            <h2>Search results for '+searchTerm+'</h2>\
                        </div>\
                        <div class="product-carousel owl-carousel col-12">';

                    for(var i = 0; i < result.length; i++){
                        document.getElementById('records').innerHTML +='<div class="product-list col-12">';
                        if (i < result.length){
                            document.getElementById('records').innerHTML +='<div class="product col-12 row">\
                                    <div class="col-5">\
                                        <div class="product__thumbnail">\
                                            <img src="'+result[i]["Image_path"]+'" alt="'+result[i]["product_name"]+'">\
                                        </div>\
                                    </div>\
                                    <div class="product__info col-7">\
                                        <h3 class="product__name"><a href="./product-details.html">'+result[i]["product_name"]+'</a></h3>\
                                        <div class="product__price-box"><span class="product__price">'+new Intl.NumberFormat().format(result[i]["product_price"])+' VND</span></div>\
                                    </div>\
                                </div>';
                        } 
                        i++;
                        if (i < result.length){
                            document.getElementById('records').innerHTML +='<div class="product col-12 row">\
                                    <div class="col-5">\
                                        <div class="product__thumbnail">\
                                            <img src="'+result[i]["Image_path"]+'" alt="'+result[i]["product_name"]+'">\
                                        </div>\
                                    </div>\
                                    <div class="product__info col-7">\
                                        <h3 class="product__name"><a href="./product-details.html">'+result[i]["product_name"]+'</a></h3>\
                                        <div class="product__price-box"><span class="product__price">'+new Intl.NumberFormat().format(result[i]["product_price"])+' VND</span></div>\
                                    </div>\
                                </div>';
                        } 
                        i++;
                        if (i < result.length){
                            document.getElementById('records').innerHTML +='<div class="product col-12 row">\
                                    <div class="col-5">\
                                        <div class="product__thumbnail">\
                                            <img src="'+result[i]["Image_path"]+'" alt="'+result[i]["product_name"]+'">\
                                        </div>\
                                    </div>\
                                    <div class="product__info col-7">\
                                        <h3 class="product__name"><a href="./product-details.html">'+result[i]["product_name"]+'</a></h3>\
                                        <div class="product__price-box"><span class="product__price">'+new Intl.NumberFormat().format(result[i]["product_price"])+' VND</span></div>\
                                    </div>\
                                </div>';
                        } 
                        document.getElementById('records').innerHTML += '</div>';
                    }
                    document.getElementById('records').innerHTML += '</div></div>';
        }
        function showFilterTable(){
            document.getElementById('filter').innerHTML='\
            <div class="form-group" name = "filter-tags-list" id =  "filter-tags-list"></div>\
        <p>\
        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">\
            Filter List\
        </button>\
        </p>\
        <div class="collapse" id="collapseExample">\
            <div class="card card-body">\
                <div class="row">\
                    <div class="col-sm">\
                        <div class= "filter-form form-inline">\
                            <div class="input-group-prepend">\
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brand Name</button>\
                                <div class="dropdown-menu">\
                                    <a class="dropdown-item" onclick="filter(\'Brand-MSI\')">MSI</a>\
                                    <a class="dropdown-item" onclick="filter(\'Brand-Dell\')">Dell</a>\
                                    <a class="dropdown-item" onclick="filter(\'Brand-Asus\')">Asus</a>\
                                    <a class="dropdown-item" onclick="filter(\'Brand-Lenovo\')">HP</a>\
                                    <a class="dropdown-item" onclick="filter(\'Brand-Acer\')">Acer</a>\
                                    <a class="dropdown-item" onclick="filter(\'Brand-Lenovo\')">Lenovo</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm">\
                        <div class= "filter-form form-inline">\
                            <div class="input-group-prepend">\
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Color</button>\
                                <div class="dropdown-menu">\
                                    <a class="dropdown-item" onclick="filter(\'Color-Black\')">Black</a>\
                                    <a class="dropdown-item" onclick="filter(\'Color-White\')">White</a>\
                                    <a class="dropdown-item" onclick="filter(\'Color-Grey\')">Grey</a>\
                                    <a class="dropdown-item" onclick="filter(\'Color-Pink\')">Pink</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm">\
                        <div class= "filter-form form-inline">\
                            <div class="input-group-prepend">\
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CPU</button>\
                                <div class="dropdown-menu">\
                                    <a class="dropdown-item" onclick="filter(\'CPU-Intel\')">Intel</a>\
                                    <a class="dropdown-item" onclick="filter(\'CPU-AMD\')">AMD</a>\
                                    <a class="dropdown-item" onclick="filter(\'CPU-IBM\')">IBM</a>\
                                    <a class="dropdown-item" onclick="filter(\'CPU-Qualcomm\')">Qualcomm</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm">\
                        <div class= "filter-form form-inline">\
                            <div class="input-group-prepend">\
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Graphic Card</button>\
                                <div class="dropdown-menu">\
                                    <a class="dropdown-item" onclick="filter(\'Graphic-Nvidia\')">Nvidia</a>\
                                    <a class="dropdown-item" onclick="filter(\'Graphic-Intel\')">Intel</a>\
                                    <a class="dropdown-item" onclick="filter(\'Graphic-AMD\')">AMD</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm">\
                        <div class= "filter-form form-inline">\
                            <div class="input-group-prepend">\
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mainboard</button>\
                                <div class="dropdown-menu">\
                                    <a class="dropdown-item" onclick="filter(\'Mainboard-Gigabyte\')">Gigabyte</a>\
                                    <a class="dropdown-item" onclick="filter(\'Mainboard-Asus\')">Asus</a>\
                                    <a class="dropdown-item" onclick="filter(\'Mainboard-Dell\')">Dell</a>\
                                    <a class="dropdown-item" onclick="filter(\'Mainboard-MSI\')">MSI</a>\
                                    <a class="dropdown-item" onclick="filter(\'Mainboard-Biostar\')">Biostar</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>\
        </div>';
        }
        frm.submit(function (e) {
            searchTerm = $('#myInput').val()
            e.preventDefault();  
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                dataType: 'json',
                data: frm.serialize(),
                success: function (data) {

                    console.log('Submission was successful.');
                    result = data;
                    console.log(data);
                    showResult(data);
                    showFilterTable();
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        });
        
    </script> 

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/products.js"></script>
</body>

</html>