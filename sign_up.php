<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Now</title>
    <link rel="stylesheet" type="text/css" href="./Assets/CSS/sign_up_form.css">
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
        <h2>Register Here</h2>
        <form action="connection.php" method="post">
            <p>User name</p>
            <input type="text" placeholder="Enter username" name="name">
            <p>Email</p>
            <input class="a" type="email" placeholder="Enter Email" name="email">
            <p>Password</p>
            <input type="password" placeholder="••••••••" name="password">
            <button type="submit" name="signUp">
                <input type="submit" value="SIGN UP">
            </button>
            <h4>Already member? <a class="txt2" href="sign_in.php">Sign In</a></h4>
        </form>
    </div>
</body>

</html>