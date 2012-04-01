<div id="nav">
    <table>
        <tr>
            <td style="width:100px;text-align:left;">
                <form action="index.php" method="POST">
                    <input name="date" type="hidden" value="<?php echo date('d.m.Y', $date - 604800); ?>" />
                    <input type="image" src="css/prev.png" title="vorherige Woche" alt="submit" />
                </form>
            </td>
            <td style="width:600px;text-align:center;">
                <form action="index.php" method="POST">
                    <input id="datepicker" type="text" name="date" value="<?php echo date('d.m.Y', strtotime("now")); ?>" />
                    <input type="submit" value="Los" />
                </form>
            </td>
            <td style="width:100px;text-align:right;">
                <form action="index.php" method="POST">
                    <input name="date" type="hidden" value="<?php echo date('d.m.Y', $date + 604800); ?>" />
                    <input type="image" src="css/next.png" title="nächste Woche" alt="submit" />
                </form>
            </td>
        </tr>
    </table>
</div>
<div id="content">
    <div id="kalcontainer">
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
                $wd = date('w', $date); //Holt numeric value des Wochentags (0-6)
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

                $mitarbeiterid = "zola";
                $query = "SELECT terminid, kundenid, termindauer FROM termin WHERE mitarbeiterid = '" . $mitarbeiterid . "' AND termindatum BETWEEN '" . $darr[1] . "' AND '" . ($darr[7] + 86400) . "' ORDER BY termindatum";

                $result = mysql_query($query);
                if (!$result) {
                    die("Query to show fields from table failed");
                }

                while ($row = mysql_fetch_row($result)) {
                    echo "<tr>";
                    $isSaved = false;
                    $i = 0;
                    $tmp = null;
                    foreach ($row as $cell) {
                        if (!$isSaved) {
                            $isSaved = true;
                            $usrname = $cell;
                        }
                        if ($i++ == 3)
                            echo "<td>" . date('d.m.Y, H:i', strtotime($cell)) . "</td>";
                        else
                            echo "<td>$cell</td>";
                    }
                    echo "</tr>";
                }
                ?>

            </tr>
            <tr>
                <td>
                    <div class="event" onmouseover="popup('Max Mustermann&lt;br&gt;Musterstrasse 13&lt;br&gt;8020 Graz')" onmouseout="kill()" style="margin-top:80px;background-color:#133783;height:40px;">10:00 - 11:00</div>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><div class="event" style="background-color:darkred;height:480px;">08:00 - 20:00</div></td>
            </tr>
        </table> 
    </div>
</div>
