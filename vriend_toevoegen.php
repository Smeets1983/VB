<?php
include_once "session.php";
?>
<?php
include_once "forms/header.html";
?>
 <hgroup>
 <h6>Vriend toevoegen</h2>
 <h3>Vul onderstaand formulier compleet in om een vriend toe te voegen</h3>
 </hgroup>

 <?php
//Haak verbindingsdata op
include("connectDB.php");


				//Geldigheidsregels
				if(empty($_POST['fname']))   		{echo"<h6>**Pas als u alle gegevens invoerd worden deze verwerkt**</h2>" ;}
                elseif(empty($_POST['lname'])) 		{echo"<h6>**Pas als u alle gegevens invoerd worden deze verwerkt**</h2>" ;}
                elseif(empty($_POST['wplaats']))    {echo"<h6>**Pas als u alle gegevens invoerd worden deze verwerkt**</h2>" ;}
              
                //Als door bovenstaande regels is gelopen voer onderstaande script uit
				elseif (isset($_POST['submitted'])){

//Maak verbinding en geef onderstaande variabelen mee voor de post, Variabelen worden weer in de insert meegenomen					
include("connectDB.php");
$fname = 		$_POST['fname'];
$lname = 		$_POST['lname'];
$wplaats =		$_POST['wplaats'];
$beschrijving =	$_POST['beschrijving'];
$sqlinsert = "INSERT INTO vrienden (voornaam,achternaam,woonplaats,beschrijving) VALUES('$fname', '$lname','$wplaats','$beschrijving')";

//Controleer verbinding met database en de SQL query
if (!mysqli_query($conn, $sqlinsert)){
die('error inserting new record');
}
else {
header('Location: vriend_toevoegen.php');
}
				
}
//Haal benodigde code op, laat databaseinhoud zien en neem formulier mee 
include("databaseinhv.php");
 include_once "forms/fvt.html";
include_once "forms/footer.html";
?>