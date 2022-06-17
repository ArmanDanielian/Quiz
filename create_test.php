<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="createBody">

<form method="post" class="createForm">

    <label for="">Question</label> <br>
    <input type="text" name="question"> <br>

    <label for="">Option 1</label> <br>
    <input type="text" name="answer1"> <br>

    <label for="">Option 2</label> <br>
    <input type="text" name="answer2"> <br>

    <label for="">Option 3</label> <br>
    <input type="text" name="answer3"> <br>

    <label for="">Option 4</label> <br>
    <input type="text" name="answer4"> <br>

    <input type="submit" class="create" value="Create">

</form>

<form method="post" class="formFinish">
    <input type="submit" name="someAction" value="Finish" class="finish"/>
</form>



</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && count($_POST) == 5)
{
    $user = $_POST;
    foreach ($user as $k => $u) {
        if (substr($u, -2) == ' +') {
            $user['rightAnswer'] = substr_replace($u ,"",-2);
            $user[$k] = substr_replace($u ,"",-2);
        }
    }
    $f = fopen("data.txt", "a");
    $user = json_encode($user);
    fwrite($f, $user . "\n");
    fclose($f);
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['someAction'])) {
    func();
}

function func()
{
    header("location: /Homework_2(quiz)/test.php");
}