<div id="content">
    <h3>Mitarbeiter</h3>
    <table id="infotable">
        <thead>
            <tr>
                <th width="80">Username</th>
                <th width="60">Vorname</th>
                <th width="60">Nachname</th>
                <th width="90">Berechtigung</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $access_arr = array('Administrator', 'TelefonistIn', "MitarbeiterIn");
            
            $result = mysql_query("SELECT username, vorname, nachname, access_level FROM user ORDER BY username");
            if (!$result) {
                die("Query to show fields from table failed");
            }
            
            while ($row = mysql_fetch_row($result)) {
                echo "<tr>";
                $isSaved = false;
                foreach ($row as $cell) {
                    if(!$isSaved) {
                        $isSaved = true;
                        $usrname = $cell;
                    }
                    if(is_numeric($cell))
                        echo"<td>".$access_arr[$cell]."</td>";
                    else
                        echo "<td>$cell</td>";
                }
                echo "<td><a href='index.php?page=medit&user=".$usrname."'><img title='bearbeiten' src='css/pencil.png'/></a> ";
                echo "<a href='index.php?page=mdel&user=".$usrname."'><img title='löschen' src='css/delete.png'/></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php?page=mneu" class="greenbutton"><img style="margin-top: 20px;margin-bottom:-2px;" src="css/add.png" /> Neuer Mitarbeiter</a>
</div>