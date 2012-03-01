<div id="content">
    <h3>Suche</h3>
    <form name="suche" action="index.php" method="get">
        <input type="hidden" name="page" value="suche" />
        <input type="text" name="key" />    
        <input type="submit" value="Suchen" />
    </form>
    <script language="JavaScript">document.suche.key.focus();</script>
    <?php if (isset($_GET['key'])) { ?>
    <table id="infotable">
        <thead>
            <tr>
                <th width="50">ID</th>
                <th width="140">Mitarbeiter</th>
                <th width="140">Kunde</th>
                <th width="140">Datum</th>
                <th width="80">Dauer (Min)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Termin 'f' = frei
            //Termin 'a' = normaler Auftrag
            
            $query = "SELECT terminid, mitarbeiterid, kundenid, termindatum, termindauer FROM termin WHERE kundenid = '".$_GET['key']."' ORDER BY terminid";
            
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
                    if(!$isSaved) {
                        $isSaved = true;
                        $usrname = $cell;
                    }
                    if($i++ == 3)
                        echo "<td>".date('d.m.Y, H:i', strtotime($cell))."</td>";
                    else
                        echo "<td>$cell</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table> 
    <?php } ?>
</div>