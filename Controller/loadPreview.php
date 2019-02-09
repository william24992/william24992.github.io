<?php
    $al_name = $_POST['albumname'];
    require("../Data/db.php");
    $query = "SELECT s.path  FROM Album a join Song s on a.albumname = s.album where s.album like ? order by rand() limit 1";
    $statement = $db->prepare($query);
    $statement->bind_param("s",$al_name);
    $statement->execute();
    $statement->bind_result($_path);
    $statement->fetch();
    echo "../songs/".$_path;