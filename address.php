<?php
include("header.php");
?>
<!-- Main Menu Section -->

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
					<li><a class="active" href="address.php">Address</a></li>
					<li><a href="profile-details.php">Profile Details</a></li>
				</ul>
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th style="padding: 20px 20px;">Country</th>
									<th style="padding: 20px 20px;">Address</th>
									<th style="padding: 20px 20px;" class="col-md-2 col-sm-3">Phone</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="padding: 20px 20px;"><?php echo $_SESSION["country"] ?></td>
									<td style="padding: 20px 20px;"><?php echo $_SESSION["Address"] ?></td>
									<td style="padding: 20px 20px;"><?php echo $_SESSION["phone"] ?></td>
								</tr>
							</tbody>
						</table>
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