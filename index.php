<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
    if (isset($_POST['date']))
        $date = strtotime($_POST['date']);
    else
        $date = strtotime("now");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
        <title>Prototyp</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/popup.js"></script>
        <script type="text/javascript" src="js/popup_window.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker-de.js"></script>
        <script>
            $(function() {
                $.datepicker.setDefaults( $.datepicker.regional[ "" ] );
                $( "#datepicker" ).datepicker( $.datepicker.regional[ "de" ] );
                $( "#locale" ).change(function() {
                    $( "#datepicker" ).datepicker( "option",
                    $.datepicker.regional[ $( this ).val() ] );
                });
            });
        </script>
    </head>
    <body>
        <center>
            <div id="container">
                <div id="header"><h2>Terminverwaltung</h2>Logout</div>
                <div id="topnav">
                    <center>
                        <a href="#" id="current"><img src="css/calendar.png" />Kalender</a>
                        <a href="#"><img src="css/list.png" />Terminliste</a>
                        <a href="#"><img src="css/calendar_add.png" />Termin erstellen</a>
                        <a href="#"><img src="css/group.png" />Mitarbeiterverwaltung</a>
                        <a href="#"><img src="css/chart_bar.png" />Statistiken</a>
                    </center>
                </div>
                <div id="nav">
                    <table>
                        <tr>
                            <td style="width:100px;text-align:left;">
                                <form action="index.php" method="POST">
                                    <input name="date" type="text" hidden="yes" value="<?php echo date('d.m.Y', $date - 604800); ?>" />
                                    <input type="image" src="css/prev.png" title="vorherige Woche" alt="submit" />
                                </form>
                            </td>
                            <td style="width:600px;text-align:center;">
                                <form action="index.php" method="POST">
                                    <select name="user">
                                        <option>Heinz</option>
                                        <option>Paul</option>
                                    </select>
                                    <input id="datepicker" type="text" name="date" value="<?php echo date('d.m.Y', strtotime("now")); ?>" />
                                    <input type="submit" value="Los" />
                                </form>
                            </td>
                            <td style="width:100px;text-align:right;">
                                <form action="index.php" method="POST">
                                    <input name="date" type="text" hidden="yes" value="<?php echo date('d.m.Y', $date + 604800); ?>" />
                                    <input type="image" src="css/next.png" title="nächste Woche" alt="submit" />
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="content">
                    <div id="kalcontainer">
                        <ul id="zeit">
                            <li>8:00</li>
                            <li>9:00</li>
                            <li>10:00</li>
                            <li>11:00</li>
                            <li>12:00</li>
                            <li>13:00</li>
                            <li>14:00</li>
                            <li>15:00</li>
                            <li>16:00</li>
                            <li>17:00</li>
                            <li>18:00</li>
                            <li>19:00</li>
                        </ul>
                        <table id="kalender">
                            <tr>
                                <?php
                                /* Jedes Datum der Woche mit
                                 * dem aktuellen Datum errechnen
                                 */
                                $wd = date('w', $date);
                                $darr[$wd] = $date;
                                $tmpdate = $date;
                                for ($i = $wd; $i > 1; $i--) {
                                    $date -= 86400;
                                    $darr[$i - 1] = $date;
                                }
                                $date = $darr[$wd];
                                for ($i = $wd; $i < 6; $i++) {
                                    $date += 86400;
                                    $darr[$i + 1] = $date;
                                }
                                if ($wd != 0) {
                                    $darr[7] = $darr[6] + 86400;
                                }

                                echo "<th>Montag<br/>" . date('d.m.Y', $darr[1]) . "</th>";
                                echo "<th>Dienstag<br/>" . date('d.m.Y', $darr[2]) . "</th>";
                                echo "<th>Mittwoch<br/>" . date('d.m.Y', $darr[3]) . "</th>";
                                echo "<th>Donnerstag<br/>" . date('d.m.Y', $darr[4]) . "</th>";
                                echo "<th>Freitag<br/>" . date('d.m.Y', $darr[5]) . "</th>";
                                echo "<th>Samstag<br/>" . date('d.m.Y', $darr[6]) . "</th>";
                                echo "<th>Sonntag<br/>" . date('d.m.Y', $darr[7]) . "</th>";
                                ?>

                            </tr>
                            <tr>
                                <td>
                                    <div class="event" onmouseover="popup('08:00 - 09:00&lt;br&gt;Max Mustermann&lt;br&gt;Musterstrasse 13&lt;br&gt;8020 Graz')" onmouseout="kill()" style="background-color:#133783;height:40px;">08:00 - 09:00</div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table> 
                    </div>
                </div>
                <div id="footer">
                    <a href="termin.html" onClick="return newPopup(this, 'termin')">popup</a>
                </div>
            </div>
        </center>
    </body>
</html>
