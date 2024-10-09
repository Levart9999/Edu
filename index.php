<?php
$hour = (int) strftime("%H");
$welcome = "";
   if ($hour>0 and $hour<6)
       $welcome = "Good night";
elseif ($hour>=6 and $hour<12)
       $welcome = "Good morning";
elseif ($hour>=12 and $hour<18)
       $welcome = "Good afternoon";
elseif ($hour>=18 and $hour<23)
       $welcome = "Good evening";

//set_error_handler("myError");



    ?>


<html>
<head>
    <title>Edu</title>
    <meta charset="utf-8"/>
    <style>
        .h1 {
            display: block;
            font-size: 35px;
            margin-top: 0.67em;
            margin-bottom: 0.67em;
            margin-left: 0;
            margin-right:0;
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 3px;
            background-color: DarkSalmon;
            color: black;
        }
    </style>
</head>
<body>
    <div class = "h1">
    <h1 align="center" ><?= $welcome ?></h1>
    </div>
    <!--LOGO-->
    <div align="center">
        <img src="demo/img/pngegg-5-210x300.png" width="210" height="300">
    </div>
    <!--Menu-->
    <div class = "h2" align="center" >
    <h2>What do you like to usage?</h2>

    <?php
    include "inc/lib.inc.php";
    include "inc/menu.inc.php";
    ?>
    </div>

    <footer>
        <p>Author: LevArt9999<br>
        </p>
    </footer>




</body>
</html>
