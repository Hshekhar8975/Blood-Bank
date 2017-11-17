<!DOCTYPE html>
<html>
<head>
	<title>LifeSaver 2.0</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container" style="margin-bottom: 10px;">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" class="navbar-brand">LifeSaver 2.0</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="lg_home.html">Home</a></li>					
					<li><a href="donor.html">Donor</a></li>
					<li><a href="request.html">Request</a></li>
					<li><a href="about1.html">About us</a></li>
				</ul>
				<div class="nav navbar-nav navbar-right" style="margin-right: 1px;">
          			<ul class="nav navbar-nav">
            			<li style="margin-right: 5px;">
              				<div class="dropdown">
	                			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="caret"></span></button>
                				<ul class="dropdown-menu">
                  					<li><a href="history.php">History</a></li>
                  					<li><a href="#">My Request</a></li>
                				</ul>
              				</div>
            			</li>
            			<li>
              				<button class="btn btn-success navbar-btn" onclick="document.getElementById('id01').style.display='block'">Log Out</button>
            			</li>
          			</ul>
				</div>
			</div>			
		</nav>
	</div>
	<div class="text-center container">
		<h3>Blood donated history:</h3>
		<center>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbase = "blood_bank";

					$conn = mysqli_connect($servername, $username, $password);
					mysqli_select_db($conn , $dbase);
					
					if (!$conn) {
		    			die("Connection failed: " . mysqli_connect_error());
					}
					

					$sql = "SELECT D_name,D_bloodgroup,D_Date from donor";
					$sql .= ";";
					$result = mysqli_query($conn, $sql);
					
					$numrows=mysqli_num_rows($result);
					if ($numrows > 0) {
						echo "<table border=2>
							<tr>
							<th>Name</th>	
							<th>Blood Group</th>
							<th>Date</th>
							</tr>";	
	    				while($row = mysqli_fetch_assoc($result)) {
	    					$name=$row['D_name'];
	    					$bg=$row['D_bloodgroup'];
	    					$date=$row['D_Date'];
	        				echo "<tr>
	        						<th>$name</th>
	        						<th>$bg</th>
	        						<th>$date</th>
	        					  </tr>";
	    				}
	    				echo "</table>";
					} else {
	   					echo "0 results";
					}

					mysqli_close($conn);
				?>	
			
		</center>
	</div>
	<div class="container">
		<footer class="nav navbar-default navbar-fixed-bottom">
			<center>
				<p>Copyright &copy; Himanshu Shekhar, Deepak Tiwari and Harsh Jain.</p>
			</center>
		</footer>
	</div><div id="id01" class="modal">  
  		<form class="modal-content animate" action="index.html">
    		<div class="imgcontainer">
      			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      			<img src="pic.png" alt="Avatar" class="avatar">
    		</div>

    		<div class="container" style="width: 100%;">
      			<button>Log Out</button>
    		</div>

		    
  		</form>
	</div>
	<script>
		// Get the modal
		var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
    		if (event.target == modal) {
        		modal.style.display = "none";
    		}
		}
	</script>
</body>
</html>