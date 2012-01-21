<?php
if (isset($_POST['vorname'])) {
//Injection Protection
    $username = mysql_real_escape_string(stripslashes($_POST['username']));
    $vorname = mysql_real_escape_string(stripslashes($_POST['vorname']));
    $nachname = mysql_real_escape_string(stripslashes($_POST['nachname']));
    $berechtigung = mysql_real_escape_string(stripslashes($_POST['berechtigung']));
    
    $query = "UPDATE `user` SET `vorname` = '" . $vorname . "', `nachname` =  '" . $nachname . "', `access_level` =  '" . $berechtigung . "'";
    $passwort = $_POST['passwort'];
    if ($passwort != "") {
        $query = $query . ", `password` =  '".md5(mysql_real_escape_string(stripslashes($passwort)))."'";
    }
    $query = $query . "WHERE  `user`.`username` =  '" . $username . "'";

    mysql_query($query);
    
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=mitarbeiter">'; 
} else {
    $username = $_GET['user'];
    $result = mysql_query("SELECT vorname, nachname, access_level FROM user WHERE `username` LIKE '" . $username . "'");
    if (!$result) {
        die("Query to show fields from table failed");
    }
    $row = mysql_fetch_row($result);
    ?>
    <div id="content">
        <h3>Mitarbeiter bearbeiten</h3>
        <form name="medit" action="index.php?page=medit" method="POST">
            <input type="hidden" name="username" value="<?php echo $username; ?>" />
            <table>
                <tbody>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $username; ?></td>
                    </tr>
                    <tr>
                        <td>Vorname:</td>
                        <td><input type="text" name="vorname" value="<?php echo $row[0]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Nachname:</td>
                        <td><input type="text" name="nachname" value="<?php echo $row[1]; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Passwort:</td>
                        <td><input type="text" name="passwort" /></td>
                    </tr>
                    <tr>
                        <td>Berechtigung:</td>
                        <td>
                            <select name="berechtigung">
                                <option value="2" <?php if ($row[2] == 2)
        echo 'selected="selected"'; ?>>MitarbeiterIn</option>
                                <option value="1"<?php if ($row[2] == 1)
        echo 'selected="selected"'; ?>>TelefonistIn</option>
                                <option value="0"<?php if ($row[2] == 0)
        echo 'selected="selected"'; ?>>Administrator</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Bearbeiten" /></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <script language="JavaScript">document.mneu.username.focus();</script>
    </div>
<?php } ?>