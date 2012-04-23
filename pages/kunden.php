<div id="content">
    <?php
    $query = "INSERT INTO `qv`.`kunde` (`anrede`, `titel`, `vorname`, `nachname`, `strasse`, `ort`, `plz`, `mobil`, `festnetz`, `beruf`, `bemerkung`) VALUES ('anrede', 'titel', 'vorname', 'nachname', 'Strasse', 'Ort', 'PLZ', 'mobil', 'festnetz', 'beruf', 'bemerkung')";
    ?>
    <h3>Kunde hinzufügen</h3>
    <form name="kneu" action="index.php?page=kunden" method="POST">
        <table>
            <tbody>
                <tr>
                    <td>Anrede:</td>
                    <td><select name="anrede"><option>Herr</option><option>Frau</option></select></td>
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
                    <td>Straße:</td>
                    <td><input type="text" name="strasse" /></td>
                </tr>
                <tr>
                    <td>Ort:</td>
                    <td><input type="text" name="ort" /></td>
                </tr>
                <tr>
                    <td>PLZ:</td>
                    <td><input type="text" name="plz" /></td>
                </tr>
                <tr>
                    <td>Mobil:</td>
                    <td><input type="text" name="mobil" /></td>
                </tr>
                <tr>
                    <td>Festnetz:</td>
                    <td><input type="text" name="festnetz" /></td>
                </tr>
                <tr>
                    <td>Beruf:</td>
                    <td><input type="text" name="beruf" /></td>
                </tr>
                <tr>
                    <td>Bemerkung:</td>
                    <td><input type="text" name="bemerkung" /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Hinzufügen" /></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>