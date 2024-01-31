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
	

	<?php
		session_start();
		echo '<center><h1> Records </h1>';
		$clinic = $_SESSION['clinic'];
		$ohip =  $_SESSION['num'];
		$lotNum	= $_POST["lotNum"];
		$vaxDate = $_POST["vaxDate"];
		$query = 'INSERT INTO vaccination values("' . $ohip . '","' . $clinic . '","' . $lotNum . '","' . $vaxDate . '")';
	    $numRows = $connection->exec($query);
	    echo "The vaccination was added!";
		echo "<br>";
		echo "Summary of the patients vaccinations:";
	    $query2 = "SELECT * FROM patient INNER JOIN vaccination ON patient.OHIP = vaccination.patientOHIP INNER JOIN vaccine ON vaccination.vaccineLot = vaccine.lot WHERE patient.OHIP = '$ohip'";
	    $result2 = $connection->query($query2);
		echo "<table>";
		echo "<tr><td>First Name"."</td><td>Last Name"."</td><td>OHIP"."</td><td>Date"."</td><td>Vaccine Type"."</td></tr>";
	    while ($row = $result2->fetch()) {
			echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["OHIP"]."</td><td>".$row["date"]."</td><td>".$row["producedBy"]."</td></tr>";
	    }
		echo "</table></center>";
		$query2 = "SELECT * FROM vaccine WHERE lot = '$lotNum'";
		$result2 = $connection->query($query2);
		$row2 = $result2->fetch();
		$newDoses = $row2['doses'] - 1;
		$query3 = "UPDATE vaccine SET doses = '$newDoses' WHERE lot = '$lotNum'";
		$numRows = $connection->exec($query3);

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