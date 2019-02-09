<?php
require("../data/db.php");
$query= "SELECT songname,picture_path,artist,path from Song where songname like ? or artist like ? or album like ?";
$statement = $db->prepare($query);
$params = "%".$_POST['value']."%";
$statement->bind_param("sss",$params,$params,$params);
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
// echo $temp;