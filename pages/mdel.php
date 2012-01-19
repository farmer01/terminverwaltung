<?php
    $query = "DELETE FROM `qv`.`user` WHERE `user`.`username` = '".$_GET['user']."'";
    mysql_query($query);

    header("refresh:0;url=index.php?page=mitarbeiter");
?>
