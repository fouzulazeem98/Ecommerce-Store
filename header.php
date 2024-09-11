<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Ecommerce</title>
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- theme meta -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".trendProduct input").mouseenter(function() {
                $(".trendProduct input").css("box-shadow", "0px 4px 19px gray")
            })
            $(".trendProduct input").mouseleave(function() {
                $(".trendProduct input").css("box-shadow", "2px 2px 8px gray");
            })



            // Products_Search
            $("#searchProducts").keyup(function() {
                const ProductSearch = $("#searchProducts").val();
                $("#hideProductss").hide();
                $.ajax({
                    url: "connection.php",
                    type: "post",
                    data: {
                        "prodBtnSearch": ProductSearch
                    },
                    success: function(res) {
                        $("#showProducts").html(res);
                        $("#hideProducts").hide();
                    }
                })
            })


            $("body").on("click", ".ctgBtn", function() {
                const fetchCategory = $(".ctgBtn");
                $.ajax({
                    url: "connection.php",
                    type: "post",
                    data: {
                        "fetchBtn": fetchCategory
                    },
                    success: function(res) {
                        $("#e").html(res);
                    }
                })
            });



        });
    </script>

</head>

<body id="body">

    <!-- Start Top Header Bar -->
    <section class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="contact-number d-flex">
                        <i class="tf-ion-ios-telephone"></i>
                        <span>0129- 12323-123123</span>
                        <?php
                        if (isset($_SESSION["user_Id"])) {
                            $query = mysqli_query($con, "select * from orders where u_id = '" . $_SESSION["user_Id"] . "'");
                            if (mysqli_num_rows($query) > 0) {
                                $converted = mysqli_fetch_array($query);
                                echo $converted["Id"];
                        ?>
                                <a style="margin-left: 2%; font-size:1.1em; font-weight:bold" href="dashboard.php">
                                    <i class="fa-solid fa-truck"></i>
                                    View Order
                                </a>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Site Logo -->
                    <div class="logo text-center">
                        <a href="index.php">
                            <!-- replace logo here -->
                            <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                                    font-family="AustinBold, Austin" font-weight="bold">
                                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                        <text id="AVIATO">
                                            <tspan x="108.94" y="325">Ecomme</tspan>
                                        </text>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Cart -->
                    <ul class="top-menu text-right list-inline">
                        <li class="dropdown cart-nav dropdown-slide">

                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                Cart <i class="fa-solid fa-cart-shopping"></i>
                                <sup style="font-weight: bold; font-size:1.5rem">
                                    <?php

                                    if (!isset($_SESSION["user_Id"])) {
                                        echo 0;
                                    } else {
                                        $query = mysqli_query($con, "select Count(Id) from cart where u_id = '" . $_SESSION["user_Id"] . "'");
                                        if (mysqli_num_rows($query) > 0) {
                                            $converted = mysqli_fetch_array($query);
                                            echo $converted["Count(Id)"];
                                        }
                                    }
                                    ?>
                                </sup>
                            </a>

                            <div class="dropdown-menu cart-dropdown">
                                <!-- Cart Item -->

                                <!-- Cart Item -->
                                <?php
                                $grandTotal = 0;
                                if (!isset($_SESSION["user_Id"])) {
                                    echo "";
                                } else {
                                    $query = mysqli_query(
                                        $con,
                                        "select cart.Id ID, products.p_name,products.p_price,products.p_image,cart.p_qty Quantity,users.name userName from cart INNER JOIN products ON cart.p_id = products.Id INNER JOIN users ON cart.u_id = users.Id where u_id = '" . $_SESSION["user_Id"] . "'"
                                    );
                                    if (mysqli_num_rows($query) > 0) {
                                        foreach ($query as $data) {
                                            $t = $data["p_price"] * $data["Quantity"];
                                            $grandTotal += $t;
                                ?>
                                            <div class="media">
                                                <a class="pull-left" href="#!">
                                                    <img class="media-object" src="data:image/;base64,<?php echo $data["p_image"] ?>" alt="image" />
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#!"><?php echo $data["p_name"] ?></a></h4>
                                                    <div class="cart-price">
                                                        <span><?php echo $data["Quantity"] ?> x</span>
                                                        <span><?php echo $data["p_price"] ?></span>
                                                    </div>
                                                    <h5><strong><?php echo $t ?></strong></h5>
                                                </div>
                                                <a href="#!" class="remove"><i class="tf-ion-close"></i></a>
                                            </div><!-- / Cart Item -->
                                <?php
                                        }
                                    }
                                }
                                ?>
                                <div class="cart-summary">
                                    <span class="total-price"><?php echo $grandTotal  ?></span>
                                    <span>Total</span>
                                </div>
                                <ul class="text-center cart-buttons">
                                    <li><a href="cart.php" class="btn btn-small">View Cart</a></li>
                                    <li>
                                        <button type="submit" name="checkoutBtn" href="confirmation.php" class="btn btn-small btn-solid-border">Checkout</button>
                                    </li>



                                </ul>
                            </div>

                        </li><!-- / Cart -->


                        <!-- Search -->
                        <li class="dropdown search dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                    class="tf-ion-ios-search-strong"></i> Search</a>
                            <ul class="dropdown-menu search-dropdown">
                                <li>
                                    <form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
                                </li>
                            </ul>
                        </li><!-- / Search -->

                        <!-- Languages -->
                        <li class="commonSelect">
                            <select class="form-control">
                                <option>EN</option>
                                <option>DE</option>
                                <option>FR</option>
                                <option>ES</option>
                            </select>
                        </li><!-- / Languages -->

                    </ul><!-- / .nav .navbar-nav .navbar-right -->
                </div>
            </div>
        </div>
    </section><!-- End Top Header Bar -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>