<?php
include("../connection.php");
if (!isset($_SESSION["admin"])) {
    echo "
                <script>
                    location.assign('../sign_in.php')
                </script>
         ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="./assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="./assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="./assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard1.css" rel="stylesheet">

    <link href="./css/colors/default.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#searchUsers").keyup(function() {
                $("#hide").hide();
                let searchData = $("#searchUsers").val();
                $.ajax({
                    url: "../connection.php",
                    type: "post",
                    data: {
                        "search": searchData,
                    },
                    success: function(res) {
                        $("#showdata").html(res);
                    }
                })
            })




            // Search Category Wise
            $("#searchCategoryWise").keyup(function() {
                let cWiseSearch = $("#searchCategoryWise").val();
                $("#hideCate").hide();
                $.ajax({
                    url: "../connection.php",
                    type: "post",
                    data: {
                        "categoryBtn": cWiseSearch,
                    },
                    success: function(res) {
                        $("#showCategories").html(res);
                    }
                })
            })
            // Search Category Wise



            // Search Product Wise
            $("#searchProductWise").keyup(function() {
                let pWiseSearch = $("#searchProductWise").val();
                $("#hidePro").hide();
                $.ajax({
                    url: "../connection.php",
                    type: "post",
                    data: {
                        "ProductBtn": pWiseSearch
                    },
                    success: function(res) {
                        $("#showProducts").html(res);
                    }
                })
            })
            // Search Product Wise
        })
    </script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="public.php?index">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="./assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="./assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="./assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a
                                    class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                                id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><img src="./assets/images/users/1.jpg" alt="user" class="" />
                                <span class="hidden-md-down">
                                    <?php
                                    echo $_SESSION["admin"];
                                    ?>
                                </span> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="public.php?index" aria-expanded="false"><i
                                    class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="public.php?profile" aria-expanded="false"><i
                                    class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="public.php?data" aria-expanded="false"><i
                                    class="fa fa-table"></i><span class="hide-menu">Data</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="public.php?product" aria-expanded="false"><i
                                    class="fa fa-bookmark-o"></i><span class="hide-menu"><span class="hide-menu">Products</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="public.php?category" aria-expanded="false"><i
                                    class="fa fa-bookmark-o"></i><span class="hide-menu"><span class="hide-menu">Categories</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="public.php?orders" aria-expanded="false"><i
                                    class="fa fa-bookmark-o"></i><span class="hide-menu"><span class="hide-menu">Orders</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="public.php?signout" aria-expanded="false">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <span class="hide-menu">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>


        <!-- PHP_CODE -->
        <?php
        if (isset($_GET["index"])) {
            include("index.php");
        }
        if (isset($_GET["profile"])) {
            include("profile.php");
        }
        if (isset($_GET["data"])) {
            include("data.php");
        }
        if (isset($_GET["product"])) {
            include("product.php");
        }
        if (isset($_GET["category"])) {
            include("category.php");
        }
        if (isset($_GET["signout"])) {
            include("signout.php");
        }
        if (isset($_GET["orders"])) {
            include("orders.php");
        }
        ?>


        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2021 Adminwrap by <a href="#">KMD.COM</a></footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="./assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="./assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="./assets/node_modules/raphael/raphael-min.js"></script>
    <script src=".//assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="./assets/node_modules/d3/d3.min.js"></script>
    <script src="./assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
</body>

</html>