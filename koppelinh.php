
<table><th><h4>Voornaam</th><th><h4>Achternaam</th>

<?php
include("connectDB.php");
//Haal header op
include_once "forms/header.html";


$sql = "SELECT * FROM vrienden,koppeltabel WHERE koppeltabel.vriendnummer=vrienden.vriendnummer ";


		$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );


		while ( $record = mysqli_fetch_array($result) ) {
			
			$vriendnummer = $record["vriendnummer"];			
			$voornaam = $record["voornaam"];
			$achternaam = $record["achternaam"];




$sql = "SELECT * FROM auto,koppeltabel WHERE auto.auto_id=koppeltabel.auto_id";


		$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );


		while ( $record = mysqli_fetch_array($result) ) {
		

			$auto_id = $record["auto_id"];
			$fotopad = $record["fotopad"];
			$fotonaam = $record["fotonaam"];
			$merk = $record["merk"];

			
			
			echo "<tr>";
			echo "<td>".$record["voornaam"]."</td><td>". $record["achternaam"]."</td>";
		


			echo "<form action='toonauto.php' method='POST' target='_blank'>";
			echo "<td><input type='hidden' name='toonfoto' value='$auto_id'></td>";
			echo "<td><input type='image' name='toonfoto' src='$fotopad' alt='Submit' style='height:75px' title='$fotonaam'/><td>";
			
			echo "</tr>";

			echo "</form>";	


}
}


?>


</table>
<!--

			// show table entry
			if ($idVriend != $oldIdVriend) {
				echo "<tr>";
					echo "<td>$id</td>";
					echo "<td><form action='' method='POST'>";
						echo "<input type='hidden' name='id' value='$id'>";
						echo "<input type='submit' name='CMS_DELETE' value='Verwijderen'>";
					echo "</form></td>";
					echo "<td>$naamVriend</td><td>$achternaam</td>";
					echo "<td><form action='wk4_ex12_show_vriend.php' method='POST' target='_blank'>";
						echo "<input type='hidden' name='id' value='$idVriend'>";
						echo "<input type='image' name='CMS_VRIEND' src='$fotoVriend' alt='Submit' style='height:100px' title='$naamVriend'>";
					echo "</form></td>";
					echo "<td>";
					echo "<form action='wk4_ex12_show_instrument.php' method='POST' target='_blank' style='float:left'>";
						echo "<input type='hidden' name='id' value='$idMuziekinstrument'>";
						echo "<input type='image' name='CMS_INSTRUMENT' src='$fotoMuziekinstrument' alt='Submit' style='height:100px' title='$naamMuziekinstrument'>";
					echo "</form>";
			}
			else {
					echo "<form action='wk4_ex12_show_instrument.php' method='POST' target='_blank' style='float:left; margin-left:5px;'>";
						echo "<input type='hidden' name='id' value='$idMuziekinstrument'>";
						echo "<input type='image' name='CMS_INSTRUMENT' src='$fotoMuziekinstrument' alt='Submit' style='height:100px' title='$naamMuziekinstrument'>";
					echo "</form>";
			}
			$oldIdVriend = $idVriend;
		}
		echo "</table>";

