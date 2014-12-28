	<table><th><h4>Voornaam</th><th><h4>Achternaam</th><th><h4>Auto</th>
<?php
		include("connectDB.php");
		//Haal header op
		include_once "forms/header.html";

			$sql = "SELECT * FROM koppeltabel,vrienden WHERE koppeltabel.vriendnummer=vrienden.vriendnummer GROUP BY voornaam";
			$ssql = "SELECT * FROM auto,koppeltabel WHERE auto.auto_id=koppeltabel.auto_id";
			$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );

				// Loopt door alle record van de eerste sql statement
				while ( $record = mysqli_fetch_array($result) ) {
					
					$vriendnummer 	= $record["vriendnummer"];
					$voornaam 		= $record["voornaam"];
					$achternaam 	= $record["achternaam"];
			
		echo "<tr></td><td>".$record["voornaam"]."</td><td>". $record["achternaam"]."</td>";
			$sresult = mysqli_query($conn, $ssql) or die("Query ERROR: " . mysqli_error($conn) );
		echo"<td>";

				//Loop door alle records van de tweede sql query
				while ( $record = mysqli_fetch_array($sresult) ) {
				//Als vriendnummer gelijk is aan vriendnummer uit koppeltabel, maak form aan met die items
				if ($vriendnummer==$record["vriendnummer"]){	

		echo "<form action='toonauto.php' method='POST' target='_blank'>";
		
					$auto_id 		= $record["auto_id"];
					$fotopad 		= $record["fotopad"];
					$fotonaam 		= $record["fotonaam"];
					$merk 			= $record["merk"];

		echo "<input type='hidden' name='toonfoto' value='$auto_id'>";
		echo "<input type='image' name='toonfoto' src='$fotopad' alt='Submit' style='height:75px; width:100px' title='$fotonaam'/>";
		echo "</form>";	
		}
		}
		echo"</td>";
	}

?>


</table>

