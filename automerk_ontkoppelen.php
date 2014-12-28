<?php
include_once "forms/header.html";
include("connectDB.php");

	//Als knop post wordt gezet wordt onderstaande sql statement uitgevoer met als WHERE id
	if ( isset($_POST["vr_verwijder"]) ) {
		$koppel_id = $_POST["id"];

		$query = "DELETE FROM koppeltabel WHERE koppel_id = '$koppel_id' ";
		//Verbinding en SQL statement worden gecontroleerd
		$result = mysqli_query($conn, $query) or die("Query ERROR: " . mysqli_error($conn) );
	}
?>
	
	<table>
	<tr><th>voornaam</th><th>achternaam</th><th>Merk</th><th>verwijderen</th>

<?php
//Voer sql statement op en loop door kolommen in de tabel, geef deze weer via onderstaande echo	
		$sql = "SELECT * FROM vrienden,koppeltabel,auto WHERE vrienden.vriendnummer=koppeltabel.vriendnummer AND auto.auto_id=koppeltabel.auto_id  ORDER BY achternaam";

		$result = $conn->query($sql);

			while ( $record   = mysqli_fetch_array($result) ) {
		echo "<form action='' method='POST'>";
				$voornaam		= $record['voornaam'];
				$achternaam		= $record['achternaam'];
				$merk			= $record['merk'];
				$koppel_id		= $record['koppel_id'];

		echo "<tr>";
		echo "<input type='hidden' name='id' value='$koppel_id'>";
	
		echo "<td>" . $voornaam . "</td><td>" . $achternaam . "</td><td>" . $merk . "</td>";
		echo "<td><input type='submit' name='vr_verwijder' value='Ontkoppel auto/vriend'></td>";
	
		echo "</tr>\n";
		echo "</form>";
	}
?>
	</table>

	
<?php		
	include_once "koppelinh.php";
	include_once "forms/footer.html";
?>







