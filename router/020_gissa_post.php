<?php
/**
 * Guess game
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Guess my number with POST
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {
    $guess = $_POST["guess"] ?? null;
    $number = $_POST["number"] ?? -1;
    $tries = $_POST["tries"] ?? 6;

    $game = new \Guno\Guess\Guess($number, $tries);

    $status = null;
    $res = null;
    $cheat = null;

    if (isset($_POST["reset"])) {
        $game->setNumber($game->random());
        $game->setTries(6);
        echo $tries;
    }

    if (isset($_POST["doGuess"])) {
        $res = $game->makeGuess($guess);
    }

    if (isset($_POST["doCheat"])) {
        $cheat = "CHEAT: The correct answer is " . strval($game->number());
    }

    if ($game->tries() < 1 || $guess == $game->number()) {
        $status = "disabled";
    }
    echo $game->tries();

    $data = [
        "title" => "Guess game post",
        "tries" => $tries,
        "number" => $number,
        "game" => $game,
        "res" => $res,
        "guess" => $guess,
        "status" => $status,
        "cheat" => $cheat
    ];

    $app->page->add("guess/index_post", $data);
    return $app->page->render($data);

});
