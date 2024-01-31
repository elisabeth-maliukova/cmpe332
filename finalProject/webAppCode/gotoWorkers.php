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
	<center><table>
	<?php
	try {
		echo "<tr><td>First Name"."</td><td>Last Name"."</td><td>Credentials"."</td></tr>";
	   $whichClinic= $_POST["clinic"];
	   echo "<h1> Here are the workers from $whichClinic: </h1>";
	   $query = "SELECT doctor.firstName, doctor.lastName, doctor.ID, drworksat.clinicName, drcredentials.Cred FROM doctor INNER JOIN drworksat ON doctor.ID = drworksat.ID INNER JOIN drcredentials ON doctor.ID = drcredentials.ID WHERE drworksat.clinicName = '$whichClinic' UNION (SELECT  nurse.firstName, nurse.lastName, nurse.ID, nurseworksat.clinicName, nursecredentials.Cred FROM nurse INNER JOIN nurseworksat ON nurse.ID = nurseworksat.ID INNER JOIN nursecredentials ON nurse.ID = nursecredentials.ID WHERE nurseworksat.clinicName = '$whichClinic')";
	   $result = $connection->query($query);
	   while ($row = $result->fetch()) {
			echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["Cred"]."</td></tr>";
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