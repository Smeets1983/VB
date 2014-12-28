<?php
	//Inloggegevens welke steeds opnieuw geladen worden in de php pagina's
	$host = "localhost";
	$gebruiker = "root";
	$wachtwoord = "";
	$database = "vriendenboek";

		//Maakt verbinding met bovenstaande inloggegevens 
		$conn = mysqli_connect($host, $gebruiker, $wachtwoord, $database )
		//ALs dit niet gelukt is voer onderstaande code uit 
	or die("verbinding mislukt: ". mysqli_connect_error());
?>
