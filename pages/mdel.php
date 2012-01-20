<?php
    $user = $_GET['user'];
    $query = "DELETE FROM `qv`.`user` WHERE `user`.`username` = '".$user."'";
    mysql_query($query);
    
    echo "<p style='color:red;'>Der Mitarbeiter <b>".$user."</b> wurde erfolgreich gelöscht.</p>";
    include("mitarbeiter.php");
?>
