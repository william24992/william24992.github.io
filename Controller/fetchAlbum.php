<?php
    require("../Data/db.php");
    $query = "SELECT * FROM Album ORDER BY RAND() LIMIT 4;";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->bind_result($row_id, $row_name, $row_artist,$row_date,$row_prod,$row_lang,$row_gen,$row_path);
    