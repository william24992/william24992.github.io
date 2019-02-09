<?php
$temp_name = substr($_POST['name'],1,strlen($_POST['name']));
function addNewId($name){
    $temp = substr($name,2,5);
    $temp = (int)$temp+1;
    $temp.="";
    while(strlen($temp)<3){
        $temp = "0".$temp;
    }
    return "SG".$temp;
}
function getArtistName($name){
    $temp = substr($name,0,strpos($name,"-")-1);
    return $temp;
}
function getSongName($name){
    $temp = substr($name,strpos($name,"-")+2,strlen($name)-strpos($name,"-")-6);
    return $temp;
}

require('../Data/db.php');
$exist=0;
$query= "SELECT 1 FROM Song where path = ?";
$statement = $db->prepare($query);
$statement->bind_param('s',$temp_name);
$statement->execute();
$statement->bind_result($exist);
$statement->fetch();
$statement->close();

if($exist==1){
    echo 'file already exist';
}else{
    $query= "SELECT id FROM Song ORDER BY id DESC limit 1;";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->bind_result($exist);
    $statement->fetch();
    
    $statement->close();


    require('../Data/db.php');

    $query_insert = "INSERT INTO song( id , artist , songname , album , path ) VALUES ( ? , ? , ? , ? , ?);";
    $statement = $db->prepare($query_insert);
    $new_id = addNewId($exist);
    $new_artist = getArtistName($temp_name);
    $new_song = getSongName($temp_name);
    $new_album = $_POST['album'];
    $new_link = $temp_name;

    $statement->bind_param("sssss",$new_id,$new_artist,$new_song,$new_album,$new_link);
    $statement->execute();
    $statement->close();
    $test = $_POST['link'];
    if($test[strlen($test)-1]!="/"){
        rename($_POST['link']."/".$temp_name, "D:/MyFirstTry/Songs/".$temp_name);
    }else{
        rename($_POST['link'].$temp_name, "D:/MyFirstTry/Songs/".$temp_name);

    }
    echo $_POST['name'];

}



// copy($temp+$temp_name,"D:/MyFirstTry/Songs/"+$temp_name);
