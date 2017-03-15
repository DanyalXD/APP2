<?php

session_start();

$conn = mysqli_connect("mysql4.gear.host", "app2", "Td2F5SV?46_U", "app2");

var_dump($_POST);

$user = $_POST["user"];
$contract = $_POST["conNo"];
$password = hash('sha512', $_POST["pass"]);
$account = "customer";

$query = "SELECT * FROM users WHERE username='$user' OR contractNo='$contract'";
$res = mysqli_query($conn,$query);

if($res->num_rows){
	return 0;
}
else{
	$sql = "INSERT INTO users (username, contractNo, password, accountType)
	VALUES ('$user', '$contract', '$password' , '$account')";

	if ($conn->multi_query($sql) === TRUE) {
	    echo "New records created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


?>