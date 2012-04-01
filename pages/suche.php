<div id="content">
    <h3>Suche</h3>
    <form name="suche" action="index.php" method="get">
        <input type="hidden" name="page" value="suche" />
        <input type="text" name="key" />    
        <input type="submit" value="Suchen" />
    </form>
    <script language="JavaScript">document.suche.key.focus();</script>
    <?php if (isset($_GET['key']) && $_GET['key'] != "") { ?>
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
            $user = $_SESSION['user'];
            $key = mysql_real_escape_string(stripslashes($_GET['key']));
            $user = mysql_real_escape_string(stripslashes($_SESSION['user']));
            
            $result = mysql_query("SELECT username FROM user ORDER BY username");
            if (!$result) {
                die("Query to show fields from table failed");
            }
            
            while ($row = mysql_fetch_row($result)) {
                echo "<option";
                
                echo "</option>";
            }
            ?>
        </tbody>
    </table> 
    <?php }  ?>
</div>