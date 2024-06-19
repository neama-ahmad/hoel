<?php
require_once "config.php";
require_once "session.php";

?>

<?php
/*insert and update acadmic info*/
if(isset($_POST['save-btn'])){
    $YourCollege = $_POST["YourCollege"]; 
    $YourMajor = $_POST["YourMajor"];
    $YourResult = $_POST["YourResult"];
    $YourHours = $_POST["YourHours"];
   
    /*when student not logged in*/
    if (!isset($_SESSION['loggedin'])) {
        $msg = "قم بتسجيل الدخول أولاً..أو إنشئ حساب جديد في حال ليس لديك حساب <a href='sginup.php'>إنشاء حساب</a>";
    }
    
    else{
        /*when student logged in*/
        $userID =  $_SESSION['id']; 

        $check_data = mysqli_query($db, "SELECT userID FROM majorinfo where userID = '$userID' ");
        /*when student fill his acadmic info before.. then it just update it*/
        if(mysqli_num_rows($check_data) > 0){
            $query1 = mysqli_query($db,"UPDATE majorinfo SET YourCollege= '$YourCollege' , YourMajor= '$YourMajor' , YourResult= '$YourResult',YourHours='$YourHours' WHERE  userID = '$userID' ");
        }
        /*when student fill his acadmic info for first time*/
        else{
            $query2 = mysqli_query($db,"INSERT INTO majorinfo (YourCollege,YourMajor,YourResult,YourHours,userID) VALUES ('$YourCollege','$YourMajor','$YourResult','$YourHours','$userID')"); 
        }
    
    }
    
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
    else {
    /*menu when user logged in*/
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
            
          <div class="oldsister">
          <div class="screen">
          <a href="index.php"><img src="img/logo.png" class="logo"></a>
              <table>
                <?php
                /*show student's acadmic info when user logged in*/
                if (!isset($_SESSION['loggedin'])) {
                  echo "<style> table:display:none;</style>";
                }
                else{
                    $userID = $_SESSION['id']; 
                    $query = mysqli_query( $db,"SELECT * FROM majorinfo WHERE userID = '$userID' ");
                    while($row = mysqli_fetch_row($query)){
                
                ?>
                <tr>
                <th>كليتك الحالية</th>
                <th>تخصصك الحالي</th>
                <th>معدلك</th>
                <th>عدد ساعاتك المكتسبة</th>
                </tr>
                <tr>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                </tr>
                
                <?php
                }
               }
                ?>
            </table>
            
             <!--form for acadmic info-->
             <form method="POST">
                <?php if (!empty($msg)) {
                       echo "<p class='error' style='color:indianred'>$msg</p>";
                    } 
                ?>
                 <h4> كليتك الحالية</h4>
                 
                 <select name="YourCollege"  class="form-control selectpicker" id="YourCollege" data-live-search="true" required>
                 <?php
                     $YourCollege = array("كلية علوم الأسرة", "كلية إدارة الأعمال");
                     foreach($YourCollege as $item){
                         echo '<option value="' . strtolower($item) . '">' . $item . '</option>';
                     }
                 ?>
                 </select>

                 <h4> تخصصك الحالي</h4>
                 <select name="YourMajor" class="form-control selectpicker" id="YourMajor" data-live-search="true" required>
                 <?php
                     $YourMajor = array("التصميم الداخلي", "التصميم الجرافيكي","تصميم الملابس والحلي","نظم المعلومات اللإدارية","محاسبة");
                     foreach($YourMajor as $item){
                         echo '<option value="' . strtolower($item) . '">' . $item . '</option>';
                     }
                 ?>
                 </select>
                 <br/><br/>
                 <input type="text" name="YourResult" id="YourResult" placeholder="معدلك" class="forminput"  required>
                 <input type="text" name="YourHours" id="YourHours" placeholder="عدد ساعاتك المكتسبة" class="forminput" required>
              
                 <input type="submit" name="save-btn" id="save-btn" value="حفظ" class="button">
          
                </form>
                 
                <!--nav bar-->
                <div class="btnContainer">
                    <a href="allUniversity.php" class="button btn">رجوع</a>
                    <a href="transformType.php" class="button btn">التالي</a>
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