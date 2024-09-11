<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">
<style>
    .mcontainer {
        padding: 100px 200px;
        font-family: "Montserrat", system-ui;
        font-optical-sizing: auto;
        line-height: 2.3;

        & .logo {
            text-align: center;

            & img {
                width: 15%;
            }
        }

        & .message {
            color: black;

            /* h3 */
            & h3 {
                font-weight: bold;

                & span {
                    color: rgb(46, 144, 255);
                }
            }

            /* h3 */

            /* p */
            & p {
                color: gray;
                font-weight: 400;
            }

            & p:nth-child(4) {
                color: black;
                font-weight: bold;
            }

            /* p */
        }
    }

    .storeLogo {
        text-decoration: none;
        color: black;
        font-weight: bold;
        text-transform: uppercase;
    }

    .last-message {
        font-weight: bold;
        color: black;
    }
</style>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
session_start();
$con = mysqli_connect("localhost", "root", "", "admindb2");
function Connection()
{
    return mysqli_connect("localhost", "root", "", "admindb2");
}

function Select($t)
{
    return mysqli_query(Connection(), "select * from $t");
}



if (isset($_POST["signUp"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = mysqli_query($con, "select * from users where email = '$email' AND password = '$password'");
    if (mysqli_num_rows($query) > 0) {
        echo "
                <script>
                    alert('Email already taken!')
                    location.assign('sign_up.php')
                </script>
             ";
    } else {
        $num = rand(1, 10000000000);
        $query = mysqli_query($con, "Insert into users (name,email,password,role,phoneNum)
            VALUES
        ('$name', '$email', '$password', 'user', '$num')
        ");
        if ($query) {
            echo "
                <script>
                    alert('Account Creation Sucessfull!')
                    location.assign('sign_in.php')
                </script>
             ";
        }
    }
}

if (isset($_POST["signIn"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = mysqli_query($con, "select * from users where email = '$email' AND password = '$password'");
    if (mysqli_num_rows($query) > 0) {
        $converted = mysqli_fetch_array($query);
        // Admin Login
        if ($converted["role"] == "admin") {
            $_SESSION["admin"] = $converted["name"];
            $_SESSION["role"] = $converted["role"];
            $_SESSION["email"] = $converted["email"];
            $_SESSION["profile"] = $converted["profile"];
            $_SESSION["password"] = $converted["password"];
            $_SESSION["contact"] = $converted["phoneNum"];
            echo "
                    <script>
                    alert('Account login Sucessfull!')
                    location.assign('./AdminDB3/public.php?index')
                    </script>
            ";
        }
        // Admin Login

        // user login
        else if ($converted["role"] == "user") {
            $_SESSION["user_Id"] = $converted["Id"];
            $_SESSION["profile"] = $converted["profile"];
            $_SESSION["name"] = $converted["name"];
            $_SESSION["email"] = $converted["email"];
            $_SESSION["phone"] = $converted["phoneNum"];
            $_SESSION["country"] = $converted["country"];
            $_SESSION["Address"] = $converted["Address"];
            if (isset($_SESSION["product"])) {
                header("location:product-detail.php?pId=" . $_SESSION["product"]);
            } else {
                header("location:index.php");
            }
            echo "
                    <script>
                            alert('Site login Sucessfull!')
                            location.assign('index.php')
                    </script>
            ";
        }
        // user login
    } else {
        echo "
                <script>
                    alert('Account login Failed!')
                    location.assign('sign_in.php')
                </script>
             ";
    }
}

if (isset($_POST["createRecord"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $contact = "+966 " . rand(1, 10000000000);
    $query = mysqli_query($con, "Insert into users (name,email,password,role,phoneNum)
        VALUES 
            ('$name', '$email', '$password', '$role', '$contact')
        ");
    if ($query) {
        echo "
                <script>
                    alert('Record Added Sucessfully!')
                    location.assign('./AdminDB3/public.php?data')
                </script>
             ";
    }
}


if (isset($_POST["deleteRecord"])) {
    $Id = $_POST["Id"];
    $query = mysqli_query($con, "Delete from users where Id = '$Id'");
    if ($query) {
        echo "
                <script>
                    alert('Record Deleted Sucessfully!')
                    location.assign('./AdminDB3/public.php?data')
                </script>
             ";
    }
}

if (isset($_POST["updateRecord"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $Id = $_POST["Id"];
    $contact = "+966 " . rand(1, 1000000000);
    $query = mysqli_query($con, "Update users set name = '$name', email = '$email', password = '$password', role = '$role', phoneNum = '$contact' where Id = '$Id'");
    if ($query) {
        echo "
        <script>
            alert('Record Updated Sucessfully!')
            location.assign('./AdminDB3/public.php?data')
        </script>
     ";
    }
}


if (isset($_POST["uploadCategories"])) {
    $c_name = $_POST["c_name"];
    $c_info = $_FILES["c_info"]["tmp_name"];
    $cont = file_get_contents($c_info);
    $c_image = base64_encode($cont);
    $query = mysqli_query($con, "Insert into category (c_name,c_info)
        VALUES
    ('$c_name', '$c_image')
");
    if ($query) {
        echo "
            <script>
                alert('Category Uploaded Sucessfully!')
                location.assign('./AdminDB3/public.php?category')
            </script>
 ";
    }
}


if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $query = mysqli_query($con, "select * from users where name like '%$search%' OR email like '%$search%' OR
    role like '%$search%'
    ");
    if ($query) {
        echo '<table class="table table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>';



        foreach ($query as $data) {
            echo '
            <tbody>
                <?php
                $query = Select("users");
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td>' . $data["name"] . '</td>
                        <td>' . $data["email"] . '</td>
                        <td>' . $data["role"] . '</td>
                    </tr>
                </tbody>
            ';
        }

        echo '</table>';
    }
}



// Category Wise Search
if (isset($_POST["categoryBtn"])) {
    $cSearch = $_POST["categoryBtn"];
    $query = mysqli_query($con, "select * from category where c_name like '%$cSearch%'  OR Id like '%$cSearch%'");
    if ($query) {
        echo '<table class="table table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">c_name</th>
                    <th scope="col">c_Image</th>
                </tr>
            </thead>';



        foreach ($query as $data) {
            echo '
            <tbody>
                    <tr>
                        <td>' . $data["Id"] . '</td>
                        <td>' . $data["c_name"] . '</td>
                        <td><img style="width: 15%;" src="data:image/;base64, ' . $data['c_info'] . ' "/></td>
                    </tr>
                </tbody>
            ';
        }

        echo '</table>';
    }
}
// Category Wise Search



if (isset($_POST["uploadProducts"])) {
    $p_name = $_POST["p_name"];
    $p_desc = $_POST["p_desc"];
    $p_qty = $_POST["p_qty"];
    $p_price = $_POST["p_price"];
    $p_type = $_POST["p_type"];
    $p_status = $_POST["p_status"];
    $p_category = $_POST["p_category"];


    $img = $_FILES["p_image"]["tmp_name"];
    $cont = file_get_contents($img);
    $p_image = base64_encode($cont);
    $query = mysqli_query($con, "Insert into products (p_name, p_desc, p_qty, p_price, p_type, p_status, p_category, p_image)
        VALUES
    ('$p_name', ' $p_desc', ' $p_qty', ' $p_price', ' $p_type', '$p_status' ,' $p_category', '$p_image')
    ");

    if ($query) {
        echo "
        <script>
            alert('Product Uploaded Sucessfully!')
            location.assign('./AdminDB3/public.php?product')
        </script>
     ";
    }
}

// Product Wise Search
// showProducts
if (isset($_POST["ProductBtn"])) {
    $pSearch = $_POST["ProductBtn"];
    $query = mysqli_query($con, "select * from products where p_name like '%$pSearch%' OR  p_desc like '%$pSearch%' OR p_qty like '%$pSearch%' 
    OR p_price like '%$pSearch%' OR p_type like '%$pSearch%' OR p_status like '%$pSearch%' OR p_category like '%$pSearch%'
    ");
    if ($query) {
        echo '<table class="table table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>';



        foreach ($query as $data) {
            echo '
            <tbody>
                    <tr>
                        <td>' . $data["p_name"] . '</td>
                        <td>' . $data["p_desc"] . '</td>
                        <td>' . $data["p_qty"] . '</td>
                        <td>' . $data["p_price"] . '</td>
                        <td>' . $data["p_type"] . '</td>
                        <td>' . $data["p_status"] . '</td>
                        <td>' . $data["p_category"] . '</td>
                        <td><img style="width: 15%;" src="data:image/;base64, ' . $data['p_image'] . ' "/></td>
                    </tr>
                </tbody>
            ';
        }

        echo '</table>';
    }
}
// Product Wise Search


// DELETE PRODUCTS
if (isset($_POST["deleteProducts"])) {
    $Id = $_POST["Id"];
    $query = mysqli_query($con, "Delete from products where Id = '$Id'");
    if ($query) {
        echo "
                <script>
                    alert('Record Deleted Sucessfully!')
                    location.assign('./AdminDB3/public.php?product')
                </script>
             ";
    }
}

// DELETE CATEGORIES
if (isset($_POST["deleteCategories"])) {
    $Id = $_POST["Id"];
    $query = mysqli_query($con, "Delete from category where Id = '$Id'");
    if ($query) {
        echo "
                <script>
                    alert('Record Deleted Sucessfully!')
                    location.assign('./AdminDB3/public.php?category')
                </script>
             ";
    }
}


// Managing User
if (isset($_POST["prodBtnSearch"])) {
    $pSearch = $_POST["prodBtnSearch"];
    $query = mysqli_query($con, "select * from products where p_name like '%$pSearch%' OR  p_desc like '%$pSearch%' OR p_qty like '%$pSearch%' 
    OR p_price like '%$pSearch%' OR p_type like '%$pSearch%' OR p_status like '%$pSearch%' OR p_category like '%$pSearch%'
    ");
    if ($query) {
        foreach ($query as $data) {
            echo '
               <div class="col-md-4">
					<div class="product-item">
						<div class="product-thumb">
							<img class="img-responsive" style="height: 50vh;" src="data:image/;base64,' . $data["p_image"] . '" alt="product-img" />
							<div class="preview-meta">
								<ul>
									<li>
										<a href="product-detail.php?pId=' . $data["Id"] . '"> 
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
							<h4><a href="product-single.html">' . $data["p_name"] . '</a></h4>
							<p class="price">' . "$" . $data["p_price"] . '</p>
						</div>
					</div>
				</div>
                 ';
        }
    }
}

if (isset($_POST["AddToCart"])) {
    $user_Id = $_SESSION["user_Id"];
    $product_Id = $_POST["p_Id"];
    $productQuantity = $_POST["product-quantity"];
    $query = mysqli_query($con, "SELECT * FROM cart where u_id = '$user_Id' AND p_id = ' $product_Id'");
    if (mysqli_num_rows($query) > 0) {
        $convertedData = mysqli_fetch_array($query);
        $oldQuant = $convertedData["p_qty"];
        $newQuantity = $productQuantity + $oldQuant;
        $query2 = mysqli_query($con, "UPDATE cart set p_qty = '$newQuantity' WHERE u_id = '$user_Id' AND p_id = '$product_Id'");
        if ($query2) {
            echo "
                        <script>
                            alert('Quantity update sucessfully!')
                            location.assign('cart.php')
                        </script>
                 ";
        }
    } else {
        $query = mysqli_query($con, "Insert into cart (u_id,p_id,p_qty) VALUES ('$user_Id', '$product_Id','$productQuantity')");
        if ($query) {
            echo "
                    <script>
                        alert('Product has been added to cart!')
                        location.assign('cart.php')
                    </script>
                 ";
        }
    }
}


// checkout button
if (isset($_POST["checkoutBtn"])) {
    $user_Id = $_SESSION["user_Id"];
    $prod_Id =  $_SESSION["product"];
    $query = mysqli_query($con, "SELECT * FROM cart where u_id = '$user_Id'");
    foreach ($query as $data) {
        mysqli_query($con, "INSERT INTO orders (p_id,u_id,p_qty) VALUES  ('" . $data["p_id"] . "', '" . $data["u_id"] . "', '" . $data["p_qty"] . "')    ");
    }
    $query2 = mysqli_query($con, "DELETE FROM cart where u_id  = '" . $_SESSION["user_Id"] . "'");
    if ($query2) {
        $userName = $_SESSION["name"];
        $userEmail = $_SESSION["email"];
        $adminEmail = "fouzulazeem98@gmail.com";
        $secretKey = "tdxzxxlmlrzypjha";
        $RandomOrderNo = rand(1, 10000000);
        $random = "#" . $RandomOrderNo;
        // $getID = $_SESSION["user_Id"];
        $query = mysqli_query($con, "UPDATE orders set Order_ID = '$random' where u_id = '" . $_SESSION["user_Id"] . "'");
        if ($query) {
            echo "
                        <script>
                                alert('order place Sucessfully!')
                                location.assign('confirmation.php')
                        </script>
                    ";
        }

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $adminEmail;                  //SMTP username
            $mail->Password   = $secretKey;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($adminEmail, 'Ecomme Store');
            $mail->addAddress($userEmail,  $userName);  //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            //Content
            $message = '
            
                            
                    <div style="max-width:70% margin: 0 auto; font-family:sans-serif; padding:30px 30px;">
                        <div>
                            <h3>Hello ' . $_SESSION["name"] . ',</h3>
                            <p style="color:gray; letter-spacing:1px; font-size:16px">Your order has been placed sucessfully, Your order Number: <span style="color:black;font-weight:bold; text-decoration:none">' . $_SESSION["Order_ID"] . '</span> </p>
                            <p style="color:gray; letter-spacing:1px; font-size:16px">Thank you for shopping</p>
                            <p style="color:gray; letter-spacing:1px; font-size:16px">Thank you so much for shopping with us at ECOMME ! We are thrilled to have you as part of our
                                community and sincerely appreciate your recent purchase of Product. Your support means the world
                                to us, and we hope that your new product brings you joy, satisfaction, and exceeds all your
                                expectations. 
                                <span class="last-message" style="font-weight:bold; color:black"> Hope to see you again!
                                    😀
                                </span> 
                            </p>
                        </div>

                        <br>
                        <div>
                            <a style="text-decoration:none; color:black; letter-spacing:1px; font-size:15px; font-weight:bold"></a>
                            <p style="color:black; letter-spacing:1px; font-size:15px; font-weight:bold">Ecomme, <br> Copyright &copy; Ecomme, All Rights Reserved.</p>
                        </div>
                    </div>

                        ';

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'We got an order from you!';
            $mail->Body    = $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    // checkout button


    if (isset($_GET["category_Id"])) {
        $c_Id = $_GET["category_Id"];
        $p_Id = $_SESSION["product"];
        $query = mysqli_query($con, "select * from category where Id = '$c_Id'");
        foreach ($query as  $data) {
            echo '
        <div class="col-md-4">
             <div class="product-item">
                 <div class="product-thumb">
                     <img class="img-responsive" style="height: 50vh;" src="data:image/;base64,' . $data["c_image"] . '" alt="product-img" />
                     <div class="preview-meta">
                         <ul>
                             <li>
                                 <a href="product-detail.php?pId=' . $data["Id"] . '"> 
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
                     <h4><a href="product-single.html">' . $data["c_name"] . '</a></h4>
                     <p class="price">' . "$" . $data["p_price"] . '</p>
                 </div>
             </div>
         </div>
          ';
        }
    }
    if (isset($_POST["fetchBtn"])) {
        $query = mysqli_query($con, "select * from products INNER JOIN category ON products.category_Id = category.Id");
        if ($query) {
            foreach ($query as $data) {
                echo '
                        <div class="col-md-4">
					<div class="product-item">
						<div class="product-thumb">
							<img class="img-responsive" style="height: 50vh;" src="data:image/;base64' . $data["p_image"] . ' " alt="product-img" />
							<div class="preview-meta">
								<ul>
									<li>
										<a href="product-detail.php?pId=' . $data["Id"] . '">
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
							<h4><a href="product-single.html">' . $data["p_name"] . '</a></h4>
							<p class="price">' . $data["p_price"] . '</p>
						</div>
					</div>
				</div>
                 ';
            }
        }
    }


    if (isset($_POST["cartReset"])) {
        $Id = $_POST["Id"];
        $query = mysqli_query($con, "DELETE FROM cart where Id = '$Id'");
        if ($query) {
            echo "
                <script>
                    alert('Product Remove Sucessfully!')
                    location.assign('cart.php')
                </script>
            ";
        }
    }
}
if (isset($_POST["uploadBtn"])) {
    $userImage = $_FILES["userImage"]["tmp_name"];
    $Id = $_POST["Id"];
    $cont = file_get_contents($userImage);
    $profile = base64_encode($cont);
    $query = mysqli_query($con, "update users set profile = '$profile' where Id = '$Id'");
    if ($query) {
        echo "
                    <script>
                        alert('profile update Sucessfully!')
                        location.assign('dashboard.php')
                    </script>
              ";
    } else {
        echo "
                    <script>
                        alert('Please upload imagez!')
                        location.assign('dashboard.php')
                    </script>
            ";
    }
}


if(isset($_POST["deleteOrders"])){
    $query = mysqli_query($con, "DELETE FROM orders where Id = '".$_POST["Id"]."' ");
    if($query){
        echo "
                <script>
                    alert('order deleted sucessfully!')
                    location.assign('./AdminDB3/public.php?orders')
                </script>
             ";
    }
}
?>
