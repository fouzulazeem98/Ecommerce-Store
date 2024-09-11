<?php
include("header.php");
?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Shop</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">shop</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="products section">
	<div class="container">
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
											<i class="tf-ion-ios-search-strong"></i>
										</a>
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








			<!-- Modal -->
			<div class="modal product-modal fade" id="product-modal">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="tf-ion-close"></i>
				</button>
				<div class="modal-dialog " role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-sm-6 col-xs-12">
									<div class="modal-image">
										<img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img" />
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="product-short-details">
										<h2 class="product-title">GM Pendant, Basalt Grey</h2>
										<p class="product-price">$200</p>
										<p class="product-short-description">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
										</p>
										<a href="cart.html" class="btn btn-main">Add To Cart</a>
										<a href="product-single.html" class="btn btn-transparent">View Product Details</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.modal -->

		</div>




		<!-- Modal -->
		<div class="modal product-modal fade" id="product-modal">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i class="tf-ion-close"></i>
			</button>
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-8 col-sm-6 col-xs-12">
								<div class="modal-image">
									<img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img" />
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="product-short-details">
									<h2 class="product-title">GM Pendant, Basalt Grey</h2>
									<p class="product-price">$200</p>
									<p class="product-short-description">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
									</p>
									<a href="cart.html" class="btn btn-main">Add To Cart</a>
									<a href="product-single.html" class="btn btn-transparent">View Product Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.modal -->

	</div>
	</div>
</section>




<?php
include("footer.php");
?>