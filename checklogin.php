<html>
	<head>
		<?php 
			require_once("dbcfg.php");
			$user = $_POST['user'];
			$password = md5($_POST['password']);

			//connect to the db
			$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
			mysql_select_db($dbname);
			//------------------

			$query = "SELECT * FROM user WHERE username = '$user' AND password = '$password'";
			$result = mysql_query($query);
			$row = mysql_fetch_assoc($result);
			
			//echo '<meta http-equiv="REFRESH" content="0;url=index.php">';
		?>
	</head>
	<body></body>
</html>
