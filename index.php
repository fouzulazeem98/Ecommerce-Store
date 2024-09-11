<?php
include("header.php");
?>

<style>
	.trendProduct {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.trendProduct h2 {
		padding: 0px 20px;
	}

	.trendProduct input {
		width: 30%;
		border: none !important;
		outline: none !important;
		box-shadow: 2px 2px 8px gray;
		padding: 0 20px;
		border-radius: 4px;
		font-size: 16px;
		font-weight: 500;
	}

	.a {
		border: none;
		box-shadow: 0px 4px 8px gray;
		outline: none;
		padding: 14px 24px;
		border-radius: 4px;
	}

	.sele {
		border: none;
		outline: none;
		background: none;
	}

	.filter_btn {
		display: flex;
		justify-content: center;
		gap: 50px;
		padding: 0 20px;
		margin-bottom: 10px;
	}

	.filter_btn .bt {
		background: none;
		border: none;
		text-decoration: underline 1px gray;
		font-weight: 500;
		font-size: 18px;
		text-transform: uppercaseF;
	}
</style>
<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="index.php">Home</a>
					</li><!-- / Home -->


					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Basic -->
								<div class="col-lg-12 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Pages</li>
										<li role="separator" class="divider"></li>
										<li><a href="shop.php">Shop</a></li>
										<li><a href="cart.php">Cart</a></li>
									</ul>
								</div>

								<!-- Layout -->


							</div><!-- / .row -->
						</div><!-- / .dropdown-menu -->
					</li><!-- / Elements -->

					<li>
						<a href="contact.php">Contact Us</a>
					</li>

					<!-- Pages -->
					<li>
						<?php
						if (isset($_SESSION["user_Id"])) {
						?>
							<a href="signout.php" style="font-weight: bold;">
								<i class="fa-solid fa-right-from-bracket"></i>
								Sign Out
							</a>
						<?php
						} else {
						?>
							<a href="sign_in.php" style="font-weight: bold;">
								<i class="fa-solid fa-right-from-bracket"></i>
								Sign In
							</a>
						<?php
						}
						?>
					</li>
					<!-- Shop -->

					<?php
					if (isset($_SESSION["user_Id"])) {
					?>
						<li>
							<a id="spec" href="#" style="font-weight: bold;">
								<i class="fa-solid fa-at"></i>
								<span class="me-4">Email</span>
								<span id="chld" style="text-transform:lowercase; display:none; transition:all 0.7s ease-in-out; font-weight:400">
									<?php echo $_SESSION["email"] ?>
								</span>
							</a>
						</li>
					<?php
					}
					?>
				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>

<?php
$query = Select("Category");
$data = mysqli_fetch_array($query);
?>

<div class="hero-slider">
	<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider_7.jpg); background-position:top; background-size:cover">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 text-center">
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
					<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.php">Shop Now</a>
				</div>
			</div>
		</div>
	</div>
	<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider_3.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 text-left">
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
					<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.php">Shop Now</a>
				</div>
			</div>
		</div>
	</div>
	<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider_2.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 text-right">
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
					<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.php">Shop Now</a>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="product-category section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title text-center">
					<h2>Product Category</h2>
				</div>
			</div>

			<?php
			$query = Select("category");
			foreach ($query as $data) {
			?>
				<div class="col-md-6">
					<div class="category-box category-box-2">
						<a href="#!">
							<img style="height: 80vh" src="data:image/;base64,<?php echo $data["c_info"] ?>" alt="" />
							<div class="content">
								<h3><?php echo $data["c_name"] ?></h3>
								<p>Special Design Comes First</p>
							</div>
						</a>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>

<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<div class="trendProduct">
					<h2>Trendy Products</h2>
					<input type="text" class="form-control" placeholder="Search Products..." id="searchProducts">

				</div>
			</div>
		</div>

		<div class="row" id="showProducts" id="e">
			<?php
			$query = Select("products");
			foreach ($query as $data) {
			?>
				<div class="col-md-4">
					<div class="product-item">

						<div class="product-thumb">
							<span class="bage">Sale</span>
							<img class="img-responsive" style="height: 50vh;" src="data:image/;base64,<?php echo $data["p_image"] ?>" alt="product-img" />
							<div class="preview-meta">

								<ul>
									<li>
										<a href="product-detail.php?pId=<?php echo $data["Id"] ?>">
											<i class="fs-4 fa-solid fa-cart-shopping"></i>
										</a>
									</li>
									<li>
										<a href="#"><i class="fs-4 fa-regular fa-heart"></i></a>
									</li>
									<li>
										<a href="#!"><i class="fs-4 fa-solid fa-magnifying-glass"></i></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="product-content">
							<h4><a href="product-single.html"><?php echo $data["p_name"] ?></a></h4>
							<p class="price"><?php echo "$" . $data["p_price"] ?></p>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>


<!--
Start Call To Action
==================================== -->
<section class="call-to-action bg-gray section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="title">
					<h2>SUBSCRIBE TO NEWSLETTER</h2>
					<p>Want to Recived Alerts From Us! Then Subscribe to NEWSLETTER</p>
				</div>
				<div class="col-lg-6 col-md-offset-3">
					<div class="input-group subscription-form">
						<input type="text" class="form-control" placeholder="Enter Your Email Address">
						<span class="input-group-btn">
							<button class="btn btn-main" type="button" onclick="alert('Your are Subscribed Sucessfully!')">Subscribe Now!</button>
						</span>
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->

			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- End section -->

<section class="section instagram-feed">
	<div class="container">
		<div class="row">
			<div class="title">
				<h2>View us on instagram</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="instagram-slider" id="instafeed" data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn"></div>
			</div>
		</div>
	</div>
</section>

<script>
	let eM = document.getElementById("spec");
	eM.addEventListener("mouseover", function() {
		let chld = document.getElementById("chld");
		chld.style.position = "absolute"
		chld.style.padding = "10px 20px"
		chld.style.top = "-145%"
		chld.style.left = "-40%"
		chld.style.display = "inline"
		chld.style.transition = "all 1s ease-in-out"
	})

	eM.addEventListener("mouseout", function() {
		chld.style.display = "none"
	})
</script>

<?php
include("footer.php");
?>