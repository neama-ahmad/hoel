<?php
require_once "config.php";
require_once "session.php";

?>

<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css"> 



        <link rel="icon" href="img/logo.png">
        <title>منصة حوّل |اختيار الجامعات</title>

        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/sideMenu.css">
        <link rel="stylesheet" href="css/cardStyle.css">
        <style>
            .oldsister{
                margin-top:70px;
            }
        </style>
    
    </head>
    <body>
 
        <div class="mather">
            
        <div class="oldsister" >
            <!--show university calender-->
            <div class="screen">
            <a href="index.php"><img src="img/logo.png" class="logo"></a>
                <div class="univ-Title">
                    <h4>قم بتحديد جامعتك الحالية لعرض التقويم الجامعي</h4>
                </div>
                <div class="univ">
                    <a href="#" class="univ-btn"><img src="img/saud.png" class="tu"></a>
                    <a href="calender.php"><img src="img/taibah.png"></a>
                    <a href="#" class="univ-btn"><img src="img/kau.png"></a>
                </div>
                 
            </div>

        </div>

        

        <!--script for menu-->
        <script src="js/subMenu.js"></script>

 
    </body>
</html>