



<table><th><h4>foto</th><th><h4>merk</th><th><h4>Voornaam</th><th><h4>achternaam</th><th><h4>beschrijving</th>


<?php
include("connectDB.php");
//Haal header op
include_once "forms/header.html";


$sql = "SELECT * FROM vrienden,koppeltabel,auto WHERE vrienden.vriendnummer=koppeltabel.vriendnummer AND auto.auto_id=koppeltabel.auto_id";


		$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );

	// show table with all records
		while ( $record = mysqli_fetch_array($result) ) {
			// read values of "Koppeltabel" record
			
echo "<form action='toonauto.php' method='POST' target='_blank'>";
			$auto_id = $record["auto_id"];
			$voornaam = $record["voornaam"];
			$fotopad = $record["fotopad"];
			$fotonaam = $record["fotonaam"];
			$beschrijving = $record["beschrijving"];
			$merk = $record["merk"];

			echo "<input type='hidden' name='toonfoto' value='$auto_id'>";
			echo "<tr><td><input type='image' name='toonfoto' src='$fotopad' alt='Submit' style='height:75px' title='$fotonaam'/></td><td>".$record["merk"]."</td><td>". $record["auto_id"]."</td><td>".$record["achternaam"]."</td><td>".$record["beschrijving"];
			echo "$auto_id";

			echo "</form>";	
}




?>


</table>

