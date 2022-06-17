<?php
$data = [];
$flag = true;
$questions = [];

$f = fopen("data.txt", "r");

while (!feof($f)) {
    $row = fgets($f);
    $row = json_decode($row, true);
    if (!is_null($row)) {
        $questions[] = $row;
    }
}

session_start();
if (isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
    $flag = $_SESSION['flag'];
}
session_destroy();
?>

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
<body>

<div class="selections">
    <?php if ($flag) : ?>
    <form action="server.php" method="post">
        <?php foreach ($questions as $question) { ?>
            <h2><?= $question['question'] ?> </h2>

            <input type="hidden" name="<?= $question['question'] ?>" value="null">

            <input type="radio" name="<?= $question['question'] ?>" value="<?= $question['answer1'] ?>">
            <label for="html"><?= $question['answer1'] ?></label><br>

            <input type="radio" name="<?= $question['question'] ?>" value="<?= $question['answer2'] ?>">
            <label for="html"><?= $question['answer2'] ?></label><br>

            <input type="radio" name="<?= $question['question'] ?>" value="<?= $question['answer3'] ?>">
            <label for="html"><?= $question['answer3'] ?></label><br>

            <input type="radio" name="<?= $question['question'] ?>" value="<?= $question['answer4'] ?>">
            <label for="html"><?= $question['answer4'] ?></label><br>

        <?php } ?>
        <input type="submit" value="Submit" class="submit">
    </form>
    <?php endif; ?>
</div>

<div class="answers">
    <?php if (!$flag) : ?>
    <?php for ($i = 0; $i < count($questions); $i++) { ?>

        <?php for ($i = 0; $i < count($questions); $i++) { ?>
            <h2><?= $questions[$i]['question'] ?></h2>
            <?php if($questions[$i]['rightAnswer'] == $data[$i]) : ?>
                <p>you're right</p>
            <?php else : ?>
                <p>you made a mistake, correct answer is <?= $questions[$i]['rightAnswer'] ?></p>
            <?php endif; ?>
        <?php } ?>

    <?php } ?>
    <?php endif; ?>
</div>

</body>
</html>

