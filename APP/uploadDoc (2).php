<?php

session_start();
if (!isset($_SESSION['login_user']))
    header("Location: index.php");

?>

<!DOCTYPE html>

<head>
	<title>APP Login</title>
	<link rel="stylesheet" href="css/style.css">

</head>


<body>
<div class = "header">
	<img src = "img/logo.jpg">
</div>
<h1>Hey <?php echo $_SESSION["login_user"]; ?></h1>
</body>

<?php
	if($_SESSION['accountType'] == "administrator"){
?>
<a href="registerCustomer.php">Register new customer</a><br>
<a href="TR/index.php">Write Treatment Report</a><br>
<a href="uploadRA.php">Upload Docs</a><br>
<?php 
	} 
	if($_SESSION['accountType'] == "customer"){
?>
<a href="uploadBL.php">View Bait Location</a><br>
<a href="uploadRA.php">View Risk Assessment</a><br>
<?php 
	} 
?>
<a href="cosh.php">Coshh</a><br>
<a href="viewReports.php">View Reports</a><br><br><br>

<form action="logout.php" action="post">
<input type="submit" value="Logout">
</form>


</html>