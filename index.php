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
</head>
<body>

<blockquote>
    <h1 align="center"><?= $welcome ?></h1>
    <!--Menu-->
    <h2>What do you like to usage?</h2>
    <?php
    include "inc/lib.inc.php";
    include "inc/menu.inc.php";
    ?>

</body>
</html>
