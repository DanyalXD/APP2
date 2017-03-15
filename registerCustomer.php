<?php

session_start();
if (!isset($_SESSION['login_user']))
    header("Location: index.php");

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
<form id="registerForm" action="javascript:registerCustomer();">
Username: <input type="text" name="user" id="user">
Contract No: <input type="text" name="conNo" id="conNo">
Password: <input type="password" name="pass" id="pass">
Password: <input type="password" name="pass2" id="pass2"><br>
<p id="error"></p>
<input type="submit" value="register">
</form>


</html>