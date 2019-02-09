<?php
    session_start();
    $userid = $_SESSION['id'];
    require('../Data/db.php');
    $query= "SELECT songname,picture_path,artist,path from Song order by rand();";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->bind_result($song_name,$pict_path,$song_artist,$path);
    $temp='';
    
    while($statement->fetch())
    {
        $temp.="<div class='made-for-you'>" ;
        $temp.="<div class='song-pict not-loaded' onclick='getChildToLoad(this);' id='".$pict_path."'>";
        $temp.="</div><a class='song-text' onclick='loadSong(this);' href='#".$path."'>".$song_name."</a></div>";
    }
    
    
    echo json_encode($temp);
//https://www.w3schools.com/js/js_json_php.asp