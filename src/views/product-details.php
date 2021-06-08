<?php
/**
* @var array $product
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
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="/assets/css/xzoom.css" />
    <link href="/assets/css/product-details.css" rel="stylesheet" />
    <link href="/assets/css/home.css" rel="stylesheet" />
    <link href="/assets/css/login-dialog.css" rel="stylesheet" />
</head>



<body id="page-top">
<?php include 'layout/header.php'; ?>


<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <h2 class="section-heading text-uppercase"><?= $product['product_name'] ?></h2>
    </div>
</header>

<!-- Product -->
<section class="page-section bg-light" id="product-details">

    <div class="container" style="display: none;">
        <div id="user_name">
            <?php if (isset($_SESSION['username'])) echo $_SESSION['username'];
            else echo "Empty";
            ?>
        </div>
        <div id="user_id">
            <?php if (isset($_SESSION['id'])) echo $_SESSION['id'];
            else echo "Empty";
            ?>
        </div>
    </div>

    <div class="container">
        <div class="row product__metadata">
            <div class="col-5 clearfix">
                <div class="product__thumbnails">
                    <?php if (empty($images)): ?>
                        <img class="xzoom" src="/assets/images/default-product-image.png" alt=""/>
                        <div class="xzoom-thumbs">
                            <a href="/assets/images/default-product-image.png">
                                <img class="xzoom-gallery" width="80" src="/assets/images/default-product-image.png"
                                     alt=""/>
                            </a>
                        </div>
                    <?php else: ?>
                        <img class="xzoom" src="<?= $images[0]['image_path'] ?>"/>
                        <div class="xzoom-thumbs">
                            <?php foreach ($images as $image) : ?>
                                <a href="<?= $image['image_path'] ?>">
                                    <img class="xzoom-gallery" width="80" src="<?= $image['image_path'] ?>"/>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-7">
                <div class="product__header">
                    <h2 class="product__name"><?= $product['product_name'] ?></h2>
                </div>
                <div class="product__price"><?= number_format($product['product_price'], 0, ',', '.') ?> VND</div>
                <div class="product__actions">
                    <button class="btn btn-warning">Add to cart</button>
                    <button class="btn btn-secondary">Buy Now</button>
                </div>
            </div>
        </div>
        <div class="row product__info">
            <div class="col-8"><?= $product['description'] ?></div>
            <div class="col-4">
                <h3>Technical Details</h3>
                <div class="row">
                    <div class="desc-table">
                        <div class="desc-table__row">
                            <div class="desc-table__key">Processor</div>
                            <div class="desc-table__value">
                                <?= $product['product_chip'] ? $product['product_chip'] : 'Intel Core i7 (6th Gen) 6820HQ / 2.7 GHz' ?>
                            </div>
                        </div>
                        <div class="desc-table__row">
                            <div class="desc-table__key">Memory</div>
                            <div class="desc-table__value">
                                <ul class="list-unstyled">
                                    <li>4 DIMM slots: up to 64GB DDR4 NECC 2133MHz</li>
                                    <li>Up to 32GB DDR4 2667MHz SuperSpeed memory</li>
                                    <li>Up to 64GB ECC DDR4 2133MHz</li>
                                </ul>
                            </div>
                        </div>
                        <div class="desc-table__row">
                            <div class="desc-table__key">Storage</div>
                            <div class="desc-table__value">
                                HDD 2.5” 500GB, 1TB 7200RPM up to 2TB 2.5” 5400RPM SATA 6Gb/s
                            </div>
                        </div>
                        <div class="desc-table__row">
                            <div class="desc-table__key">Operating System</div>
                            <div class="desc-table__value">
                                Canonical Ubuntu 14.04 SP1
                            </div>
                        </div>
                        <div class="desc-table__row">
                            <div class="desc-table__key">Dimensions and weight</div>
                            <div class="desc-table__value">
                                <ul class="list-unstyled">
                                    <li>Width: 14.88” / 378mm</li>
                                    <li>Depth: 10.38”/ 261mm</li>
                                    <li>
                                        Height (front-Rear): Front 1.09”/27.76mm – 1.3”/(33mm)
                                    </li>
                                    <li>Weight: 2.79kg (6.16lb)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-block btn-primary" data-toggle="modal"
                       data-target="#technicalModal">View More</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <h3 class="col-12 mb-4">Reviews</h3>
            <div class="d-flex flex-column col-12">

                <div class="coment-bottom">
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4" id="comment_box">
                        <input type="text" class="form-control mr-3" id="cmt" placeholder="Add comment">
                        <button class="btn btn-primary" type="button" id="btn_cmt" data-comment-empty="<?= empty($comments) ? 1 : 0 ?>">Comment</button>
                    </div>


                    <?php if (empty($comments)): ?>
                        <div>Be the first one commenting here.</div>
                    <?php else: ?>
                        <?php foreach ($comments as $comment) :?>
                            <div class="commented-section mt-2">
                                <div class="d-flex flex-row align-items-center commented-user">
                                    <h5 class="mr-2"><?= $comment['username'] ?></h5><span class="dot mb-1"></span><span
                                            class="mb-1 ml-2"><?= date("F d Y", strtotime($comment['time'])) ?></span>
                                </div>
                                <div class="comment-text-sm"><span><?= $comment['content'] ?></span></div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="technicalModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Technical Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="productSpecs">
                    <div class="techGroup row">
                        <h2 class="col-4"><span>General</span></h2>
                        <div class="desc-table col-8">
                            <div class="desc-table__row">
                                <div class="desc-table__key">Packaged Quantity</div>
                                <div class="desc-table__value">1</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Platform Technology</div>
                                <div class="desc-table__value">Intel vPro Technology</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Embedded Security</div>
                                <div class="desc-table__value">
                                    Trusted Platform Module (TPM 1.2) Security Chip
                                </div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Manufacturer</div>
                                <div class="desc-table__value">Dell, Inc.</div>
                            </div>
                        </div>
                    </div>

                    <div class="techGroup row">
                        <h2 class="col-4"><span>Processor / Chipset</span></h2>
                        <div class="desc-table col-8">
                            <div class="desc-table__row">
                                <div class="desc-table__key">CPU</div>
                                <div class="desc-table__value">
                                    Intel Core i7 (6th Gen) 6820HQ / 2.7 GHz
                                </div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Max Turbo Speed</div>
                                <div class="desc-table__value">3.6 GHz</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Number of Cores</div>
                                <div class="desc-table__value">Quad-Core</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Cache</div>
                                <div class="desc-table__value">8 MB</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">64-bit Computing</div>
                                <div class="desc-table__value">Yes</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Cache</div>
                                <div class="desc-table__value">8 MB</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Features</div>
                                <div class="desc-table__value">
                                    Hyper-Threading Technology, Intel Smart Cache, Intel Turbo
                                    Boost Technology 2.0
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="techGroup row">
                        <h2 class="col-4"><span>Cache Memory</span></h2>
                        <div class="desc-table col-8">
                            <div class="desc-table__row">
                                <div class="desc-table__key">Installed Size</div>
                                <div class="desc-table__value">8 MB</div>
                            </div>
                        </div>
                    </div>

                    <div class="techGroup row">
                        <h2 class="col-4"><span>RAM</span></h2>
                        <div class="desc-table col-8">
                            <div class="desc-table__row">
                                <div class="desc-table__key">Memory Speed</div>
                                <div class="desc-table__value">2133 MHz</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">
                                    Memory Specification Compliance
                                </div>
                                <div class="desc-table__value">PC4-17000</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Technology</div>
                                <div class="desc-table__value">DDR4 SDRAM</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Installed Size</div>
                                <div class="desc-table__value">8 GB</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Data Integrity Check</div>
                                <div class="desc-table__value">non-ECC</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Rated Memory Speed</div>
                                <div class="desc-table__value">2133 MHz</div>
                            </div>
                        </div>
                    </div>

                    <div class="techGroup row">
                        <h2 class="col-4"><span>Storage</span></h2>
                        <div class="desc-table col-8">
                            <div class="desc-table__row">
                                <div class="desc-table__key">Interface</div>
                                <div class="desc-table__value">Serial ATA-600</div>
                            </div>
                        </div>
                    </div>

                    <div class="techGroup row">
                        <h2 class="col-4"><span>System</span></h2>
                        <div class="desc-table col-8">
                            <div class="desc-table__row">
                                <div class="desc-table__key">Platform Technology</div>
                                <div class="desc-table__value">Intel vPro Technology</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Notebook Type</div>
                                <div class="desc-table__value">notebook</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Platform</div>
                                <div class="desc-table__value">Windows</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Hard Drive Capacity</div>
                                <div class="desc-table__value">500 GB</div>
                            </div>
                            <div class="desc-table__row">
                                <div class="desc-table__key">Embedded Security</div>
                                <div class="desc-table__value">
                                    Trusted Platform Module (TPM 1.2) Security Chip
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Footer-->
<?php include 'layout/footer.php'; ?>

<!-- dialog box -->
<div id="white-background">
</div>
<div id="dlgbox">
    <div id="dlg-header">Please Login!</div>
    <div id="dlg-body">You must login to post a comment!</div>
    <div id="dlg-footer">
        <a class="btn btn-primary" href="/login1">Login</a>
        <button class="btn btn-primary" onclick="dlgCancel()">Cancel</button>
    </div>
</div>

<!-- script of dialog -->
<script>
    function dlgCancel() {
        dlgHide();

    }

    function dlgHide() {
        var whitebg = document.getElementById("white-background");
        var dlg = document.getElementById("dlgbox");
        whitebg.style.display = "none";
        dlg.style.display = "none";
    }

    function showDialog() {
        var whitebg = document.getElementById("white-background");
        var dlg = document.getElementById("dlgbox");
        whitebg.style.display = "block";
        dlg.style.display = "block";

        var winWidth = window.innerWidth;

        dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
        dlg.style.top = "150px";
    }
</script>


<!-- Bootstrap core JS-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<!-- Contact form JS-->
<script src="/assets/mail/jqBootstrapValidation.js"></script>
<script src="/assets/mail/contact_me.js"></script>
<!-- Core theme JS-->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/xzoom.min.js"></script>
<script src="/assets/js/product-details.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btn_cmt").on('click', function (ev) {
            ev.preventDefault();
            let comment = $("#cmt").val().trim();
            let u_id = $("#user_id").text().trim();
            let u_name = $("#user_name").text().trim();
            let isCommentBoxEmpty = parseInt($(this).data('comment-empty'), 10) === 1;

            if (u_id !== "Empty" && u_name !== "Empty") {
                $.ajax({
                    url: "/products/<?= $product['id'] ?>/comment",
                    method: "POST",
                    data: {
                        comment_text: comment
                    },
                    dataType: "json",
                    success: (data) => {
                        if (data.error) return alert(data.error);

                        const comment = data.comment;
                        const commentEl = `<div class="commented-section mt-2">
                            <div class="d-flex flex-row align-items-center commented-user">
                                <h5 class="mr-2">${comment.username}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">${dayjs().format('MMMM DD YYYY')}</span>
                            </div>
                            <div class="comment-text-sm"><span>${comment.content}</span></div>
                        </div>`;

                        if (isCommentBoxEmpty)  {
                            $('#comment_box').html(commentEl)
                            $(this).data('comment-empty', 0);
                        } else {
                            $('#comment_box').after(commentEl)
                        }

                        $("#cmt").val("");

                    }
                });

            } else {
                $("#cmt").val("");
                showDialog();

            }


        });
    });

</script>
</body>

</html>