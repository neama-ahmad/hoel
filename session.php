<?php

session_start();
$role = isset($_SESSION["role"]);
if(isset($_SESSION["id"]) && $_SESSION["id"]==true){
    
    if($role =="user"){
        header("location:allUniversity.php");
        exit;
    }
    elseif($role == "admin"){
        header("location:panel.php");
    }
    else{
        echo "";
    }

}    



?>