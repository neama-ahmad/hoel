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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />


        <link rel="icon" href="img/logo.png">
        <title>منصة حوّل | الجامعات</title>
        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/sideMenu.css">
        <link rel="stylesheet" href="css/cardStyle.css">
        <style>
            body{
                background-image: url("img/student.jpg");
                background-repeat: no-repeat;
                background-position: right;
                background-size: 70%;
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
     /*menu when user not logged in*/
       if (!isset($_SESSION['loggedin'])) {
    ?>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php" class="bigLogo">منصة حوّل</a>
            <a href="#" onclick="subMenu()">الجامعات<i class="fas fa-sort-down icon" onmouseover="closeSub()"></i></a>
            <div class="sub" id="sub">
                <a href="Universityinfo.php" class="inside">جامعة طيبة</a>
                <a href="#" class="inside">جامعة الملك سعود</a>
                <a href="#" class="inside">جامعة الملك عبدالعزيز</a>
            </div>
            <a href="#" onclick="subMenu2()">تحويل<i class="fas fa-sort-down icon" onmouseover="closeSub2()"></i></a>
            <div class="sub" id="sub2">
                <a href="transform.php" class="inside">تحويل داخلي</a>
                <a href="#" class="inside">تحويل خارجي</a>
            </div>
            <a href="login.php">تسجيل الدخول</a>
        </div>
    <?php 
    }
     /*menu when user logged in*/
    else {
    ?>
    <?php
      $query = mysqli_query( $db,"SELECT * FROM user where email =  '". $_SESSION['email']."' ");
      while($row = mysqli_fetch_row($query)){
    ?>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php" class="bigLogo">منصة حوّل</a>
            <a href="user.php"  id="name">مرحبا  <?php echo $row[1] ?></a>
            <a href="#" onclick="subMenu()">الجامعات<i class="fas fa-sort-down icon" onmouseover="closeSub()"></i></a>
            <div class="sub" id="sub">
                <a href="Universityinfo.php" class="inside">جامعة طيبة</a>
                <a href="#" class="inside">جامعة الملك سعود</a>
                <a href="#" class="inside">جامعة الملك عبدالعزيز</a>
            </div>
            <a href="#" onclick="subMenu2()">تحويل<i class="fas fa-sort-down icon" onmouseover="closeSub2()"></i></a>
            <div class="sub" id="sub2">
                <a href="transform.php" class="inside">تحويل داخلي</a>
                <a href="#" class="inside">تحويل خارجي</a>
            </div>
            <a href="logout.php">تسجيل خروج</a>
        </div>

    <?php 
      }
    }
    ?>

    <a class="button sgin" onclick="openNav()"><i class="fas fa-bars"></i></a>
     
       

        
        <div class="mather">
            
          <div class="oldsister" >
           <!--university selection block-->
            <div class="screen">
                <a href="index.php"><img src="img/logo.png" class="logo"></a>
               <div class="univ-Title">
                    <h4>قم بتحديد جامعتك الحالية</h4>
                </div>
                <div class="univ">
                    <a href="#" class="univ-btn"><img src="img/saud.png" class="tu"></a>
                    <a href="Universityinfo.php"><img src="img/taibah.png"></a>
                    <a href="#" class="univ-btn"><img src="img/kau.png"></a>
               </div>
                 
                <div class="btnContainer">
                    <a href="Universityinfo.php" class="button btn">التالي</a>
                </div>
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
                    <p> جميع الحقوق محفوظه &copy; <span id="year"></span>&nbsp;<a href="index.php">لمنصة حوّل</a></p>
                    <script>document.getElementById("year").innerHTML=(new Date().getFullYear())</script>
                </div>
            
         
        </div>
        
         
        <!--for html and bootstrap select option-->
        <script>
            $(function() {
                $('.selectpicker').selectpicker();
                });
            });
        </script>
         
        <!--script for menu-->
        <script src="js/subMenu.js"></script>

 
    </body>
</html>