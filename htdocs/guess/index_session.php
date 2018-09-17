<?php

include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");


if (!isset($_SESSION["game"])) {
    session_name("guno17");
    session_start();
}

$guess = $_POST["guess"] ?? null;
$number = isset($_SESSION["game"]) ? $_SESSION["game"]->number() : -1;
$tries = isset($_SESSION["game"]) ? $_SESSION["game"]->tries() : 6;

$game = new Guess($number, $tries);

$_SESSION["game"] = $game;

$res = null;
$cheat = null;
$status = null;
if (isset($_POST["doGuess"])) {
    $res = $_SESSION["game"]->makeGuess($guess);
}

if (isset($_POST["doCheat"])) {
    $cheat = "CHEAT: The correct answer is " . strval($game->number());
}

if (isset($_GET["reset"])) {
    session_destroy();
    header("Location: index_session.php");
}

if ($_SESSION["game"]->tries() < 1 || $guess == $_SESSION["game"]->number()) {
    $status = "disabled";
}

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
</form>

<a href="?reset"> Reset game </a>

<p><?= $res ?> </p>

<p><b><?= $cheat ?> </b></p>
