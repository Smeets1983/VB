



<?php
//Include header
include_once "forms/header.html";
?>

<!--Wordt weergegeven op het scherm-->
 <hgroup>
 <h2>Actuele lijst met automerken</h2>
 <h3>Hier ziet u een lijst van uw atuele automerken</h3>
 </hgroup>


 <?php
//Haal verbindingsgegevens op
include("connectDB.php");

//Laat databaseinhoud zien
include("databaseinh.php");

//Include footer zien
include_once "forms/footer.html";
?>