<?php
   $query = "SELECT * FROM company";
   $result = $connection->query($query);
   echo 'Choose a vaccine type </br>';
   echo '<select name = "vaxx" id = "vaxx">';
   while ($row = $result->fetch()) {
		echo '<option value="';
        echo $row["name"];
        echo '">' . $row["name"] . "</option>" . "<br>";
   }
   echo '</select>';
?>