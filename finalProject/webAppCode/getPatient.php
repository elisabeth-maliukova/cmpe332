<?php
   $query = "SELECT * FROM patient";
   $result = $connection->query($query);
   echo 'Choose a patient </br>';
   echo '<select name = "patient" id = "patient">';
   while ($row = $result->fetch()) {
		echo '<option value="';
        echo $row["OHIP"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "</option>" . "<br>";
   }
   echo '</select>';
?>