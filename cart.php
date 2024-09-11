<?php
include("header.php");
?>

<!-- Main Menu Section -->

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">cart</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
$query = Select("cart");
$converted = mysqli_fetch_array($query);
if (mysqli_num_rows($query) > 0) {
?>
	<div class="page-wrapper">
		<div class="cart shopping">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="block">
							<div class="product-list">
								<form method="post">
									<table class="table">
										<thead>
											<tr>
												<th class="">Item Name</th>
												<th class="">Item Price</th>
												<th class="">Item Quantity</th>
												<th class="">Total Cost</th>
												<th class="">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (!isset($_SESSION["user_Id"])) {
												echo "";
											} else {
												$query = mysqli_query(
													$con,
													"select cart.Id ID, products.p_name,products.p_price,products.p_image,cart.p_qty Quantity,users.name userName from cart INNER JOIN products ON cart.p_id = products.Id INNER JOIN users ON cart.u_id = users.Id where u_id = '" . $_SESSION["user_Id"] . "'"
												);
												if (mysqli_num_rows($query) > 0) {
													foreach ($query as  $data) {
											?>
														<tr>
															<td class="">
																<div class="product-info">
																	<img width="80" src="data:image/;base64,<?php echo $data["p_image"] ?>" alt="" />
																	<a href="#!"><?php echo $data["p_name"] ?></a>
																</div>
															</td>
															<td class="">
																<div class="product-info">
																	<span><?php echo "$" . $data["p_price"] ?></span>
																</div>
															</td>

															<td>
																<div class="product-info">
																	<span><?php echo $data["Quantity"] ?></span>
																</div>
															</td>
															<td>
																<div class="product-info">
																	<span><?php echo "$" . $data["Quantity"] * $data["p_price"] ?></span>
																</div>
															</td>
															<form action="connection.php" method="post">
																<?php
																$query = Select("cart");
																$converted = mysqli_fetch_array($query);
																?>
																<input type="hidden" name="Id" value="<?php echo $converted["Id"] ?>">
																<td>
																	<button type="submit" name="cartReset" style="background: none;" class="border-0 text fs-3">
																		<i class="fa-solid fa-xmark"></i>
																	</button>
																</td>
															</form>
														</tr>
											<?php
													}
												}
											}
											?>
										</tbody>
									</table>
									<form action="connection.php" method="post">
										<?php if (!isset($_SESSION["user_Id"])) {
											echo "";
										} else {
											$Id = $_SESSION["user_Id"];
										?>
											<input type="hidden" value="<?php echo $Id ?>">
										<?php
										} ?>
										<button type="submit" name="checkoutBtn" href="confirmation.php" class="btn btn-main pull-right">Checkout</button>
									</form>
								</form>
								<script>
									let a = document.getElementById("a");
									a.addEventListener("click", function() {
										location.assign("confirmation.php");
										a.disabled = true;
									})
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
} else {
?>
	<section class="empty-cart page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="block text-center">
						<i class="tf-ion-ios-cart-outline"></i>
						<h2 class="text-center">Your cart is currently empty.</h2>
						<p>Please add products to proceed further!</p>
						<a href="shop.php" class="btn btn-main mt-20">Return to shop</a>
					</div>
				</div>
			</div>
	</section>
<?php
}
?>


<?php
include("footer.php");
?>