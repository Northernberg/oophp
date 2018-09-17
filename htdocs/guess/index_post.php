<?php

include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

$guess = $_POST["guess"] ?? null;
$number = $_POST["number"] ?? -1;
$tries = $_POST["tries"] ?? 6;

$game = new Guess($number, $tries);

if (isset($_GET["reset"])) {
    $number = $game->random();
    $tries = 6;
}

$status = null;
$res = null;
$cheat = null;
if (isset($_POST["doGuess"])) {
    $res = $game->makeGuess($guess);
}

if (isset($_POST["doCheat"])) {
    $cheat = "CHEAT: The correct answer is " . strval($game->number());
}

if ($game->tries() < 1 || $guess == $game->number()) {
    $status = "disabled";
}

?>
<!doctype html>
<meta charset="utf-8">
<title>Guess my number </title>
<h1>Guess the number </h1>

<p> Guess a number, 1-100. you have <?= $game->tries() ?> left. </p>

<form method="POST">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <input type="text" name="guess" value="<?= $guess ?>">
    <input type="submit" name="doGuess" value="Make a guess" <?= $status ?>>
    <input type="submit" name="doCheat" value="Cheat number">
</form>

<a href="?reset"> Reset game </a>

<p><?= $res ?> </p>

<p><b><?= $cheat ?> </b></p>
