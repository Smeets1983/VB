<?php
	//Selecteer alle kollomen uit tabel auto
	$sql = "SELECT * FROM auto ORDER BY merk";
	//Resultaat ophalen uit verbinding en query
	$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		//Als het result meer als 0 regels bevat maak tabel
	   echo"<table>
			<tr>
				<th><h4>ID
				<th><h4>Merk
				<th><h4>Beschrijving
				</th>
				<th><h4>Foto</th>
			</tr>";
		//Loop door regels in de database en neem resultaat
	    while($row = $result->fetch_assoc()) {
		//Laat resultaat zien met onderstaande regels
		echo "<tr>
   				<th>".$row["auto_id"]."</th>
				<th>".$row["merk"]."</th>
				<th>".$row["beschrijving"]."</th>
				<th>";?> <img src=" <?php echo $row["fotopad"];?> " title="<?php echo $row["fotonaam"];?>" height="75" width="75"> <?php echo"</th>
			 </tr>";
		}
    	   	echo "</table>";
		} 

		else {
		    echo "0 results";
		}

?>