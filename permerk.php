<?php
//Deze pagina gebruik ik om autoś per merk te sorteren 
include_once "forms/header.html";
?>
<hgroup>
 <h2>Auto per merk</h2>
 <h3>Hier ziet u per merk welke vrienden van dit merk eigenaar zijn</h3>

<?php
include("connectDB.php");
?>

<?php
//Selecteer alle kollomen uit tabel auto
$sql = "SELECT * FROM vrienden,koppeltabel,auto WHERE vrienden.vriendnummer=koppeltabel.vriendnummer AND auto.auto_id=koppeltabel.auto_id ORDER BY merk ";


$result = $conn->query($sql);

//als het resultaat meer als 0 regels bevat echo dit in een tabel
if ($result->num_rows > 0) {
   echo"<table><tr><th><h4>ID</th><th><h4>Merk</th><th><h4>Voornaam</th><th><h4>Achternaam</th><th><h4>Foto</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><th>".$row["vriendnummer"]."</th><th>".$row["merk"]."</th><th>".$row["voornaam"]."</th><th> ".$row["achternaam"]."</th><th>";?> <img src=" <?php echo $row["fotopad"];?> " title="<?php echo $row["fotonaam"];?>" height="75" width="75"> <?php echo"</th>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
//sluit verbinding
$conn->close();
?>

<?php
include_once "forms/footer.html";
?>



