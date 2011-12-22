<?php

	$dbhost = "localhost";
	$dbname = "qv";
	$dbuser = "root";
	$dbpass = "";
        
        $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
        mysql_select_db($dbname);
?>
