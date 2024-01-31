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
?>
	<center><h1> Vaccination Status </h1>
	<table class="tableLine">
	<?php
	try {
	   $whichPatient= $_POST["patient"];
	   echo "<tr><td>"."First Name"."</td><td>"."Last Name"."</td><td>"."OHIP"."</td><td>"."Date"."</td><td>"."Type"."</td></tr>";

	   $query = "SELECT * FROM patient INNER JOIN vaccination ON patient.OHIP = vaccination.patientOHIP INNER JOIN vaccine ON vaccination.vaccineLot = vaccine.lot WHERE patient.OHIP = '$whichPatient'";
	   $result = $connection->query($query);
	   while ($row = $result->fetch()) {
			echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["OHIP"]."</td><td>".$row["date"]."</td><td>".$row["producedBy"]."</td></tr>";
	   }

	}
	catch(PDOException $e) {
    print "Error!: ". $e->getMessage(). "<br/>";
    die();
	}	
	?>
	<?php
	$connection = NULL;
	?>
	</table></center>
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