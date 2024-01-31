<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Workers</title>
	<link rel="stylesheet" type="text/css" href="covidSite.css">

</head>
<body>
<?php
include 'connectdb.php';
?>
	<center><h1>View Workers</h1></center>
	<form action="gotoWorkers.php" method="post">
	<?php
		include 'getClinics.php';
	?>
	<center><input type="submit" value="Find Healthcare Professionals"></center>
<?php
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