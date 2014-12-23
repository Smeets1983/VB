<?php
	session_start(); 
	include_once "forms/header.html";

?>
<hgroup>
 <h2>Registreer als nieuwe gebruiker</h2>
 <h3>Vul uw gegevens in en registreer als nieuwe gebruiker.</h3>

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
			
			<label>wachtwoord</label>
				<div>	
					<input name="wachtwoord"type="password" id="wachtwoord" value="" /> 
				</div>	
			
				<div>
					<input name= "submitted" type="submit" value="registreer" />
				</div>	
 <div>
  <?php
  // show captcha HTML using Securimage::getCaptchaHtml()
  require_once 'securimage/securimage.php';
  $options = array();
  $options['input_name'] = 'captcha_code'; // change name of input element for form post
  $options['input_text'] = "Type de beveilingscode";
  $options['show_audio_button'] = false;
  
  echo Securimage::getCaptchaHtml($options);
 ?>
 </div>

</form>


<?php 
	include("connectDB.php");


include_once $_SERVER['DOCUMENT_ROOT'] . '/vriendenboek/securimage/securimage.php';

$securimage = new Securimage();

	
         
	if (isset($_POST['submitted'])){
	    if ($_POST['fname'] == "") { 
	        $error = "Naam is niet ingevuld <br>"; 
	    } 
	    if ($_POST['email'] == "") { 
	        $error .= "email is niet ingevuld <br>"; 
	    } 
	    if ($_POST['wachtwoord'] == "") { 
	        $error .= "wachtwoord is niet ingevuld <br>"; 
	    } 

	
		if ($securimage->check($_POST['captcha_code']) == false) {

  		echo "The security code entered was incorrect.<br /><br />";
  		echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
exit;
print_r($_POST);

		}
	//echo "testcode";

		if (!isset($error) && isset($_POST['submitted'])) {
			include("connectDB.php");
			$fname      =  @($_POST['fname']); 
			$email = 		@($_POST['email']); 
			$wachtwoord =	@($_POST['wachtwoord']); 
			$wachtwoordmd5 = md5 ($wachtwoord);


			$sqlinsert = "INSERT INTO gebruikers (naam,email,wachtwoord) VALUES('$fname', '$email','$wachtwoordmd5')";
			$query = mysql_query($sqlinsert);

			if (!mysqli_query($conn, $sqlinsert)){
				die('error inserting new record');
			}

		    echo 'Je gegevens zijn succesvol in de database geplaatst'; 

		}


		if(isset($error)) {                            
			echo "Gelieve alle formuliervelden netjes in te vullen !<BR /><BR />"; 
			echo "<FONT COLOR=\"#FF0000\">".$error."</FONT>"; 
		} 

}

		if (isset($_POST['submitted'])){

			$tTime = date('r');
			$tMessage = "Een nieuwe gebruiker heeft zich geregistreerd met de volgende gegevens:<br />"
			 . "<em>Naam: $fname</em><br />"
			 . "<em>Email: $email</em><br />"
			 . "<em>IP Address:</em> {$_SERVER['REMOTE_ADDR']}<br />"
			 . "<em>Tijd:</em> $tTime<br />"
			 . "<em>Browser:</em> {$_SERVER['HTTP_USER_AGENT']}<br />";
			$tMessage = wordwrap($tMessage, 70);

			mSendMail("Nieuwe registratie", $tMessage, "chriskevandesmiske@gmail.com", "Webmaster");
		                
		 }
		                        

			function mSendMail($iSubject, $iMessage, $iEmailAddress, $iName) { 
	        // include the library
	        require 'PHPMailer-master/PHPMailerAutoload.php';

	        // instantiate a PHPMailer object
	        $mail = new PHPMailer();

	        // set up the object to use SMTP and 
	        // configure it to point to proper server
	        $mail->isSMTP();
	        $mail->SMTPAuth = true;
	        $mail->SMTPSecure = 'ssl';
	        $mail->Host = "smtp.gmail.com";
	        $mail->Port = 465;
	        $mail->Username = "project.bis.irs@gmail.com";
	        $mail->Password = "projectirs";

	        // set the properties to the email to sent
	        $mail->SetFrom("project.bis.irs@gmail.com", "Projectirs");
	        $mail->Subject = $iSubject;
	        $mail->msgHTML($iMessage);
	        $mail->addAddress("chriskevandesmiske@gmail.com", "Beheerder"); 
	  

	       //controle op errors
	        if ($mail->send()) {
	    header('Location: index.php');
		}
	      			
	}

	include_once "forms/footer.html";
?>












