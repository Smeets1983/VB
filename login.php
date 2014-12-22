
<?php
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
 </article> 

<div class="container">
	<form action="" method="post">
		
			<label>email-adres</label>
			<div>
				<input type="text" name="naam" value="" /> 
			</div>
			<div>
				<label>wachtwoord</label>
			<div>	
				<input type="password" name="wachtwoord" value="" /> 
			</div>	
			<input type="submit" value="inloggen" />
				<a href="registreer.php">Aanmelden als nieuwe gebruiker</a>
			</div>	

</form>

<?php

include("connectDB.php");


$naam="";
if (isset($_POST['naam']) ) {
        $naam=$_POST['naam'];

$wachtwoord="";
if (isset($_POST['wachtwoord']) ) {
        $wachtwoord= md5($_POST['wachtwoord']); 

$sql = "SELECT * FROM gebruikers WHERE naam='$naam' AND wachtwoord='$wachtwoord'";

		$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );
		$aantal=mysqli_num_rows( $result );
		

		echo $aantal;

		if($aantal >=1)	{

			echo "gelukt";

			$_SESSION['naam'] = $naam;
			$_SESSION['ingelogd'] = 1;

header("Location: index.php");
exit();


		}
		
}
}

?>

<?php
//haal footer op
include_once "forms/footer.html";
?>