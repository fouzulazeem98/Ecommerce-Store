$query = "SELECT Id FROM cart WHERE p_id = $productId AND u_id = $userId";
$result = mysqli_query($con, $query);



if (mysqli_num_rows($result) > 0) {
// Update quantity if product is already in cart
$query = "UPDATE cart SET p_qty = p_qty + $quantity WHERE p_id = $productId AND u_id = $userId";
} else {
// Insert new product into cart
$query = "INSERT INTO cart (p_id, u_id, p_qty) VALUES ($productId, $userId, $quantity)";
}