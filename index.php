<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
    header("refresh:0;url=login.php");
} else {
    $user = $_SESSION['user'];
    $al = $_SESSION['al'];

    require_once("dbcfg.php");

    $page = $_GET['page'];
    $pages = array("kalender", "suche", "stats", "neu", "mitarbeiter", "mneu", "mdel", "medit");

    $pageOK = false;
    if (in_array($page, $pages))
        $pageOK = true;
    if (!isset($page))
        $page = "kalender";
    else if (!$pageOK)
        $page = "404";

    date_default_timezone_set('Europe/Vienna');
    if (isset($_POST['date']))
        $date = strtotime($_POST['date']);
    else
        $date = strtotime("now");
    ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="stylesheet" href="css/styles.css" type="text/css" />
            <link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" />
            <title>quellvital</title>
            <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        </head>
        <body>
            <center>
                <div id="container">
                    <div id="header"><h2>Terminverwaltung</h2></div>
                    <div id="topnav">
                        <div id="leftnav">
                            <a href="index.php" <?php if($page=="kalender") echo 'id="current"'; ?>><img src="css/calendar.png" />Kalender</a>
                            <a href="index.php?page=suche" <?php if($page=="suche") echo 'id="current"'; ?>><img src="css/list.png" />Suche</a>
                            <a href="#"><img src="css/chart_bar.png" />Statistiken</a>
                            <a href="#"><img src="css/date_add.png" />Termin erstellen</a>
                            <a href="index.php?page=mitarbeiter" <?php if($page=="mitarbeiter") echo 'id="current"'; ?>><img src="css/group.png" />Mitarbeiter</a>
                        </div>
                        <div id="rightnav">
                            <a href="checklogin.php">Logout</a>
                        </div>
                    </div>

                    <?php
                    include("pages/" . $page . ".php");
                    ?>

                    <div id="footer">
                        <a href="termin.html" onClick="return newPopup(this, 'termin')">popup</a>
                    </div>
                </div>
            </center>
        </body>
    </html>
<?php } ?>