



<table><th><h4>foto</th><th><h4>merk</th><th><h4>Voornaam</th><th><h4>achternaam</th><th><h4>beschrijving</th>


<?php
include("connectDB.php");
//Haal header op
include_once "forms/header.html";


$sql = "SELECT * FROM vrienden,koppeltabel WHERE koppeltabel.vriendnummer=vrienden.vriendnummer";


		$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );

	// show table with all records
		while ( $record = mysqli_fetch_array($result) ) {
			// read values of "Koppeltabel" record
			

			
			$voornaam = $record["voornaam"];
	
			
			$beschrijving = $record["beschrijving"];
	

			
			echo "<tr></td><td>".$record["voornaam"]."</td><td>". $record["achternaam"]."</td><td>".$record["beschrijving"]."</td><td>".$record["beschrijving"];
		
}




?>


</table>

