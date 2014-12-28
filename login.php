<?php
//Start sessie voor onthouden gebrksnaam en password
session_start()
?>
<?php
	//Haal header op
	include_once "forms/header.html";
?>
		 <hgroup>
			 <h2>Login pagina</h2>
			 <h3>Gebruik uw inloggegevens om in te loggen</h3>
		 </hgroup>
			 <p>Als u bent ingelogd kunt u vrienden en auto's toevoegen, aanpassen en verwijderen</p>

	<div class="container">
		<form action="" method="post">
		
			<label>naam</label>
				<div>
					<input type="text" name="naam" value="" /> 
				</div>

			<label>wachtwoord</label>
				<div>	
					<input type="password" name="wachtwoord" value="" /> 
				</div>	
				
				<div>
					<input type="submit" value="inloggen" />
					<a href="registreer.php">Aanmelden als nieuwe gebruiker</a>
				</div>	
	</form>

<?php
	include("connectDB.php");

		//Controleer of de naam in de post aanwezig is
		$naam="";
		if (isset($_POST['naam']) ) {
		        $naam=$_POST['naam'];
		//Controleer of het wachtwoord in de post aanwezig is, Wordt MD5 versleuteld
		$wachtwoord="";
		if (isset($_POST['wachtwoord']) ) {
		        $wachtwoord= md5($_POST['wachtwoord']); 
		        //Selecteer records uit de DB welke naam en wachtwoord bevatten	
				$sql = "SELECT * FROM gebruikers WHERE naam='$naam' AND wachtwoord='$wachtwoord'";

					//Controleer resultaat verbdinging en query
					$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );
					//Te het aantal regels welke de naam en het wachtwoord bevatten
					$aantal=mysqli_num_rows( $result );
				//echo laat aantal gevonden regels zien	
				echo $aantal;
				//Als het aantal regels 1 of meer is start sessie en log in
				if($aantal >=1)	{
				echo "gelukt";

					$_SESSION['naam'] = $naam;
					$_SESSION['ingelogd'] = 1;
					//print_r($naam);  

				echo "gelukt";

				header("Location: index.php");
				exit();

			}
		
		}
}

//haal footer op
include_once "forms/footer.html";
?>