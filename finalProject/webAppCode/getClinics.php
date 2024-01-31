<?php
   $query = "SELECT * FROM vaxclinic";
   $result = $connection->query($query);
   echo '<center>Choose a vaccination site </center></br>';
   echo '<center><select name = "clinic" id = "clinic">';
   while ($row = $result->fetch()) {
		echo '<option value="';
        echo $row["name"];
        echo '">' . $row["name"] . "</option>" . "<br>";
   }
   echo '</select></center>';
?>


