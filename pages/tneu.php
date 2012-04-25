<?php
if (isset($_POST['kunde'])) {
    $_SESSION['testing'] = 'asdf';
//Injection Protection
    $kundenID = mysql_real_escape_string(stripslashes($_POST['kunde']));
    $terminart = mysql_real_escape_string(stripslashes($_POST['terminart']));
    $terminstart = mysql_real_escape_string(stripslashes($_POST['terminstart']));
    $termindatum = md5(mysql_real_escape_string(stripslashes($_POST['termindatum'])));
    $termindauer = mysql_real_escape_string(stripslashes($_POST['termindauer']));
    $quelle = mysql_real_escape_string(stripslashes($_POST['quelle']));
    $bemerkung = mysql_real_escape_string(stripslashes($_POST['bemerkung']));


    $query = "INSERT INTO  `qv`.`termin` (`username` ,`kundenID` ,`terminart`,`termindatum`,`termindauer` , `quelle`,`bemerkung`)
								  VALUES ('" . $_SESSION['user'] . "','" . $kundenID . "','" . $terminart . "', 
								  '" . $termindatum . "','" . $termindauer . "',  '" . $quelle . "',  '" . $bemerkung . "')";
    mysql_query($query);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=kalender">';
} else {
    ?>
    <div id="content">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

        <h3>Termin erstellen</h3>
        <form name="tneu" action="index.php?page=tneu" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td>Kunde:</td>
                        <td><input type="text" name="kunde" /></td>
                    </tr>
                    <tr>
                        <td>Terminart:</td>
                        <td>
                            <select name="terminart">
                                <option value="E">Erster Kontakt</option>
                                <option value="G">Geschäftsverhandlung</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Datum:</td>
                        <td><input id="datepicker" type="text" name="termindatum" value="<?php echo date('d.m.Y', strtotime("now")); ?>" /></td>
                    </tr>
                    <tr>
                        <td>Uhrzeit (HH:MM):</td>
                        <td><input type="text" name="terminstart" /></td>
                    </tr>
                    <tr>
                        <td>Dauer (Min):</td>
                        <td><input type="text" name="termindauer" /></td>
                    </tr>
                    <tr>
                        <td>Quelle:</td>
                        <td>
                            <select name="quelle">
                                <option value="2">Weiterempfehlung</option>
                                <option value="1">Werbung</option>
                                <option value="0">Direkter Kontakt</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Bemerkung:</td>
                        <td><textarea type="text" name="bemerkung"></textarea></td>
                    </tr>

                    <tr>
                        <td><input type="submit" value="Hinzufügen" /></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <script language="JavaScript">document.mneu.kunde.focus();</script>
    </div>
<?php } ?>