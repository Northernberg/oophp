<?php
/**
 * Tärningsspel
 */



/**
 * Tärningsspel start meny
 */
$app->router->any(["GET", "POST"], "dice", function () use ($app) {
    $data = [
        "title" => "Guess game heyyy"
    ];

    $app->page->add("dice100/dice_start", $data);
    return $app->page->render($data);
});

/**
 * Tärningsspelet
 */

$app->router->any(["GET", "POST"], "dice/start", function () use ($app) {
    $data = [
        "title" => "Guess game get"
    ];

    if (!isset($_SESSION["dice"])) {
        $_SESSION["dice"] = new \Guno\Dice100\CurrentGame($_POST["name"]);
    }

    if (isset($_POST["reset"])) {
        session_destroy();
        header("Location: ../dice");
        exit();
    }

    if (isset($_POST["startGame"])) {
        $_SESSION["dice"]->decideStarter();
    }

    if (isset($_POST["roll"])) {
        $_SESSION["dice"]->playDice();
    }

    if (isset($_POST["stay"])) {
        $_SESSION["dice"]->saveScore();
    }

    if (isset($_POST["continue"])) {
        if ($_SESSION["dice"]->getPlayers()[$_SESSION["dice"]->getTurn()]->getScore() >= 100) {
        } else {
            $_SESSION["dice"]->turn();
        }
    }

    if ($_SESSION["dice"]->getTurn() == 1) {
        $_SESSION["dice"]->playDice();
        $_SESSION["dice"]->saveScore();
    }


    $app->page->add("dice100/dice_game", $data);
    return $app->page->render($data);
});
