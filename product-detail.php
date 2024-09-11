<?php
include("header.php");
?>

<!-- Main Menu Section -->

<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="shop.html">Shop</a></li>
					<li class="active">Single Product</li>
				</ol>
			</div>
			<div class="col-md-6">
				<ol class="product-pagination text-right">
					<li><a href="blog-left-sidebar.html"><i class="tf-ion-ios-arrow-left"></i> Next </a></li>
					<li><a href="blog-left-sidebar.html">Preview <i class="tf-ion-ios-arrow-right"></i></a></li>
				</ol>
			</div>
		</div>


		<?php

		if (isset($_GET["pId"])) {
			$Id = $_GET["pId"];
			// $_SESSION["p_Id"] = 
			$query = mysqli_query($con, "select * from products where Id = '" . $_GET["pId"] . "'");
			$data = mysqli_fetch_array($query);
		?>

			<div class="row mt-20">
				<div class="col-md-5">
					<div class="single-product-slider">
						<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
							<div class='carousel-outer'>
								<!-- me art lab slider -->
								<div class='carousel-inner '>
									<div class='item active'>
										<img src='data:image/;base64,<?php echo $data["p_image"] ?>' alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
									</div>
									<div class='item '>
										<img src='data:image/;base64,<?php echo $data["p_image"] ?>' alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
									</div>
									<div class='item '>
										<img src='data:image/;base64,<?php echo $data["p_image"] ?>' alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
									</div>
								</div>
							</div>



						</div>
					</div>
				</div>


				<div class="col-md-7">
					<div class="single-product-details">
						<h2><?php echo $data["p_name"] ?></h2>
						<p class="product-price">$<?php echo $data["p_price"] ?></p>
						<p><?php echo $data["p_category"] ?></p>
						<p class="product-description mt-20">
							<?php echo $data["p_desc"] ?>
						</p>

						<form action="connection.php" method="post">
							<input type="hidden" name="p_Id" value="<?php echo $Id ?>">
							<div class="product-quantity">
								<span>Quantity:</span>
								<div class="product-quantity-slider">
									<input type="text" value="0" name="product-quantity">
								</div>
							</div>
							<?php
							if (isset($_SESSION["user_Id"])) {
							?>
								<!-- <a href="cart.php" class="btn btn-main mt-20">Add To Cart</a> -->
								<button name="AddToCart" type="submit" class="btn btn-main mt-20">Add to cart</button>
						</form>
					<?php
							} else {
								$_SESSION["product"] = $_GET["pId"];
					?>
						<a href="sign_in.php" class="btn btn-main mt-20">Login</a>
					<?php
							}
					?>
					</div>
				</div>
			</div>
		<?php
		};
		?>


		<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
						<li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews (3)</a></li>
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<h4>Product Description</h4>
							<?php
							$query = mysqli_query($con, "select * from category");
							// $_SESSION["ctg"]
							$converted = mysqli_fetch_array($query);
							if (mysqli_num_rows($query) > 0) {
							?>
								<p class="mt-5" style="line-height: 1.9;">Fashion is a dynamic expression of personal style, and clothing for women, men, and kids reflects this diversity with a vast range of options designed to meet various needs, tastes, and occasions. Women’s clothing offers a wide array of styles, from elegant dresses, blouses, and skirts for formal or professional settings, to casual wear like jeans, t-shirts, and activewear for everyday comfort. Women’s fashion is characterized by a variety of cuts, colors, patterns, and fabrics, allowing for endless possibilities in expressing individuality and trends. Accessories such as handbags, jewelry, scarves, and shoes further enhance the versatility of women’s wardrobes, enabling them to adapt their look for different seasons and events.</p>
							<?php
							}
							?>
						</div>
						<div id="reviews" class="tab-pane fade">
							<div class="post-comments">
								<ul class="media-list comments-list m-bot-50 clearlist">
									<!-- Comment Item start-->
									<li class="media">

										<a class="pull-left" href="#!">
											<img class="media-object comment-avatar" src="./Assets/Images/profile-user.png" alt="" width="50" height="50" />
										</a>

										<div class="media-body">
											<div class="comment-info">
												<h4 class="comment-author">
													<a href="#!">Fahad</a>

												</h4>
												<time datetime="2013-04-06T13:53">July 02, 2024, at 11:34</time>
												<a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
											</div>

											<p>
												"Just received my new shirt, and I couldn’t be happier! The whole shopping experience was seamless, from browsing the products to checking out. Plus, the customer service team was super helpful when I had questions about sizing. Five stars all the way!
											</p>
										</div>

									</li>
									<!-- End Comment Item -->

									<!-- Comment Item start-->
									<li class="media">

										<a class="pull-left" href="#!">
											<img class="media-object comment-avatar" src="./Assets/Images/profile-user.png" alt="" width="50" height="50" />
										</a>

										<div class="media-body">
											<div class="comment-info">
												<h4 class="comment-author">
													<a href="#!">Safiya</a>

												</h4>
												<time datetime="2013-04-06T13:53">July 02, 2024, at 11:34</time>
												<a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
											</div>

											<p>
												"This is my go-to site for kids' clothes. The selection is great, and I always find cute outfits for my little ones. Shipping is fast, and the quality of the clothes is fantastic. My kids love the fun designs, and I love the great prices. So happy with my purchases!"
											</p>
										</div>

									</li>
									<!-- End Comment Item -->

									<!-- Comment Item start-->
									<li class="media">

										<a class="pull-left" href="#!">
											<img class="media-object comment-avatar" src="./Assets/Images/profile-user.png" alt="" width="50" height="50" />
										</a>

										<div class="media-body">
											<div class="comment-info">
												<h4 class="comment-author">
													<a href="#!">Ahmad</a>

												</h4>
												<time datetime="2013-04-06T13:53">July 02, 2024, at 11:34</time>
												<a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
											</div>

											<p>
												"I absolutely love my new dress! The fit is perfect, and the quality is even better than I expected. The website was easy to navigate, and my order arrived earlier than promised. I will definitely be shopping here again. Highly recommend!"
											</p>
										</div>

									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="products related-products section">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Related Products</h2>
			</div>
		</div>
		<div class="row">
			<?php
			$query = mysqli_query($con, "select * from products limit 4");
			foreach ($query as $data) {
			?>
				<div class="col-md-3">
					<div class="product-item">
						<div class="product-thumb">
							<img style="height: 40vh;" class="img-responsive" src="data:image/;base64,<?php echo $data["p_image"] ?>" alt="product-img" />
							<div class="preview-meta">
								<ul>
									<li>
										<span data-toggle="modal" data-target="#product-modal">
											<i class="tf-ion-ios-search"></i>
										</span>
									</li>
									<li>
										<a href="#"><i class="tf-ion-ios-heart"></i></a>
									</li>
									<li>
										<a href="#!"><i class="tf-ion-android-cart"></i></a>
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



<!-- Modal -->
<div class="modal product-modal fade" id="product-modal">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<i class="tf-ion-close"></i>
	</button>
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<div class="modal-image">
							<img class="img-responsive" src="images/shop/products/modal-product.jpg" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="product-short-details">
							<h2 class="product-title">GM Pendant, Basalt Grey</h2>
							<p class="product-price">$200</p>
							<p class="product-short-description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
							</p>
							<a href="#!" class="btn btn-main">Add To Cart</a>
							<a href="#!" class="btn btn-transparent">View Product Details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
include("footer.php");
?>