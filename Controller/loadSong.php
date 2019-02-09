<?php
    session_start();
    $temp = new StdClass();

    require('../Data/db.php');
    $query = "SELECT songname,artist FROM Song WHERE path = '".$_POST['link']."'";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->bind_result($a,$b);
    $statement->fetch();
    $temp->name = $a;
    $temp->artist = $b;
   
    $temp->link = "../Songs/".$_POST['link'];
    $temp->url = $_POST['url'];

    echo json_encode($temp);


