<?php

namespace Anax\View;

?>

<!doctype html>
<meta charset="utf-8">
<title>Guess my number </title>
<h1>Guess the number </h1>

<p> Guess a number, 1-100. you have <?= $_SESSION["game"]->tries() ?> left. </p>

<form method="POST">
    <input type="text" name="guess" value="<?= $guess ?>">
    <input type="submit" name="doGuess" value="Make a guess" <?= $status ?>>
    <input type="submit" name="doCheat" value="Cheat number">
    <input type="submit" name="reset" value="Reset">
</form>


<p><?= $res ?> </p>

<p><b><?= $cheat ?> </b></p>
