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
	<center><h1> Vaccine's Available </h1>
	<table>
	<?php
	try {
	   $whichVaxx= $_POST["vaxx"];
	   echo "<tr><td>"."Site Name"."</td><td>"."Doses Available"."</td></tr>";

	   $query = "SELECT SUM(doses), producedBy, clinic FROM vaccine INNER JOIN shipsto ON vaccine.lot = shipsto.lotNumber WHERE producedBy = '$whichVaxx' GROUP BY producedBy, clinic";
	   $result = $connection->query($query);
	   while ($row = $result->fetch()) {
			echo "<tr><td>".$row["clinic"]."</td><td>".$row["SUM(doses)"]."</td></tr>";
	   }
		$connection = NULL;

	}
	
	catch(PDOException $e) {
    print "Error!: ". $e->getMessage(). "<br/>";
    die();
	}	

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