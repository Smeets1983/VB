
<table><th><h4>Voornaam</th><th><h4>Achternaam</th>

<?php
include("connectDB.php");
//Haal header op
include_once "forms/header.html";


$sql = "SELECT * FROM vrienden,koppeltabel WHERE koppeltabel.vriendnummer=vrienden.vriendnummer GROUP BY voornaam";


		$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );

	// show table with all records
		while ( $record = mysqli_fetch_array($result) ) {
			// read values of "Koppeltabel" record
			
			
			$voornaam = $record["voornaam"];
			$achternaam = $record["achternaam"];



$sql = "SELECT * FROM auto,koppeltabel WHERE auto.auto_id=koppeltabel.auto_id";


		$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );

	// show table with all records
		while ( $record = mysqli_fetch_array($result) ) {
			// read values of "Koppeltabel" record



		
			$auto_id = $record["auto_id"];
			$fotopad = $record["fotopad"];
			$fotonaam = $record["fotonaam"];
			$merk = $record["merk"];

			
			echo "<form action='toonauto.php' method='POST' target='_blank'>";
			echo "<tr>";
			echo "<td>".$record["voornaam"]."</td><td>". $record["achternaam"]."</td>";



			echo "<td><input type='hidden' name='toonfoto' value='$auto_id'></td>";
			echo "<td><input type='image' name='toonfoto' src='$fotopad' alt='Submit' style='height:75px' title='$fotonaam'/></td><td>";
			

		




			echo "</form>";	

}

}


?>


</table>

<!--

			// show table entry
			echo "<form action='' method='POST'>";
				echo "<tr>";
				echo "<input type='hidden' name='id' value='$id'>";
				echo "<td>$id</td>";
				echo "<td><input type='submit' name='CMS_DELETE' value='Verwijderen'></td>";
				echo "<td>$naamMuziekinstrument</td><td><img src='$fotoMuziekinstrument' alt='$foto' title='$naamMuziekinstrument'></td>";
				echo "<td><img src='$fotoVriend' alt='$foto' title='$naamVriend'></td>";
				echo "</tr>";
			echo "</form>";
		}
		echo "</table>";

		include 'SQLdisconnect.php'; // sluit database