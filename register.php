<?php
	$name=$_POST["rname"];
	$uname=$_POST["runame"];
	$rpsw=$_POST["rpsw"];
	$rphno=$_POST["rphoneno"];

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
	$sql = "INSERT INTO users VALUES ('$name','$uname','$rpsw','$rphno')";
	$sql .= ";";
	if ($conn->query($sql) === TRUE) {
   		echo "<h3>New record created successfully</h3><br><br>";
   		header("Location:index.html");
	} else {
   		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
?>