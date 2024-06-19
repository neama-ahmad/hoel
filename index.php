<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
 
        <link rel="icon" href="img/logo.png">
        <title>منصة حوّل</title>

        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/animation.css">
        <style>
            .underline:hover{
               color: #fff;
            }
        </style>
    </head>
    <body>

        <div class="mather">
            <!--background animation-->
            <div class="area" >
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div >

            <!--top menu-->
            <div class="menu">
                <div class="Logocontainer">
                    <a href="index.php"><img id="logo" src="img/reallogo.jpg"></a>
                    
                </div>
                <div class="container" >
                    <a href="./sginup.php" class="button btn">حساب جديد</a>  
                    <a href="./login.php"  class="button" >تسجيل الدخول</a>
                </div>
            </div>
            
            <!--popbox-->
            <div class="popbox" id="pop">
                <span  onclick="document.getElementById('pop').style.display='none'" class="close" title="إغلاق النافذة">&times;</span>
                <a href="univ.php" target= "_blank" ><p>بإمكانك رفع طلبك في فترات التحويل المعلن عنها في التقويم الجامعي التابع لجامعتك خلال هذا العام</p></a>
            </div>
             
            <!--about-->
            <div  class="brief">
                <h2>أهلاً بك في منصة حوّل</h2>
                <p>منصة حوّل هي منصة إلكترونية إرشادية تستهدف طلاب وطالبات الجامعات السعودية تتيح لك معرفة آلية التحويل بين الجامعات وكلياتها و تخصصاتها بأسهل الخطوات
وكذلك تطلعك على الخطة الدراسية للتخصص الذي تود التحويل إليه</p>
            </div>
            
            <!--video block-->
            <?php
             $query = mysqli_query( $db,"SELECT * FROM video");
             while($row = mysqli_fetch_row($query)){
            ?>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $row[1]?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php
            }
            ?>
            <!--start button-->
            <div class="btn-banner">
                <a href="allUniversity.php" class="button start">ابدأ</a>
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


    </body>
</html>