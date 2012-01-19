<?php
if (isset($_POST[username])) {
    
//Injection Protection
    $username = mysql_real_escape_string(stripslashes($_POST['username']));
    $vorname = mysql_real_escape_string(stripslashes($_POST['vorname']));
    $nachname = mysql_real_escape_string(stripslashes($_POST['nachname']));
    $passwort = md5(mysql_real_escape_string(stripslashes($_POST['passwort'])));
    $berechtigung = mysql_real_escape_string(stripslashes($_POST['berechtigung']));

    $query = "INSERT INTO  `qv`.`user` (`username` ,`vorname` ,`nachname` ,`password` ,`access_level`)VALUES ('".$username."',  '".$vorname."',  '".$nachname."',  '".$passwort."',  '".$berechtigung."')";
    mysql_query($query);
    
    header("refresh:0;url=index.php?page=mitarbeiter");
} else {
?>
<div id="content">
    <h3>Mitarbeiter Hinzufügen</h3>
    <form name="mneu" action="index.php?page=mneu" method="POST">
        <table>
            <tbody>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <td>Vorname:</td>
                    <td><input type="text" name="vorname" /></td>
                </tr>
                <tr>
                    <td>Nachname:</td>
                    <td><input type="text" name="nachname" /></td>
                </tr>
                <tr>
                    <td>Passwort:</td>
                    <td><input type="text" name="passwort" /></td>
                </tr>
                <tr>
                    <td>Berechtigung:</td>
                    <td>
                        <select name="berechtigung">
                            <option value="2">MitarbeiterIn</option>
                            <option value="1">TelefonistIn</option>
                            <option value="0">Administrator</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Eintragen" /></td>
                </tr>
            </tbody>
        </table>
    </form>
    <script language="JavaScript">document.mneu.username.focus();</script>
</div>
<?php } ?>