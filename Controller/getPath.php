<?php 



$dir = $_POST['path'];
// $dir = "../Songs/";

if(strcmp("../songs",$dir)==0||strcmp("../songs/",$dir)==0){
    echo "You can't access this folder";
    die();
}

// Open a directory, and read its contents
$temp = '';
if (is_dir($dir)){
    if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
            if(strlen($file) >2){
                if(strcmp(substr($file,strlen($file)-4,strlen($file)),".mp3")==0){
                    $temp.="<div id='song-holder'>"."<input type='text' id='albumid'>".
                        "<a class='song-file' href='#".$file."'>".
                            $file.
                        "</a>".
                    "<div class='add-btn'></div></div>";								
                }
            }
        }
        closedir($dh);
    }
}
if($temp=='')
$temp = 'No File mp3 found';


echo $temp;