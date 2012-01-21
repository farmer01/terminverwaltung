<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
    header("refresh:0;url=index.php");
} else {
    ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="stylesheet" href="css/login.css" type="text/css" />
            <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
            <title>QV Login</title>
        </head>
        <body>
            <div id="container">

                <?php
                $u_agent = $_SERVER['HTTP_USER_AGENT'];
                if (preg_match('/MSIE 8./i', $u_agent) || preg_match('/MSIE 7./i', $u_agent) || preg_match('/MSIE 6./i', $u_agent)) {
                    ?>
                    <p>
                        <b>Ihr Browser wird nicht unterstützt!</b>
                        Bitte laden und installieren Sie einen standardkonformen Browser, um dieses Produkt effektiv nutzen zu können:
                        <br />
                        <br /><a href='http://www.mozilla.org/firefox'>Mozilla Firefox</a>
                        <br /><a href='http://www.google.com/chrome'>Google Chrome</a>
                        <br /><a href='http://www.opera.com/'>Opera</a>
                    </p>
                <?php } ?>

                <h3>Terminverwaltung - Login</h3>
                <form name="login" method="POST" action="checklogin.php">
                    <table>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="user" value=""/></td>
                        </tr>
                        <tr>
                            <td>Passwort:</td>
                            <td><input type="password" name="password" value="" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Login" /></td>
                        </tr>
                    </table>		
                </form>
                <script language="JavaScript">document.login.user.focus();</script>
            </div>
        </body>
    </html>
<?php } ?>