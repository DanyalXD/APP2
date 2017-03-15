<?php

session_start();
if (isset($_SESSION['login_user']))
    header("Location: welcome.php");

?>
<!DOCTYPE html>

<head>
	<title>APP Login</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/errorCheck.js" type="text/javascript"></script>
</head>


<body>
<div class = "header">
	<img src = "img/logo.jpg">
</div>

<form id="login" action="javascript:validateLogin();">
Username:<input type="text" name="username"><br>
Password: <input type="password" name="password">
<p id="warning"></p>
<input type="submit" value="login">
</form>
</body>


</html>