<?php
	include_once "session.php";
	include_once "session.php";
	include_once "forms/header.html";
?>
<hgroup>
	 <h2>Gekoppelde vrienden</h2>
	 <h3>Hier ziet u vrienden die zijn gekoppeld aan een of meerdere automerken.</h3>
</hgroup> 

<?php
	include("connectDB.php");
		//Als de knop maak koppeling wordt ingedrukt
		if (isset($_POST['maak_koppeling'])){
		   $vriendnummer =	$_POST['vriend'];
		   $auto_id = 		$_POST['auto'];
		   //Insert data welke binnenkomt met post in de koppeltabel
		   $sqlinsert = "INSERT INTO koppeltabel (vriendnummer,auto_id) VALUES('$vriendnummer', '$auto_id')";
		 //Controleer verbinding en query
		if (!mysqli_query($conn, $sqlinsert)){
		die('error inserting new record');
		}
		else {
		header('Location: automerk_koppelen.php');
		}
	}

?>

<?php
		//Als de knop verwijder wordt ingedrukt 
		if ( isset($_POST["vr_verwijder"]) ) {	
		$koppel_id = $_POST["id"];
		//Delete record uit de tabel weke het ID meekrijgt van de koppeling
		$query = "DELETE FROM koppeltabel WHERE koppel_id = '$koppel_id' ";
		//Conroleer verbeinging en query
		$result = mysqli_query($conn, $query) or die("Query ERROR: " . mysqli_error($conn) );
		}	

?>
	
			<table>
			<tr><th>voornaam</th><th>achternaam</th><th>Merk</th><th>verwijderen</th>

<?php
		
		$sql = "SELECT DISTINCT * FROM vrienden,koppeltabel,auto WHERE vrienden.vriendnummer=koppeltabel.vriendnummer AND auto.auto_id=koppeltabel.auto_id  ORDER BY achternaam";

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

		 include("connectdrdwn.php"); 
 
			echo "<form action='' method='POST'>";
	        	$query="SELECT voornaam, vriendnummer FROM vrienden";
		    	$result=mysql_query($query) or die ("Query to get data from firsttable failed: ".mysql_error());
			echo "<p>Kies uw vriend:  ";
	
			echo "<select name='vriend'>";
				while ($row=mysql_fetch_array($result)) {
				$voornaam=$row["voornaam"];
				$vriendnummer=$row["vriendnummer"];
			echo "<option value='$vriendnummer'>$voornaam</option>";        
			}
            echo "</select>";
			echo "</p>";    
				
            	$query="SELECT merk, auto_id FROM auto";
            	$result=mysql_query($query) or die ("Query to get data from firsttable failed: ".mysql_error());
	
			echo "<p>Kies uw auto:  ";
			echo "<select name='auto'>";	
        		while ($row=mysql_fetch_array($result)) {
				$merk=$row["merk"];
				$auto_id=$row["auto_id"];
			echo "<option value='$auto_id'>$merk</option>";							
			}
            echo "</select>";
			echo "</p>";
          		
			echo "<input type='submit' name='maak_koppeling' value='Maak koppeling'>"; 	
	        echo "</form>";
		//Laat databaseinhoud zien
		include_once "koppelinh.php";
		//Include footer zien
		include_once "forms/footer.html";
?>


		
		
		
		






