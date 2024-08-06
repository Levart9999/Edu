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
    ?>


<html>
<head>
    <title>WOW</title>
</head>
<body>
<blockquote>
    <h1 align="center"><?= $welcome ?></h1>
</blockquote>
</body>
</html>
