<?php
echo "voorform";
?>

 <div class="container">
	<form action="" method="post">
		
			<label>Voornaam</label>
			<div>	
			<input name="fname" type="text" id="fname">
			</div>

			<label>email-adres</label>
			<div>
				<input name= "email"type="text" id="email" value="" /> 
			</div>

			<div>
				<label>wachtwoord</label>
			<div>	
				<input name="wachtwoord"type="password" id="wachtwoord" value="" /> 
			</div>	
			<input name= "submitted" type="submit" value="registreer" />
			</div>	
</form>



<?php
  
include("connectDB.php");

print_r($_POST);  

               //Als door bovenstaande regels is gelopen voer onderstaande script uit
if (isset($_POST['submitted'])){
    if ($_POST['fname'] == "") { 
        $error = "Naam is niet ingevuld"; 
    } 
    if ($_POST['email'] == "") { 
        $error .= "email is niet ingevuld"; 
    } 
    if ($_POST['wachtwoord'] == "") { 
        $error .= "wachtwoord is niet ingevuld"; 
    } 
echo "kkk";

	if (!isset($error) && isset($_POST['submitted'])) {
		include("connectDB.php");
		$fname      =  ($_POST['fname']); 
		$email = 		($_POST['email']); 
		$wachtwoord =	($_POST['wachtwoord']); 
		$wachtwoordmd5 = md5 ($wachtwoord);


		$sqlinsert = "INSERT INTO gebruikers (naam,email,wachtwoord) VALUES('$fname', '$email','$wachtwoordmd5')";
		$query = mysql_query($sqlinsert);

		if (!mysqli_query($conn, $sqlinsert)){
			die('error inserting new record');
		}

	    echo 'Je gegevens zijn succesvol in de database geplaatst'; 

	}

	if(isset($error)) {                            ######## anders doet hij dit ######## 
		echo "Gelieve alle formuliervelden netjes in te vullen !<BR /><BR />"; 
		echo "<FONT COLOR=\"#FF0000\">".$error."</FONT>"; 
	} 
		
}


include_once "forms/footer.html";
?>


