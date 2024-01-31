<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Record a Vaccination</title>
	<link rel="stylesheet" type="text/css" href="covidSite.css">

</head>
<body>


<?php
	include 'connectdb.php';

	session_start();
	echo '<h1><center>Record a Vaccination</center></h1>';
	echo '<form action="gotoRecords.php" method="post">';
	echo '<p><center>Enter OHIP number:</center></p>';
	if (isset($_POST['newPatient'])) {
		$ohip =  $_SESSION['num'];
		$fN = $_POST['firstName'];
		$lN	= $_POST["lastName"];
		$dob = $_POST["dob"];
		$query = 'INSERT INTO patient values("' . $ohip . '","' . $fN . '","' . $lN . '","' . $dob . '")';
		$numRows = $connection->exec($query);
		echo "<center><p><b>Patient with OHIP number $ohip has been added, please proceed with vaccination record:</b> </p></center>";
	} 

	echo '<center><input type="text" name = "ohip", maxlength="10"></center><br>';
	echo '<center><input type="submit" value="Check Records"></center>';
	echo '</form>';  
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