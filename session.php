<?php
session_start();
if  ( !isset ($_SESSION['ingelogd'] )   )
      header("Location: login.php");
?>