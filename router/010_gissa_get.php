<?php
/**
 * Guess game
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Guess my number with GET
 */
$app->router->get("gissa/get", function () use ($app) {
    $guess = $_GET["guess"] ?? null;
    $number = $_GET["number"] ?? -1;
    $tries = $_GET["tries"] ?? 6;

    $game = new \Guno\Guess\Guess($number, $tries);

    $res = null;
    $cheat = null;
    $status = null;
    if (isset($_GET["doGuess"])) {
        $res = $game->makeGuess($guess);
    }

    if (isset($_GET["reset"])) {
        $number = $game->random();
        $tries = 6;
    }

    if (isset($_GET["doCheat"])) {
        $cheat = "CHEAT: The correct answer is " . strval($game->number());
    }

    if ($game->tries() < 1 || $guess == $game->number()) {
        $status = "disabled";
    }

    $data = [
        "title" => "Guess game get",
        "game" => $game,
        "res" => $res,
        "guess" => $guess,
        "status" => $status,
        "cheat" => $cheat
    ];

    $app->page->add("guess/index_get", $data);
    return $app->page->render($data);

});
