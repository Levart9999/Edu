<?php

$x = "";
$y = "";
$error = "";
$result = "";
$warning = "";
$resultsArray = [];

if(isset($_GET["operation"])){
    $x = $_GET["num1"];
    $y = $_GET["num2"];
    $oper = $_GET["operation"];


    if(is_numeric($x) && is_numeric($y)){
        switch($oper){
            case "+" : $result = $x + $y;
                break;
            case "-" : $result = $x - $y;
                break;
            case "*" : $result = $x * $y;
                break;
            case "/" :
                if ($y != 0) {
                    $result = $x / $y;
                } else {;
                    $warning =  "Ошибка: деление на ноль";
                }
                break;
        }
        if ($result !== "" && $warning === "") {
            $resultsArray[] = $result;
        }
    }else {
        $error = "Number please!!!";
    }

}
if(isset($_POST["reset"])){
    $x = "";
    $y = "";
    $result = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Calc</title>
</head>

<body>

<blockquote>
    <h1> <?= $error ?></h1>
    <h1> <?= $warning ?></h1>

    <form action="" method="get">


        <div>

            <label for="num1">Number1:</label>
            <input type="number" name="num1" id="num1" value="<?= $x ?>">

        </div>


        <div>

            <label for="num2">Number2:</label>
            <input type="number" name="num2" id="num2" value="<?= $y ?>">

        </div>


        <div>

            <label for="result">Result:</label>
            <input type="number" id="result" value="<?= $result ?>">

        </div>


        <div>

            <input type="submit" value="+" name="operation">
            <input type="submit" value="-" name="operation">
            <input type="submit" value="*" name="operation">
            <input type="submit" value="/" name="operation">
            <input type="submit"  value="C" name="reset">

        </div>
    </form>
</blockquote>

</body>
</html>


