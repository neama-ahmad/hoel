<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
 
  
        <link rel="icon" href="img/logo.png">
        <title>منصة حوّل | الخطة الدراسية</title>

        <!-- CSS here -->
        <link rel="stylesheet" href="css/main.css">
        <style>
            .bigTitle{
                color:#000;
                font-size:18px;
            }
            .plan{
                display:flex;
                flex-direction:column;
                flex-wrap:wrap;
                align-Items:center;
                justify-content:center;
                height:auto;
            }
            img{
                width:60%;
                height:80%;
                margin:20px;
            }
        </style>
    </head>
    <body>
      
        <?php
        /*show study plan in pdf file*/
        $major = $_GET["link"];
        if ($major == 'التصميم الداخلي'){
            $file = 'designPlan.pdf';
            $filename = 'designPlan.pdf';
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($file));
            header('Accept-Ranges: bytes');
            @readfile($file);
        }
        elseif($major == 'التصميم الجرافيكي'){
            $file = 'graphicPlan.pdf';
            $filename = 'graphicPlan.pdf';
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($file));
            header('Accept-Ranges: bytes');
            @readfile($file);
        }

        else{
            echo "حدث خطأ ما" ;
        }
           
        ?>
    </body>
</html>