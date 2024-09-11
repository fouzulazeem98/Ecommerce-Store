<title>Index</title>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->



        <!-- COUNT -->
        <div class="row">
            <!-- Start Notification -->
            <div class="col-lg-12 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title">Status</h5>
                    <div class="message-center d-flex  px-4 align-items-center justify-content-evenly" style="height: 100px !important;">

                        <!-- Message -->
                        <a href="#" class="d-flex">
                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0">Admins</h6>
                                <span class="time mt-2 fw-bold">
                                    <?php
                                    $query = mysqli_query($con, "select count(Id) from users where role = 'admin'");
                                    $converted = mysqli_fetch_array($query);
                                    echo $converted['count(Id)'];
                                    ?>
                                </span>
                            </div>
                        </a>

                        <!-- Message -->
                        <a href="#" class="d-flex">
                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0">Users</h6>
                                <span class="time mt-2 fw-bold">
                                    <?php
                                    $query = mysqli_query($con, "select count(Id) from users where role = 'user'");
                                    $converted = mysqli_fetch_array($query);
                                    echo $converted['count(Id)'];
                                    ?>
                                </span>
                            </div>
                        </a>

                        <a href="#" class="d-flex">
                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0">Product</h6>
                                <span class="time">
                                    <?php
                                    $query = mysqli_query($con, "select count(Id) from products");
                                    $converted = mysqli_fetch_array($query);
                                    echo $converted['count(Id)'];
                                    ?>
                                </span>
                            </div>
                        </a>

                        <a href="#" class="d-flex">
                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                            <div class="mail-contnet">
                                <h6 class="text-dark font-medium mb-0">Categories</h6>
                                <span class="time">
                                    <?php
                                    $query = mysqli_query($con, "select count(Id) from category");
                                    $converted = mysqli_fetch_array($query);
                                    echo $converted['count(Id)'];
                                    ?>
                                </span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
            <!-- End Notification -->

            <!-- ============================================================== -->
            <!-- Projects of the Month -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <h5 class="card-title">ADMINS</h5>
                                </div>
                                <div class="ms-auto">
                                    <select class="form-select b-0">
                                        <option>Filter By</option>
                                        <option value="1">Name</option>
                                        <option value="2">Email</option>
                                        <option value="3">Phone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive mt-3 no-wrap">
                                <table class="table vm no-th-brd pro-of-month">
                                    <thead>
                                        <tr>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact Num</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = Select("users");
                                        foreach ($query as $data) {
                                        ?>
                                            <tr>
                                                <td><span class="round round-warning"></span></td>
                                                <td>
                                                    <h6><?php echo $data["name"] ?></h6><small class="text-muted">
                                                        <?php echo $data["role"] ?>
                                                    </small>
                                                </td>
                                                <td><?php echo $data["email"] ?></td>
                                                <td><?php echo $data["phoneNum"] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Projects of the Month -->
                <!-- ============================================================== -->

                <!-- Notification And Feeds -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Start Notification -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-body mailbox">
                            <h5 class="card-title">Notification</h5>
                            <div class="message-center" style="height: 420px !important;">
                                <!-- Message -->
                                <a href="#">
                                    <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                    <div class="mail-contnet">
                                        <h6 class="text-dark font-medium mb-0">Launch Admin</h6> <span
                                            class="mail-desc">Just see the my new admin!</span>
                                        <span class="time">9:30 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="#">
                                    <div class="btn btn-success btn-circle"><i class="fa fa-calendar-check-o"></i></div>
                                    <div class="mail-contnet">
                                        <h6 class="text-dark font-medium mb-0">Event today</h6> <span
                                            class="mail-desc">Just a reminder that you have
                                            event</span> <span class="time">9:10 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="#">
                                    <div class="btn btn-info btn-circle"><i class="fa fa-cog text-white"></i></div>
                                    <div class="mail-contnet">
                                        <h6 class="text-dark font-medium mb-0">Settings</h6> <span class="mail-desc">You
                                            can customize this template as you
                                            want</span> <span class="time">9:08 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="#">
                                    <div class="btn btn-primary btn-circle"><i class="fa fa-user"></i></div>
                                    <div class="mail-contnet">
                                        <h6 class="text-dark font-medium mb-0">
                                            <?php
                                            echo $_SESSION["admin"]
                                            ?>
                                        </h6> <span
                                            class="mail-desc">Just see the my admin!</span> <span class="time">9:02
                                            AM</span>
                                    </div>
                                </a>

                                <a href="#">
                                    <div class="btn btn-primary btn-circle"><i class="fa fa-user"></i></div>
                                    <div class="mail-contnet">
                                        <h6 class="text-dark font-medium mb-0">
                                            <?php echo "What's on mind!" ?>
                                        </h6> <span
                                            class="mail-desc">Just see the my admin!</span> <span class="time">9:02
                                            AM</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Notification -->
                    <!-- Start Feeds -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Feeds</h5>
                                <ul class="feeds">
                                    <li>
                                        <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> You have 4 pending
                                        tasks. <span class="text-muted">Just Now</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-success"><i class="fa fa-server"></i></div> Server #1
                                        overloaded.<span class="text-muted">2 Hours ago</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-warning"><i class="fa fa-shopping-cart"></i></div> New
                                        order received.<span class="text-muted">31 May</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-danger"><i class="fa fa-user"></i></div> New user
                                        registered.<span class="text-muted">30 May</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> New Version
                                        just arrived. <span class="text-muted">27 May</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> You have 4 pending
                                        tasks. <span class="text-muted">Just Now</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-danger"><i class="fa fa-user"></i></div> New user
                                        registered.<span class="text-muted">30 May</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Feeds -->
                </div>
                <!-- ============================================================== -->
                <!-- End Notification And Feeds -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->