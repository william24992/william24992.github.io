<?php
    $a = $_POST['uname'];
    $b = $_POST['passw'];
    if($_POST['uname']==""||$_POST['passw']=="")
    {
        $error="Username/Password can't empty!";
        $a = $_POST['uname'];
        $b = $_POST['passw'];
        header("location:../View/login.php?error=$error&user=$a");  
    }else
    {  
        //query check
        require('../Data/db.php');
        $query= "SELECT id,surename FROM User where username = ? and password= ?";
        $statement = $db->prepare($query);
        $statement->bind_param('ss', $a,$b);
        $statement->execute();
        $statement->bind_result($row_id, $row_name);
        if($statement->fetch()){
            session_start();
            $_SESSION['user'] = $row_name;
            $_SESSION['id'] = $row_id;
        	$_SESSION['timeout'] = time();
            header("location:../View/home.php");
        }else{
            $error="Username/Password is wrong";
            $a = $_POST['uname'];
            $b = $_POST['passw'];
            header("location:../View/login.php?error=$error&user=$a");  
        }

        
    }


?>