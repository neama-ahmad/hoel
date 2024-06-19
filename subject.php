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
        <title>منصة حوّل | المواد المتاحة للمعادلة</title>
        
        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/cardStyle.css">
        <style>
            body{
                background-color : transparent;
            }
            .subj{
                display:flex;
                flex-direction:column;
                flex-wrap:wrap;
                align-Items:center;
                justify-content:center;
                height:auto;
                padding:20px;
              
            }
            table{
                width: 80%;
            }
            .subj a{
                text-align: center;
                padding:12px;
            }

        </style>
    </head>
    <body>
        <div class="subj">
           <a href="index.php"><img src="img/logo.png" class="logo"></a>
           <h3>المواد الممكنة للمعادلة</h3>
            <table>
                <?php
                /*show all subjects*/
                    $query2 = mysqli_query( $db,"SELECT * FROM Equiv ");
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
    </body>
</html>