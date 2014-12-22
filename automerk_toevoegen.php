<?php
include_once "session.php";
?>



<?php
include_once "forms/header.html";
?>
<hgroup>
 <h2>Auto toevoegen</h2>
 <h3>Vul onderstaande gegevens in om een auto toe te voegen</h3>
 <?php


//Verbindingsdata en code tbv het uploaden worden opgehaald
include("connectDB.php");
include("uploadcode.php");


					//Restricties invoervelden
					if(empty($_POST['merk']))   			{echo"<h6>**Pas als u alle gegevens invoerd worden deze verwerkt**</h6>" ;}
                elseif(empty($_POST['beschrijving'])) 		{echo"<h6>**Pas als u alle gegevens invoerd worden deze verwerkt**</h6>" ;}
                elseif(empty($_POST['fotonaam']))    		{echo"<h6>**Pas als u alle gegevens invoerd worden deze verwerkt**</h6>" ;}
              
				//als  men door bovenstaande beperkingen is gekomen wordt onderstaande uitgevoerd
				elseif (isset($_POST['submitted'])){
include("connectDB.php");

$merk = 			$_POST['merk'];
$beschrijving = 	$_POST['beschrijving'];
$fotonaam =			$_POST['fotonaam'];
$fotopad =			$padnaam;	
$sqlinsert = "INSERT INTO auto (merk,beschrijving,fotopad,fotonaam) VALUES('$merk', '$beschrijving','$fotopad','$fotonaam')";

//Controleer of verbinding goed is en de sql statement
if (!mysqli_query($conn, $sqlinsert)){
die('error inserting new record');
}
else {
header('Location: automerk_toevoegen.php');
}
				
}

//Include benodigde code voor einde pagina en formulier
include("databaseinh.php");			
include_once "forms/fat.html";
include_once "forms/footer.html";
?>


