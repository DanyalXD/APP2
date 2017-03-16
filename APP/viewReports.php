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

<?php
$conn = mysqli_connect("localhost", "root", "", "app");
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
    	echo "<td><a href='".$row["report"]."'><img border='0' alt='W3Schools' src='img/pdf-icon.png' width='45' height='45'</a></td>";
    	echo "<td>".$row["date"]."</td>";
    	echo "</tr>";
    }
   }
 	$conn->close();
?>

</table>


</html>