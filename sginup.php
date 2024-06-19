<?php 

require_once "config.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    /*check if user exist or not*/
    $error = "";
    $check_email = mysqli_query($db, "SELECT email FROM user where email = '$email' ");
    if(mysqli_num_rows($check_email) > 0){
       
        $msg ="هذا الايميل موجود بالفعل يبدو أن لديك حساب سابق";
    }
    /*insert user data */
    else{
        $result = mysqli_query($db, "INSERT INTO user (fullName,email, pass) VALUES ('$fullName', '$email', '$password')");
       
        header("location:allUniversity.php");
        

    }
   
}

$db->close();


?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.0/css/all.css"> 
  
        <link rel="icon" href="img/logo.png">
        <title>منصة حول | إنشاء حساب</title>

        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/animation.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>

        <div class="mather">
            <!--animation block-->
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
            </div>

            <div  class="banner">
                <a href="index.php"><img src="img/logo.png"></a>
                <!--sginup form-->
                <form method="POST" action="" id="sginup" name="sginup">
                    <h2>إنشاء حساب</h2>
                    <p id='error' style='color:indianred'></p>
                    <?php if (!empty($msg)) {
                       echo "<p class='error' style='color:indianred'>$msg</p>";
                    } ?>
                    <input type="text" id="fullName"  name="fullName" placeholder="الاسم" class="forminput"  required >  
                    <input type="email" id="email"  name="email" placeholder="الإيميل"  class="forminput"  required >
                    <input type="password" id="password"  name="password" placeholder="كلمة المرور" minlength="8" class="forminput" required  ><i class="fas fa-eye icon" onclick="showpassword()"></i>
                    <input type="password" id="ConfirmPassword"  name="ConfirmPassword" placeholder="تأكيد كلمة المرور" minlength="8" class="forminput" required  ><i class="fas fa-eye icon" onclick="showpassword2()"></i>
                    <br/>
                    <input type="submit" id="login-btn" value="إنشاء حساب" class="button" onclick="check()">
                </form>
                <a class="underline" href="./login.php" >تسجيل الدخول</a> 
            </div>
        </div>

        <script>
            /*show password script*/
            function showpassword(){
                var pass = document.getElementById("password");
                if (pass.type === "password") {
                    pass.type = "text";
                } 
                
                else {
                    pass.type = "password";
                }
            }

            function showpassword2(){
                var pass2 = document.getElementById("ConfirmPassword");
                if (pass2.type === "password") {
                    pass2.type = "text";
                } 
                
                else {
                    pass2.type = "password";
                }
            }
        </script>

        <!--script to verfiy input value-->
        <script src="js/verfiy.js"></script>

        
    </body>
</html>