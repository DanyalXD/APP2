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
<a href="uploadTR.php">Upload Treatment Report</a><br>
<a href="TR/index.php">Write Treatment Report</a><br>
<a href="uploadBL.php">Upload Bait Location</a><br>
<a href="uploadRA.php">Upload Risk Assessment</a><br>
<?php 
	} 
	$conn = mysqli_connect("mysql4.gear.host", "app2", "Td2F5SV?46_U", "app2");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
    $cnt = $_SESSION['contract'];
	$sql = "SELECT * FROM risk WHERE contractNo = '$cnt'";
	$sql1 = "SELECT * FROM bait WHERE contractNo = '$cnt'";
	$result = $conn->query($sql);
	$result1 = $conn->query($sql1);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

if($_SESSION['accountType'] == "customer"){
	echo "<a href='".$row["risk"]."'>View Risk Assessment</a><br>";
	echo "<a href='".$row["bait"]."'>View Bait Location</a><br>";
	} 
?>
<a href="cosh.php">Coshh</a><br>
<a href="viewReports.php">View Reports</a><br><br><br>

<form action="logout.php" action="post">
<input type="submit" value="Logout">
</form>


</html>