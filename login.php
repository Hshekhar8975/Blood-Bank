<?php
	$uname=$_POST["uname"];
	$psw=$_POST["psw"];

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

	$sql = "SELECT Username,password from users where Username = '$uname' and password = '$psw';";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if($row['Username']==$uname && $row['password']==$psw){
		echo "User Found.";
		header("Location:donor.html");
	}
	else{
		echo "User not found.";
		header("Location:index.html");
	}
	mysqli_close($conn);
?>