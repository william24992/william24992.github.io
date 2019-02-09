<?php
    session_start();
    require("../Data/db.php");
    $query = "SELECT DISTINCT name FROM Playlist where userid = ?";
    $statement = $db->prepare($query);
    $id = $_SESSION['id'];
    $statement->bind_param("s",$id);
    $statement->execute();
    $statement->bind_result($row_name);
    $temp="<div id='playlist-holder'>";

    while($statement->fetch()){
        $temp.="<div id='row-playlist'><h2><a href='' onclick='return false;' class='playlist-name'>".$row_name."</a></h2></div>";
    }
    $temp .= '</div>';
    $statement->close();
    echo $temp;