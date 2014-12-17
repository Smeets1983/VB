<?php

session_start()

?>

<form action="" method="post">
<label> naam </label>
<input type="text" name="naam" value="..." /> 
<input type="password" name="wachtwoord" value="..." /> 
<input type="submit" value="inloggen" />
</form>

<?php

include("connectDB.php");
   print_r($_POST); 
  //  echo "<p>naam: $_POST['naam']</p>";


$naam="";
if (isset($_POST['naam']) ) {
        $naam=$_POST['naam'];

$wachtwoord="";
if (isset($_POST['wachtwoord']) ) {
        $wachtwoord=$_POST['wachtwoord']; 

$sql = "SELECT * FROM gebruikers WHERE naam='$naam' AND wachtwoord='$wachtwoord'";


		$result = mysqli_query($conn, $sql) or die("Query ERROR: " . mysqli_error($conn) );

		$aantal=mysqli_num_rows( $result );

		echo $aantal;

		if($aantal==1)	{

			echo "gelukt";

			$_SESSION['naam'] = $naam;
			$_SESSION['ingelogd'] = 1;

header("Location: index.php");
exit();


		}
		




}
}






    ?>