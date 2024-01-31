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
		echo '<form action="insert.php" method="post">';
		$clinic = $_POST["clinicName"];
		echo "<p>Below are the lot numbers available at $clinic.  Please choose the corresponding lot number and date the patient recieved their vaccination.</p>";
		echo '</select><br>';
		$query2 = "SELECT * FROM shipsto WHERE clinic = '$clinic'";
		$result2 = $connection->query($query2);
		echo '<select name = "lotNum" id = "lotNum">';
		while($row2 = $result2->fetch()){
			echo '<option value="';
			echo $row2["lotNumber"];
			echo '">' . $row2["lotNumber"] . "</option>" . "<br>";
		}
		echo '</select>';
		echo '<br>';
	    echo '<input type="date" id="vaxDate" name="vaxDate" value="2022-04-08">';
		echo '<input type="submit" value="Next"></center>';
		$_SESSION['clinic']=$_POST["clinicName"];
		
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