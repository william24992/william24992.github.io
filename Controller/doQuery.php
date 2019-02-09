<?php
    require("../Data/db.php");
    $query = $_POST['query'];
    $statement = $db->prepare($query);
    $statement->execute();
    
    $statement->close();
    echo 'success!';