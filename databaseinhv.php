<?php
//Selecteer alles van vrienden
$sql = "SELECT * FROM vrienden ORDER BY achternaam";
//Het verbinding controleren en resultaat query ophalen
$result = $conn->query($sql);

//als het resultaat meer als 0 regels bevat echo dit in een tabel
if ($result->num_rows > 0) {
   echo"<table><tr></th><th><h4>Voornaam</th><th><h4>Achternaam</th><th><h4>Woonplaats</th><th><h4>Beschrijving</th</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><th>".$row["voornaam"]."</th><th> ".$row["achternaam"]."</th><th> ".$row["woonplaats"]."</th><th> ".$row["beschrijving"]."</th></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
//sluit verbinding
$conn->close();
?>