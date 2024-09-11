<?php
include("header.php");
?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">my account</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">
					<li><a href="dashboard.php">Dashboard</a></li>
					<li><a href="order.php">Orders</a></li>
					<li><a href="address.php">Address</a></li>
					<li><a class="active" href="profile-details.php">Profile Details</a></li>
				</ul>
				<div class="dashboard-wrapper dashboard-user-profile">
					<div class="media">
						<div class="pull-left text-center align-items-start d-flex flex-column" href="#!">
							<?php
							$prof = $_SESSION["profile"];
							$query = mysqli_query(Connection(), "select * from users where Id = '" . $_SESSION["user_Id"] . "' ");
							if (isset($_SESSION["profile"])) {
								if (mysqli_num_rows($query) > 0) {
							?>
									<img style="width: 200px; height:200px" class="media-object user-img img-fluid" src="data:image/;base64,<?php echo $_SESSION["profile"] ?>" alt="Image">
								<?php
								}
							} else {
								?>
								<img style="width: 200px; height:200px" class="media-object user-img img-fluid" src="./Assets/Images/profile-user.png" alt="Image">
							<?php
							}
							?>
							<form action="connection.php" method="post" enctype="multipart/form-data">
								<input name="Id" type="hidden" value="<?php echo $_SESSION["user_Id"] ?>">
								<div class="d-flex">
									<input name="userImage" type="file" class="form-control mt-4 border-0">
									<button name="uploadBtn" type="submit" class="btn fs-1" style="margin-right: 24%;margin-top:1%">
										<i class="fa-solid fa-arrow-up-from-bracket"></i>
									</button>
								</div>
							</form>



						</div>
						<div class="media-body fs-4">
							<ul class="user-profile-list d-flex flex-column gap-4">
								<li>
									<span>Full Name:</span>
									<span class="fw-light" style="color:gray"><?php echo $_SESSION["name"] ?></span>
								</li>
								<li>
									<span>Country:</span>
									<span class="fw-light" style="color:gray"><?php echo $_SESSION["country"] ?></span>
								</li>
								<li>
									<span>Email:</span>
									<span class="fw-light" style="color:gray"><?php echo $_SESSION["email"] ?></span>
								</li>
								<li>
									<span>Phone:</span>
									<span class="fw-light" style="color:gray; "><?php echo $_SESSION["phone"] ?></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include("footer.php");
?>
<!-- Main Menu Section -->