<?php

require_once "config.php";
require_once "session.php";

if (!isset($_SESSION['loggedin'])){
	header('Location:panel.php');
	exit;
    
}

?>
    
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css"> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />


        <link rel="icon" href="img/logo.png">
        <title>خدمة حول | بياناتي</title>

        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/sideMenu.css">
        <link rel="stylesheet" href="css/cardStyle.css">
        <style>
            body{
                background-image: url("img/student.jpg");
                background-repeat: no-repeat;
                background-position: right;
                background-size: 80%;
            }
            @media(max-width:800px){
                body{
                   background-image:none;
                }
            }
                
        </style>
    </head>
    <body>
       
    <?php
      $query = mysqli_query( $db,"SELECT * FROM user where email =  '". $_SESSION['email']."' ");
      while($row = mysqli_fetch_row($query)){
    ?>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php" class="bigLogo">منصة حوّل</a>
            <a href="user.php"  id="name">مرحبا  <?php echo $row[1] ?></a>
            <a href="addvideo.php" >إضافة فيديو</a>
            <a href="#" >إضافة الجامعات</a>
            <a href="#" >إضافة الكليات</a>
            <a href="#" >إضافة التخصصات</a>
            <a href="addsubj.php">إضافة مواد الممكن معادلتها</a>
            
            <a href="logout.php">تسجيل خروج</a>
        </div>

    <?php 
      }
    ?>

    <a class="button sgin" onclick="openNav()"><i class="fas fa-bars"></i></a>
              
        <?php
        /*update admin data*/
        if(isset($_POST['send-btn'])){
    
            if(!empty($_POST["fullName"])) {
                $fullName = $_POST["fullName"];
            }
            
            if(!empty($_POST["password"])) {
                $password = $_POST["password"];
            }
        
            $query = mysqli_query($db,"UPDATE user SET fullName= '$fullName' ,pass= '$password' where  email =  '". $_SESSION['email']. "' ");
            
        }
        
        ?>
       
        <div class="mather">
          <div class="oldsister" >
            <div class="screen">
                <img src="img/logo.png" class="imgLogo">
                <h3>بياناتي</h3>
                <p id="error" class="error"></p>
                <?php if (!empty($msg)) {
                    echo "<p class='error' style='color:indianred'>$msg</p>";
                } ?>
                <form method="POST" action="">
                <?php
                 /*show admin data*/
                    $query = mysqli_query( $db,"SELECT * FROM user where email =  '". $_SESSION['email']."' ");
                    while($row = mysqli_fetch_row($query)){
                ?>
                    <input type="email" id="email"  name="email" placeholder="الإيميل"  class="forminput" value="<?php echo $row[2] ?>" required  readonly>
                    <input type="text" id="fullName"  name="fullName" placeholder="الاسم" value="<?php echo $row[1] ?>" class="forminput"  required >  
                    <input type="text" id="password"  name="password" placeholder="كلمة المرور" minlength="8" value="<?php echo $row[3] ?>" class="forminput" required  >
                    <input type="submit" name="send-btn" value="رفع التعديل" class="button">
                    <?php 
                    }
                    ?>
                </form>

             </div>
            </div>

            <!--footer-->
            <div  class="footer" id="footer">   
                <div class="middle">
                    <h3>الشريك الاستراتيجي</h3>
                    <div  class="social">
                        <img  src="img/trafud.png">
                        <img  src="img/mahfood.png" class="imgsmall">
                        <img  src="img/bader.jpeg" class="imgsmall">
                        <img  src="img/ghadan.jpeg" >
                        
                    </div> 
                </div>     
                </div>
                <!--copyright-->
                <div  class="copyright">
                    <p> جميع الحقوق محفوظه &copy; <span id="year"></span>&nbsp;<a href="index.php">لمنصة حول</a></p>
                    <script>document.getElementById("year").innerHTML=(new Date().getFullYear())</script>
                </div>
            
        </div>

        <!--script for menu-->
        <script src="js/subMenu.js"></script>
        
    </body>
    
    
</html>