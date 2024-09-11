<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Now</title>
	<link rel="stylesheet" type="text/css" href="./Assets/CSS/sign_in_form.css">
	<link href="http://infiniteiotdevices.com/images/logo.png" rel="icon" sizes="16x16" type="image/gif" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style>
		button {
			border: none;
			background: none;
			display: block;
			width: 100%;
		}
	</style>
</head>

<body>
	<div class="loginBox">
		<img src="./Assets/Images/peakpx.jpg" class="user">
		<h2>Log In Here</h2>
		<form action="connection.php" method="post">
			<p>Email</p>
			<input type="text" placeholder="Enter Email" name="email">
			<p>Password</p>
			<input type="password" placeholder="••••••••" name="password">
			<button type="submit" name="signIn">
				<input type="submit" value="SIGN UP">
			</button>
			<a href="#" class="a">Forgot Password?</a>
			<h4>Not member? <a class="txt2" href="sign_up.php">Sign Up</a></h4>
		</form>
	</div>
</body>

</html>