 
<?php

 $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'vriendenboek';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());

?>