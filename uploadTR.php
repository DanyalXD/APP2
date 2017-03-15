<?php

session_start();
if (!isset($_SESSION['login_user']))
    header("Location: index.php");

?>
<!DOCTYPE html>
<html>
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

<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
    
    Select report to upload: <input type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf"><br>
	<?php
		$conn = mysqli_connect("mysql4.gear.host", "app2", "Td2F5SV?46_U", "app2");
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT contractNo FROM users";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    	
		echo '<select name="contractNumber">';

    	while($row = $result->fetch_assoc()) {
    		echo '<option value="'.$row['contractNo'].'">'.$row['contractNo'].'</option>';
    	}
   	}
 	$conn->close();
	?>
	<input type="hidden" name ="fl" value="Reports/">
	<input type="hidden" name ="db" value="reports">
	<input type="hidden" name ="ft" value="report">
	<input type="hidden" name ="rd" value="location: uploadTR.php">
    <input type="submit" value="Upload Report" name="submit">
</form>

</body>
</html>