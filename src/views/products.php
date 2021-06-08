<?php
/**
 * @var array $newProducts
 * @var array $products
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Andy Company</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link href="assets/css/home.css" rel="stylesheet"/>
    <link href="assets/css/products.css" rel="stylesheet"/>
</head>

<body id="page-top">
<?php include 'layout/header.php'; ?>

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
            <input id="myInput" name="myInput" class="form-control mr-sm-2" type="search" placeholder="Search Products"
                   aria-label="Search">
            <button id="MyBtn" class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </div>

    </form>
</div>

<div class="container" id="filter">
</div>
<script>
    var filter_list = new Array;

    function filter(tag) {
        if (result) {
            // console.log(result);
            for (var i = 0; i < filter_list.length; i++) {
                if (filter_list[i] == tag) {
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

    function showFilter() {
        if (filter_list)
            document.getElementById('filter-tags-list').innerHTML = "";
        for (var i = 0; i < filter_list.length; i++) {
            document.getElementById('filter-tags-list').innerHTML += '\
                            <button type="button" class="btn btn-secondary btn-sm" onclick="removeFilter(\'' +
                filter_list[i] + '\')">' + filter_list[i] + '</button>';
            console.log(document.getElementById('filter-tags-list').innerHTML);
        }
    }

    function removeFilter(tag) {
        for (var i = 0; i < filter_list.length; i++) {
            if (filter_list[i] == tag) {
                filter_list.splice(i, 1);
                showFilter();
                updateResult(result);
                console.log(result);
                return;
            }
        }
    }

    function updateResult() {
        var temp = Array.from(result);
        for (var i = 0; i < temp.length; i++) {
            var bigFlag = true;
            for (var j = 0; j < filter_list.length; j++) {
                var flag = false;
                var cat = filter_list[j].split('-')[0];
                var val = filter_list[j].split('-')[1];
                switch (cat) {
                    case 'Brand':
                        if (temp[i]['product_brand'].split(' ')[0] == val) {
                            flag = true;
                            console.log('a' + temp[i]['product_brand'].split(' ')[0] + 'a');
                            console.log('b' + val + 'b');
                        }
                        break;
                    case 'Color':
                        if (temp[i]['product_color'].split(' ')[0] == val) flag = true;
                        break;
                    case 'CPU':
                        if (temp[i]['product_chip'].split(' ')[0] == val) flag = true;
                        break;
                    case 'Graphic':
                        if (temp[i]['product_graph'].split(' ')[0] == val) flag = true;
                        break;
                    case 'Mainboard':
                        if (temp[i]['product_main'].split(' ')[0] == val) flag = true;
                        break;
                    default:
                        return;
                }
                if (flag == false) bigFlag = false;

            }
            if (bigFlag == false) {
                temp.splice(i, 1);
                i--;
            }
        }
        showResult(temp);
    }
</script>

<!-- Search Result -->
<div class="container" id="records"></div>


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
                <h2>New Products</h2>
            </div>
            <div class="product-carousel owl-carousel col-12">
                <?php foreach ($newProducts as $index => $product) : ?>
                    <?php $imageLink = $product['image_path'] ?? '/assets/images/default-product-image.png' ?>
                    <div class="product col-12 row">
                        <div class="col-5">
                            <div class="product__thumbnail">
                                <img src="<?= $imageLink ?>" alt="<?= $product['product_name']; ?>">
                            </div>
                        </div>
                        <div class="product__info col-7">
                            <h3 class="product__name"><a
                                        href="/products/<?= $product['id']; ?>"><?= $product['product_name'] ?></a></h3>
                            <div class="product__price-box"><span
                                        class="product__price"><?= number_format($product['product_price'], 0, ',', '.') ?> VND</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12"><h2>All Products</h2></div>
            <div class="products col-12">
                <div class="row">
                    <?php foreach ($products as $index => $product) : ?>
                        <?php $imageLink = $product['image_path'] ?? '/assets/images/default-product-image.png' ?>
                        <div class="col-3 border border-1 p-4">
                            <div>
                                <div class="product__thumbnail mb-4">
                                    <img src="<?= $imageLink ?>" alt="<?= $product['product_name']; ?>">
                                </div>
                            </div>
                            <div class="product__info">
                                <h3 class="product__name"><a
                                            href="/products/<?= $product['id']; ?>"><?= $product['product_name'] ?></a>
                                </h3>
                                <div class="product__price-box"><span
                                            class="product__price"><?= number_format($product['product_price'], 0, ',', '.') ?> VND</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="actions mt-4 text-center">
                    <a href="#" class="btn btn-primary js-load-more d-inline-block">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<?php include 'layout/footer.php'; ?>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    let frm = $('#getusers');
    let result;
    let searchTerm = "";
    let pageNumber = 2;
    let pageSize = 12;

    function showResult(data) {
        let result = data;
        let search = "";
        console.log(result);
        if (searchTerm == '') search = 'All products';
        else search = '"' + searchTerm + '"';
        document.getElementById('records').innerHTML = ' <div class="row">\
                        <div class="col-12">\
                            <h2>Search results for ' + search + '</h2>\
                        </div>\
                        <div class="product-carousel owl-carousel col-12">';

        for (var i = 0; i < result.length; i++) {
            document.getElementById('records').innerHTML += '<div class="product-list col-12">';
            if (i < result.length) {
                document.getElementById('records').innerHTML += '<div class="product col-12 row">\
                                    <div class="col-5">\
                                        <div class="product__thumbnail">\
                                            <img src="' + (result[i]["image_path"]|| '/assets/images/default-product-image.png')  + '" alt="' + result[i]["product_name"] + '">\
                                        </div>\
                                    </div>\
                                    <div class="product__info col-7">\
                                        <h3 class="product__name"><a href="/products/'+  result[i]['id'] + '">' + result[i]["product_name"] + '</a></h3>\
                                        <div class="product__price-box"><span class="product__price">' + new Intl.NumberFormat().format(result[i]["product_price"]) + ' VND</span></div>\
                                    </div>\
                                </div>';
            }
            i++;
            if (i < result.length) {
                document.getElementById('records').innerHTML += '<div class="product col-12 row">\
                                    <div class="col-5">\
                                        <div class="product__thumbnail">\
                                            <img src="' + (result[i]["image_path"]|| '/assets/images/default-product-image.png')  + '" alt="' + result[i]["product_name"] + '">\
                                        </div>\
                                    </div>\
                                    <div class="product__info col-7">\
                                        <h3 class="product__name"><a href="/products/'+ result[i]['id'] + '">' + result[i]["product_name"] + '</a></h3>\
                                        <div class="product__price-box"><span class="product__price">' + new Intl.NumberFormat().format(result[i]["product_price"]) + ' VND</span></div>\
                                    </div>\
                                </div>';
            }
            i++;
            if (i < result.length) {
                document.getElementById('records').innerHTML += '<div class="product col-12 row">\
                                    <div class="col-5">\
                                        <div class="product__thumbnail">\
                                            <img src="' + (result[i]["image_path"]|| '/assets/images/default-product-image.png')  + '" alt="' + result[i]["product_name"] + '">\
                                        </div>\
                                    </div>\
                                    <div class="product__info col-7">\
                                        <h3 class="product__name"><a href="/products/' + result[i]['id'] +  '">' + result[i]["product_name"] + '</a></h3>\
                                        <div class="product__price-box"><span class="product__price">' + new Intl.NumberFormat().format(result[i]["product_price"]) + ' VND</span></div>\
                                    </div>\
                                </div>';
            }
            document.getElementById('records').innerHTML += '</div>';
        }
        document.getElementById('records').innerHTML += '</div></div>';
    }

    function showFilterTable() {
        document.getElementById('filter').innerHTML = '\
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

    frm.on('submit', function (e) {
        e.preventDefault();
        searchTerm = $('#myInput').val()
        $.ajax({
            type: 'get',
            url: '/products/search',
            data: {pageSize, pageNumber},
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

    $(function () {
        $('.js-load-more').on('click', function (event) {
            event.preventDefault();
            $.ajax({
                type: 'get',
                url: '/products/more',
                data: {pageSize, pageNumber},
                dataType: 'json',
                success: data => {
                    console.log(data)
                    if (!data.loadMore) {
                        $(this).remove();
                    }

                    const productTmpl = `
                    <div class="col-3 border border-1 p-4">
                        <div>
                            <div class="product__thumbnail mb-4">
                                <img src="{productImage}" alt="{productName}">
                            </div>
                        </div>
                        <div>
                            <h3 class="product__name"><a
                                        href="/products/{productId}">{productName}</a></h3>
                            <div class="product__price-box"><span
                                        class="product__price">{productPrice} VND</span>
                            </div>
                        </div>
                    </div>
                    `;

                    let products = "";
                    data.products.forEach(product => {
                        products += productTmpl
                            .replaceAll("{productImage}", product.image_path || '/assets/images/default-product-image.png')
                            .replaceAll("{productName}", product.product_name)
                            .replaceAll("{productPrice}",  new Intl.NumberFormat('vn-VN').format(product.product_price))
                    })

                    $('.products > .row').append(products)
                    pageNumber += 1;
                },
                error: function (data) {
                    console.log('Error occurred', data);
                }
            })
        })
    })
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