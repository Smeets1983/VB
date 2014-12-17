
<div class="container">
	<form action="" method="post">
		
			<label>Voornaam</label>
			<div>	
			<input name="fname" type="text" id="fname">
			</div>

			<label>email-adres</label>
			<div>
				<input type="text" id="email" value="" /> 
			</div>

			<div>
				<label>wachtwoord</label>
			<div>	
				<input type="password" id="wachtwoord" value="" /> 
			</div>	
			<input type="submit" value="registreer" />
			</div>	
</form>

<?php
  //Haak verbindingsdata op
include("connectDB.php");


			
                //Als door bovenstaande regels is gelopen voer onderstaande script uit
				if (isset($_POST['submitted']))

//Maak verbinding en geef onderstaande variabelen mee voor de post, Variabelen worden weer in de insert meegenomen					
include("connectDB.php");
$fname = 		$_POST['fname'];

$sqlinsert = "INSERT INTO gebruikers (naam) VALUES('$fname')";

//Controleer verbinding met database en de SQL query
if (!mysqli_query($conn, $sqlinsert))
die('error inserting new record');

?>