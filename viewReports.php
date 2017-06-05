<?php

session_start();
if (!isset($_SESSION['login_user']))
    header("Location: index.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anderson Pest Prevention</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,700|Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/errorCheck.js" type="text/javascript"></script>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="welcome.php">APP</a></h1>
			</div>
			<div id="menu">
				<ul>
				<?php
					if($_SESSION['accountType'] == "administrator"){
				?>
					<li><a href="TR/index.php" accesskey="2" title="">Write TR</a></li>
					<li><a href="uploadDoc.php" accesskey="2" title="">Upload Doc</a></li>
				<?php 
					} 
					$conn = mysqli_connect("mysql4.gear.host", "appdbv3", "Da3hm-9X-U75", "appdbv3");
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
					echo "<li><a href='".$row["risk"]."' accesskey='3'>View RA</a><br></li>";
					echo "<li><a href='".$row1["bait"]."' accesskey='3'>View BL</a><br></li>";
					} 
				?>
				<li><a href="viewCosh.php" accesskey="3" title="">View Coshh</a></li>
				<li><a href="viewReports.php" accesskey="3" title="">View TR</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="page" class="container">
		<div id="content">
			<div id="box1">
				<h2 class="title"><a href="#">Treatment Reports</a></h2><br><br>
					<?php
				$conn = mysqli_connect("mysql4.gear.host", "app2", "Dm9WQ2V4~-TG", "app2");
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}
				if($_SESSION['accountType'] == "administrator"){
				    $sql = "SELECT * FROM reports";
				}
				else{
				    $cnt = $_SESSION['contract'];
				    $sql = "SELECT * FROM reports WHERE contractNo = '$cnt'";
				}
				$result = $conn->query($sql);
				?>
				<table style="width:100%">
				<?php
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	echo "<tr>";
				    	echo "<td>".$row["contractNo"]."</td>";
				    	echo "<td><a href='".$row["report"]."'><img border='0' alt='W3Schools' src='images/pdf-icon.png' width='45' height='45'</a></td>";
				    	echo "<td>".$row["date"]."</td>";
				    	echo "</tr>";
				    }
				   }
				 	$conn->close();
				?>

				</table>
			</div>
			<div>
			</div>
		</div>
		<div id="sidebar">
			<ul class="style3">
			<li class="first">
			<?php
				if($_SESSION['accountType'] == "administrator"){
			?>
			<h2>Register</h2>
				<form id="registerForm" action="javascript:registerCustomer();">
					Username: <input type="text" name="user" id="user">
					Contract No: <input type="text" name="conNo" id="conNo">
					Password: <input type="password" name="pass" id="pass">
					Password: <input type="password" name="pass2" id="pass2"><br>
					<p id="error"></p>
					<input type="submit" value="register">
				</form>
			<?php
				}
				else{
			?>
				<form action="logout.php" action="post">
					<input type="submit" value="Logout">
				</form>
			 <?php } ?>
				</li>
				<li>
				<?php
				if($_SESSION['accountType'] == "administrator"){
				?>
				<form action="logout.php" action="post">
					<input type="submit" value="Logout">
				</form>
			<?php
				}
				else{
			?>
				<p class="date">Welcome</p>
				<p><a href="#">Welcome to your Anderson Pest Prevention customer account here you will be able to see all your reports!</a></p>
			<?php } ?>
				</li>
				<li>
					<p class="date">16-03-2017</p>
					<p><a href="#">This site is still under construction so if you find any bugs please email danyal1995@hotmail.co.uk</a></p>
				</li>
			</ul>
		</div>
	</div>
	<div id="footer">
		<p>Copyright (c) 2017 Anderson Pest Prevention</a>.</p>
	</div>
</div>
</body>
</html>
