<?php
require_once "config.php";
require_once "session.php";


?>


<?php
    if(isset($_POST['send-btn'])){
        $newCollege = $_POST["newCollege"]; 
        $newMajor = $_POST["newMajor"];

        /*when user not logged in*/
        if (!isset($_SESSION['loggedin'])) {
            $msg = "قم بتسجيل الدخول أولاً..أو إنشئ حساب جديد في حال ليس لديك حساب <a href='sginup.php'>إنشاء حساب</a>";
        }
        /*when user logged in*/
        else{
           $userID = $_SESSION['id']; 
           /*fetch student's acadmic info*/
           $query = mysqli_query( $db,"SELECT * FROM majorinfo WHERE userID = '$userID' ");
           while($row = mysqli_fetch_row($query)){
            $oldCollage = $row[1];
            $oldMajor = $row[2];
            $YourResult = $row[3];
            $YourHours = $row[4];
            $major_list = array("التصميم الداخلي", "التصميم الجرافيكي");

            /*condtion*/
            if($newCollege <> $oldCollage){
                $msg ="للآسف..التحويل خارج كليتك غير متاح هذه الفترة";
                
            }
            elseif ($oldMajor == $newMajor) {
                $msg = "توقف عن اختيار نفس تخصصك الحالي..";
            }
            elseif($YourResult < 3){
                $msg = "عذراً..معدلك أقل من المعدل المسموح بالتحويل..يجب أن لا يقل معدلك عن 3";
            }

            elseif ($YourHours < 12) {
                $msg = "عذراً..عدد ساعاتك أقل من عدد الساعات المسموح بالتحويل..يجب أن لا يقل عدد ساعاتك عن 12 ساعة";
            }
            elseif (!in_array($newMajor, $major_list)) {
                $msg = "التحويل لهذا التخصص غير متاح في الوقت الحالي";
            }
            
            
            else{
                /*insert new collage and new major into transform table*/
                $result = mysqli_query($db,"INSERT INTO transform (newCollege,newMajor,userID) VALUES ('$newCollege','$newMajor','$userID')"); 
                /*update student's acadmic info to set new collage and new major*/
                $upresult = mysqli_query($db,"UPDATE majorinfo SET YourCollege= '$newCollege' , YourMajor= '$newMajor'  WHERE  userID = '$userID' ");
                $_SESSION["message"]= "<p> تهانينا! مدخلاتك تسمح لك بالتحويل للتخصص الذي اخترته 🎉🎉</p>";
                /*link to study plan page*/
                $_SESSION["plan"]= "<a href='readMore.php?link=$newMajor' target='_blank'>اتقر للاطلاع على دليل الخطة الدراسية للتخصص المراد التحويل إليه</a>";
                /*link to subject page*/
                $_SESSION["equiv"]="<a href='subject.php' target='_blank'>اتقر للاطلاع على المواد التي يمكنك معادلتها</a>";
                
                
                header("location:result.php");
                
                
                
            }
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
        <title>منصة حوّل | تحويل</title>

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

            <div class="screen">
                <a href="index.php"><img src="img/logo.png" class="logo"></a>
                <!--form for transform-->
                <form method="POST" class="form1">
                    <?php if (!empty($msg)) {
                       echo "<p class='error' style='color:indianred'>$msg</p>";
                    } ?>
                    <h4>الكلية المراد التحويل إليه</h4>
                    <select name="newCollege" class="form-control selectpicker" id="newCollege" data-live-search="true" required>
                    <?php
                        $newCollege = array("كلية علوم الأسرة", "كلية إدارة الأعمال");
                        foreach($newCollege as $item){
                            echo '<option value="' . strtolower($item) . '">' . $item . '</option>';
                        }
                    ?>
                    </select>
                    <h4>التخصص المراد التحويل إليه</h4>
                    <select name="newMajor" class="form-control selectpicker" id="newMajor" data-live-search="true" required>
                    <?php
                        $newMajor = array("التصميم الداخلي", "التصميم الجرافيكي","تصميم الملابس والحلي","نظم المعلومات اللإدارية","محاسبة");
                        foreach($newMajor as $item){
                            echo '<option value="' . strtolower($item) . '">' . $item . '</option>';
                        }
                    ?>
                    </select>
                    <input type="submit" name="send-btn" value="إرسال" class="button">
                </form>
                
                <!--nav bar-->
                <div class="btnContainer">
                    <a href="transformType.php" class="button btn">رجوع</a>
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