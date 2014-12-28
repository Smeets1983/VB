<?php
//Haal header op
include_once "forms/header.html";

 //Ophalen verbindingsdata
 include("connectDB.php");
 
		if ( isset($_POST["toonfoto"]) ) {

			$auto_id = $_POST["toonfoto"];

			$sql  = "SELECT * FROM auto WHERE auto_id= '$auto_id' ";
			
			$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );
			$record = mysqli_fetch_array($result);
			
			$merk 		= $record["merk"];
			$fotopad 	= $record["fotopad"];
			$fotonaam 	= $record["fotonaam"];
			
			echo "<h1>Auto met mouseover</h1>";
			echo "<img src='$fotopad' alt='$fotonaam' style='height:300px' title='$fotonaam'>";
			echo "<p>$merk</p>";
		
		}

//haal footer op
include_once "forms/footer.html";
?>












