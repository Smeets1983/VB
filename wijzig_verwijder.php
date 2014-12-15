
<?php
//Ophalen inhoud van document
include_once "forms/header.html";

?>

<hgroup>
 <h6>Vriend wijzigen of verwijderen</h2>
 <h3>Klik op de knop van uw keuze voor een wijziging/verwijdering</h3>
 
<?php
 //Ophalen verbindingsdata
 include("connectDB.php");
 
 ?>


<?php
	
	//als op knop wijzig wordt gedrukt, word de onderstaande sql statement uitgevoerd, ophalen 
	if ( isset($_POST["vr_wijzig"]) ) {

	
		$id = $_POST["id"];

		$query = "SELECT * FROM vrienden WHERE vriendnummer = '$id' ";
		
		$result = mysqli_query($conn, $query) or die("Query ERROR: " . mysqli_error($conn) );
		$record = mysqli_fetch_array($result);
	

		$id           = $record['vriendnummer'];
		$voornaam     = $record['voornaam'];
		$achternaam   = $record['achternaam'];
		$beschrijving = $record['beschrijving'];
		
?>

<!--vervolgens wordt het formulier weergegeven met daarin de bestaande gegevens-->

		<form action="" method="POST">
<table width="400" border="0" cellspacing="1" cellpadding="2">
			<tr>
			<td width="100">Voornaam</td>
			<td><input required type="text" name="voornaam" value="<?php echo $voornaam ?>" ></td>
			</tr>

			<tr>
			<td width="100">Achternaam</td>
			<td><input required type="text" name="achternaam" value="<?php echo $achternaam ?>" ></td>
			</tr>

			<tr>
			<td width="100">Beschrijving</td>
			<td><textarea required name="beschrijving" rows="10" cols="30"><?php echo $beschrijving ?></textarea></td>
			</tr>

			<input required type="hidden" name="id" value="<?php echo $id ?>" >
			

			<tr>
			<td width="100">Pas aan</td>
			<td><input type="submit" name="pas_aan" value="aanpassen"></td>
			</tr>		
</table>
		</form>
 <?php
 include("forms/ckeditor.php");
 ?> 

<?php

}

     //Als post geset wordt 
	if ( isset($_POST["pas_aan"]) ) {

		$id           = $_POST['id'];
		$voornaam     = $_POST['voornaam'];
		$achternaam   = $_POST['achternaam'];
		$beschrijving = $_POST['beschrijving'];
		

		//Bovenstaande variabelen woren in sql query geset
		$query = "UPDATE vrienden 
					SET voornaam='$voornaam', achternaam='$achternaam', beschrijving='$beschrijving'
					WHERE vriendnummer = '$id' ";
		
		//Controleer verbinding en sql statement
		$result = mysqli_query($conn, $query) or die("Query ERROR: " . mysqli_error($conn) );
	}


?>

<?php

	//Als knop verwijder wordt geset, voer ondertaande variabelen uit nmet als id $vriendnummer
	if ( isset($_POST["vr_verwijder"]) ) {
	
		$vriendnummer = $_POST["id"];

		$query = "DELETE FROM vrienden WHERE vriendnummer = '$vriendnummer' ";
	
		$result = mysqli_query($conn, $query) or die("Query ERROR: " . mysqli_error($conn) );
	}

?>

<table>
	<tr><th>voornaam</th><th>achternaam</th><th>omschrijving</th><th>verwijderen</th><th>aanpassen</th>

<?php
	$query = "SELECT * FROM vrienden ORDER BY achternaam";
	$result = mysqli_query($conn, $query) or die("Query ERROR: " . mysqli_error($conn) );

	//Loop door alle records in de tabel en geef deze weer via de echo
	while ( $record   = mysqli_fetch_array($result) ) {
		echo "<form action='' method='POST'>";
			$vriendnummer  			= $record['vriendnummer'];
			$voornaam     			= $record['voornaam'];
			$achternaam   			= $record['achternaam'];
			$woonplaats 			= $record['woonplaats'];
			$beschrijving         	= $record['beschrijving'];
			echo "<tr>";
			echo "<input type='hidden' name='id' value='$vriendnummer'>";
		
			echo "<td>" . $voornaam . "</td><td>" . $achternaam . "</td><td>" . $beschrijving . "</td>";
			echo "<td><input type='submit' name='vr_verwijder' value='Verwijderen'></td>";
			echo "<td><input type='submit' name='vr_wijzig' value='Wijzigen'></td>";
			echo "</tr>\n";
		echo "</form>";
	}
?>
	</table>


<?php
include_once "forms/footer.html";
?>
