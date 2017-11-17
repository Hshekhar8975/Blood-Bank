<?php
	$name=$_POST["dname"];
	$age=$_POST["dage"];
	$blood=$_POST["dblood"];
	$sex=$_POST["dsex"];
	$email=$_POST["demail"];
	$phone=$_POST["dphone"];
	$address=$_POST["daddress"];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbase = "blood_bank";

	$conn = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn , $dbase);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connection successfull.<br/>";
	//Inserting the values
	$sql = "INSERT INTO donor (D_name,D_age,D_sex,D_bloodgroup,D_Date,D_email,D_phnno,D_Address) VALUES ('$name','$age','$sex','$blood',CURDATE(),'$email',$phone,'$address')";
	$sql .= ";";
	if ($conn->query($sql) === TRUE) {
   		echo "<h3>New record created successfully</h3><br><br>";
   		header("Location:success.html");
	} else {
   		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
?>