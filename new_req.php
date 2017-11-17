<?php
	$name=$_POST["name"];
	$email=$_POST["email"];
	$blood=$_POST["blood"];
	$quant=$_POST["quant"];
	$phone=$_POST["phone"];

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
	$sql = "INSERT INTO reciever (Name,Email,Bgroup,Quantity,Phone) VALUES ('$name','$email','$blood','$quant',$phone)";
	$sql .= ";";
	if ($conn->query($sql) === TRUE) {
   		echo "<h3>New record created successfully</h3><br><br>";
   		header("Location:success.html");
	} else {
   		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
?>