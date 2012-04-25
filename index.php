<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
    header("refresh:0;url=login.php");
} else {
    $user = $_SESSION['user'];
    $al = $_SESSION['al'];

    if ($_SESSION['al'] < 2 && isset($_POST['user']))
        $_SESSION['subuser'] = $_POST['user'];

    require_once("dbcfg.php");
    $pages = array("kalender", "suche", "stats", "neu", "mitarbeiter", "mneu", "mdel", "medit", "kunden", "tneu");
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "kalender";
    }

    $pageOK = false;
    if (in_array($page, $pages))
        $pageOK = true;

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
                            <a href="index.php" <?php
    if ($page == "kalender")
        echo 'id="current"';
    ?>><img src="css/calendar.png" />Kalender</a>
                            <a href="index.php?page=suche" <?php
                           if ($page == "suche")
                               echo 'id="current"';
    ?>><img src="css/list.png" />Suche</a>
                               <?php
                               if ($_SESSION['al'] == 0 || $_SESSION['al'] == 2)
                                   echo '<a href="#"><img src="css/chart_bar.png" />Statistiken</a>';
                               if ($_SESSION['al'] < 2)
                                   echo '<a href="index.php?page=tneu"><img src="css/date_add.png" />Termin erstellen</a>';
                               if ($_SESSION['al'] == 0) {
                                   echo '<a href="index.php?page=mitarbeiter"';
                                   if ($page == "mitarbeiter")
                                       echo ' id="current"';
                                   echo '><img src="css/group.png" />Mitarbeiter</a>';
                               }
                               ?>
                        </div>
                        <div id="rightnav">
                            <a href="checklogin.php">Logout</a>
                        </div>
                    </div>

                    <?php
                    include("pages/" . $page . ".php");
                    ?>
                    <div id="footer">
                        <?php
                        echo "Angemeldet als: <span class='hl'>" . $_SESSION['user'] . "</span>";
                        if ($_SESSION['al'] < 2) {
                            echo " | Modus: <form style='display:inline' name='newsubuser' method='POST'><select name='user' onchange='document.newsubuser.submit();'>";
                            echo "<script>newsubuser.setAttribute('action', location.href);</script>";
                            $result = mysql_query("SELECT username FROM user ORDER BY username");
                            if (!$result) {
                                die("Query to show fields from table failed");
                            }
                            while ($row = mysql_fetch_array($result)) {
                                $tmp = $row['username'];
                                $option = "<option value='" . $tmp . "'";
                                if ($tmp == $_SESSION['subuser'])
                                    $option.="selected='selected'";
                                $option .= ">" . $tmp;
                                $option .= "</option>";
                                echo $option;
                            }
                            echo "</select></form>";
                        }
                        ?>
                    </div>
                </div>
            </center>
        </body>
    </html>
<?php } ?>