<?php
session_start();
if (isset($_SESSION['user'])) {
    $_SESSION['user'] = null;
    $_SESSION['al'] = null;
    header("refresh:0;url=login.php");
} else { require_once "dbcfg.php";
    $user = $_POST['user'];
    $password = md5($_POST['password']);

//Injection Protection
    $user = stripslashes($user);
    $password = stripslashes($password);
    $user = mysql_real_escape_string($user);
    $password = mysql_real_escape_string($password);

    $query = "SELECT * FROM user WHERE username = '" . $user . "' AND password = '" . $password . "'";
    $result = mysql_query($query);
    $access_level = mysql_result($result, 0, "access_level");

    if ($access_level != "") {
        $_SESSION['user'] = $user;
        $_SESSION['al'] = $access_level;
        header("refresh:0;url=index.php");
    } else {
        ?>
		<html>
			<head>
				<meta HTTP-EQUIV="REFRESH" content="5; url=login.php" />
			</head>
			<body style="font-family:sans-serif">
				<center>
			
					<h3>Username und/oder Passwort falsch!</h3>
					<p>Sie werden in 5 Sekunden weitergeleitet ...</p>
					<p>Klicken Sie <a href="login.php">hier</a> wenn Sie nicht warten wollen.</p>
				</center>
			</body>
        </html>
    <?php
    }
}?>