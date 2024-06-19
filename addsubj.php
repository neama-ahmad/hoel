<?php
require_once "config.php";
require_once "session.php";

if (!isset($_SESSION['loggedin'])){
	header('Location:addsubj.php');
	exit;
    
}

?>

<?php
/*insert subjects into DB*/
if(isset($_POST['send-btn'])){
    $SubjName = $_POST["SubjName"]; 
    $SubjCode = $_POST["SubjCode"];
    $SubjNum = $_POST["SubjNum"];
    $SubjHours = $_POST["SubjHours"];

    $query = mysqli_query($db,"INSERT INTO Equiv (SubjName,SubjCode,SubjNum,SubjHours) VALUES ('$SubjName','$SubjCode','$SubjNum','$SubjHours')"); 
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
        <title>منصة حول | إضافة مواد</title>

        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/sideMenu.css">
        <link rel="stylesheet" href="css/cardStyle.css">
         <style>
            body{
                background-color: #fff;
               
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
            <a href="addsubj.php" >إضافة مواد الممكن معادلتها</a>
            
            <a href="logout.php">تسجيل خروج</a>
        </div>

    <?php 
      }
    ?>

    <a class="button sgin" onclick="openNav()"><i class="fas fa-bars"></i></a>
        
        <div class="mather">
            
          <div class="oldsister" >

            <div class="screen">
            <img src="img/logo.png" class="imgLogo">
            <h4>قم بإدراج المواد الممكن معادلتها</h4>
                <!--form to add subjects-->
                <form method="POST">
                    <?php if (!empty($msg)) {
                       echo "<p class='error' style='color:indianred'>$msg</p>";
                    } 
                    ?>
                    <input type="text" name="SubjName" id="SubjName" placeholder="اسم المادة" class="forminput"  required> 
                    <input type="text" name="SubjCode" id="SubjCode" placeholder="رمز المادة" class="forminput"  required> 
                    <input type="text" name="SubjNum" id="SubjNum" placeholder="رقم المادة" class="forminput"  required> 
                    <input type="text" name="SubjHours" id="SubjHours" placeholder="عدد وحدات المادة" class="forminput"  required> 
                    
                    <input type="submit" name="send-btn" value="إرسال" class="button">
                </form>
               
            </div>

            <table>
                <?php
                /*show all subjects*/
                    $userID = $_SESSION['id']; 
                    $query2 = mysqli_query( $db,"SELECT * FROM Equiv");
                    while($row = mysqli_fetch_row($query2)){
                ?>
                <tr>
                <th>اسم المادة</th>
                <th>رمز المادة</th>
                <th>رقم المادة</th>
                <th>عدد وحدات المادة</th>
                </tr>
                <tr>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>

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