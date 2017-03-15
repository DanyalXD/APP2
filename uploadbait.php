<?php
$valid_file = true;
if($_FILES['fileToUpload']['name'])
{
	//if no errors...
	if(!$_FILES['fileToUpload']['error'])
	{
		//now is the time to modify the future file name and validate the file
		if($_FILES['fileToUpload']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			echo 'Oops!  Your file\'s size is to large.';
		}
		
		//if the file has passed the test
		if($valid_file )
		{
			$fileLocaton = "Bait Locations/";
			//move it to where we want it to be
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $fileLocaton.$_FILES['fileToUpload']['name']);

			$conn = mysqli_connect("localhost", "root", "", "app");

			$report = $fileLocaton.$_FILES['fileToUpload']['name'];
			$contractNo = $_POST['contractNumber'];
			$date = date("d/m/Y");

			$r = "reports";
			$c = "contractNo";
			$re = "report";
			$d= "date";

			$sql = "INSERT INTO $r ($c, $re, $d)
			VALUES ('$contractNo', '$report', '$date')";

			if ($conn->multi_query($sql) === TRUE) {	
    			header('location: uploadTR.php');
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
			}			
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload']['error'];
	}
}

?>