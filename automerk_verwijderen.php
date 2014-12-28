<?php
	include_once "session.php";
	//Ophalen inhoud van document
	include_once "forms/header.html";
?>

	<hgroup>
		 <h6>Auto verwijderen</h2>
		 <h3>Vul ID in om auto te verwijderen</h3>
<?php
	 	//Ophalen verbindingsdata
	  	include("connectDB.php");
			//Als dit veld leeg is, wordt echo weergegeven
	    	if(empty($_POST['id']))   	{echo"<h6>**Pas als u alle gegevens invoerd worden deze verwerkt**</h2>" ;}
				//Als er waarde zijn ingvoerd worden deze doorgegeven	
			  
			    elseif (isset($_POST['submitted'])){
				//Input voor $vriendnummer is input $_POST id, waarde uit invoerveld wordt overgenomen
				$vriendnummer = $_POST['id'];
		
					//SQL query uitvoeren waarbij het id gebruikt wordt om aan te geven welke regel verwijderd wordt
					$query = "DELETE FROM auto
					WHERE auto_id = '$_POST[id]' ";
					//Controleer verbindingsdata en uit te voeren query
					if (!mysqli_query ($conn,$query)) {
							die('error Deleting record');
				}
	
					else {
					header('Location: automerk_verwijderen.php');
				}
		}	

	include("databaseinh.php");
	 //Include formulier met knoppen voor deze pagina
	include_once "forms/fav.html";
	//Include footer 
	include_once "forms/footer.html";
?>
