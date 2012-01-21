<?php
    $user = $_GET['user'];
    $query = "DELETE FROM `qv`.`user` WHERE `user`.`username` = '".$user."'";
    mysql_query($query);
    
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=mitarbeiter">'; 
?>
