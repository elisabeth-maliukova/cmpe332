<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Covid Clinic</title>
	<link rel="stylesheet" type="text/css" href="covidSite.css">

</head>
<body>

	

	<?php
	include 'connectdb.php';

	session_start();
	echo '<center><h1> Records </h1>';
    $num = $_POST["ohip"];
	$_SESSION['num']=$_POST["ohip"];
	$query = "SELECT * FROM patient WHERE patient.OHIP = '$num'"; 
	$result = $connection->query($query);
	
    if ($result->fetch() != NULL){
		echo '<form action="gotoRecords2.php" method="post">';
		$query = "SELECT * FROM vaxclinic";
		$result = $connection->query($query);
		echo '<select name = "clinicName" id = "clinicName">';
		while($row = $result->fetch()){
			echo '<option value="';
			echo $row["name"];
			echo '">' . $row["name"] . "</option>" . "<br>";
		}

		echo '<input type="submit" value="Next">';
		echo '</form>';

	}
	else{
		echo "<p>The OHIP number is not yet in out records.  Please fill out the following before recording a vaccination:</p>";
		echo '<form action="record.php" method="post">';
		echo '<p>First Name</p><br>';
		echo '<input type="text" name = "firstName">';
		echo '<p>Last Name</p><br>';
		echo '<input type="text" name = "lastName">';
		echo '<p>Date of Birth</p><br>';
	    echo '<input type="date" id="dob" name="dob"><br>';
		
		echo '<input type="submit" name = "newPatient" value="Add New Patient">';
		
		echo '</form></center>';

	}
	$connection = NULL;

	?>
	<header>
	<h1 class="title">Covid Vaccination Database and Records</h1>

	<nav>  
	<ul>  
	<li>  
	<a href="covid.php"> Home </a>  
	</li>
	<li>  
	<a href="record.php"> Record a Vaccination </a>  
	</li>  
	<li>  
	<a href="offers.php"> Vaccine Types </a>  
	</li>  
	<li>  
	<a href="patients.php"> Patients </a>  
	</li>  
	<li> <a href="workers.php"> Workers </a>  
	</li>  
	</ul>  
	</nav>  
	</header>
	</body>
</html>




