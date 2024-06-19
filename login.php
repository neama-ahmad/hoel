<?php
    require_once "config.php";
    require_once "session.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT id ,role FROM user WHERE email = '$email' and pass = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
        $count = mysqli_num_rows($result);
        /*check user data and open new session  */
        if($count == 1) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $row['id'];

            /*direct user by his role */
            if($row["role"]=="user"){
                header("location:allUniversity.php");
            }
 
            else if($row["role"]=="admin"){
                header("location:panel.php");
            }

            else{
                echo "";
            }
  
            
        }

        else {
            $msg="خطأ في الايميل أو في كلمة المرور تححق منها"; 

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
        <title>منصة حول | تسجيل الدخول</title>

        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/animation.css">
        <link rel="stylesheet" href="css/login.css">

    </head>
    <body>
      
        <div  class="mather">
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
            </div >
            <div  class="banner">
              <a href="index.php"> <img src="img/logo.png"></a>
               <!--login form-->
                <form method="POST" action="" id="login" name="login">
                    <h2>تسجيل الدخول</h2>
                    <p id='error' style='color:indianred'></p>
                    <?php if (!empty($msg)) {
                        echo "<p class='error' style='color:indianred'>$msg</p>";
                    } ?>
                    <input type="email" id="email"  name="email" placeholder="الإيميل"  class="forminput"  required >
                    <input type="password" id="password"  name="password" placeholder="كلمة المرور" minlength="8" class="forminput" required  ><i class="fas fa-eye icon" onclick="showpassword()"></i>
                    <br/>
                    <input type="submit" id="login-btn" value="تسجيل الدخول" class="button" onclick="check()">

                </form>
                
                <a class="underline" href="./sginup.php" >ليس لدي حساب</a> 
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
        </script>
        
        <!--script to verfiy input value-->
        <script src="js/verfiy.js"></script>
    </body>
</html>