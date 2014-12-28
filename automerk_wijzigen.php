<?php
	include_once "session.php";
	//include header
	include_once "forms/header.html";
?>
	 <hgroup>
		 <h6>Auto wijzigen</h2>
		 <h3>U voert het ID en de overige gegevens in om uw autte wijzigen</h3>
	 </hgroup>
<?php
	//include inlogdata
	include("connectDB.php");
	//include code tbv uploaden foto bij automerk
	include("uploadcode.php");
			
		//Regels controleren of alle velden ingevuld zijn anders laat echo zien
		if(empty($_POST['merk']))   					{echo"<h6>**Pas als u alle gegevens invoert worden deze verwerkt**</h2>" ;}
			elseif(empty($_POST['beschrijving'])) 		{echo"<h6>**Pas als u alle gegevens invoert worden deze verwerkt**</h2>" ;}
			elseif(empty($_POST['fotonaam'])) 			{echo"<h6>**Pas als u alle gegevens invoert worden deze verwerkt**</h2>" ;}
			
			elseif (isset($_POST['submitted'])){
			//Haal verbindingsscript op, en geef variabeken mee wele in het sql statement worden geset						
				$merk = 			$_POST['merk'];
				$beschrijving  =	$_POST['beschrijving'];
				$fotopad =			$padnaam;
				$fotonaam =			$_POST['fotonaam'];
					//Voer query uit en update de regel waarbij id aangeeft welke regel het is
				$query = "UPDATE auto 
					SET merk = '$merk', beschrijving = '$beschrijving', fotonaam = '$fotonaam', fotopad = '$fotopad'
					WHERE auto_id = '$_POST[id]' ";
					if (!mysqli_query ($conn,$query)) {
					die('error inserting new record');
			}	
					else {
				header('Location: automerk_wijzigen.php');
			}
	}			
	
//Include code om pagina verder af te maken en database inhoud te laten zien
	include("databaseinh.php");
	include_once "forms/faw.html";
	include_once "forms/footer.html";
?>

