<?php
/**
 * Guess game
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Guess my number with SESSION
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    $data = [
        "title" => "Guess game session"
    ];

    $guess = $_POST["guess"] ?? null;
    $number = isset($_SESSION["game"]) ? $_SESSION["game"]->number() : -1;
    $tries = isset($_SESSION["game"]) ? $_SESSION["game"]->tries() : 6;

    if (!isset($_SESSION["game"])) {
        $_SESSION["game"] = new \Guno\Guess\Guess($number, $tries);
    }

    if (isset($_POST["reset"])) {
        $_SESSION["game"]->setTries(6);
        $_SESSION["game"]->setNumber($_SESSION["game"]->random());
        header("Location: session");
    }

    $res = null;
    $cheat = null;
    $status = null;

    if (isset($_POST["doGuess"])) {
        $res = $_SESSION["game"]->makeGuess($guess);
    }

    if (isset($_POST["doCheat"])) {
        $cheat = "CHEAT: The correct answer is " . strval($_SESSION["game"]->number());
    }

    if ($_SESSION["game"]->tries() < 1 || $guess == $_SESSION["game"]->number()) {
        $status = "disabled";
    }

    $data["res"] = $res;
    $data["guess"] = $guess;
    $data["number"] = $number;
    $data["tries"] = $tries;
    $data["status"] = $status;
    $data["cheat"] = $cheat;

    $app->page->add("guess/index_session", $data);
    return $app->page->render($data);


});
