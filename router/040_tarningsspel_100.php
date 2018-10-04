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

    if ($app->session->get("dice") == null) {
        $app->session->set("dice", new \Guno\Dice100\CurrentGame($app->request->getPost("name")));
    }

    if ($app->session->get("histogram") == null) {
        $histo = new \Guno\Dice100\Histogram();
        $histo2 = new \Guno\Dice100\Histogram();

        $app->session->set("histogram", $histo);
        $app->session->set("histogramBot", $histo2);
    }

    $histogram = $app->session->get("histogram");
    $histogramBot = $app->session->get("histogramBot");
    $dice = $app->session->get("dice");

    if ($app->request->getPost("reset") != null) {
        session_destroy();
        header("Location: ../dice");
        exit();
    }

    if ($app->request->getPost("startGame") != null) {
        $dice->decideStarter();
    }

    if ($app->request->getPost("roll") != null) {
        $dice->playDice();
        $histogram->addValues($dice->values());
    }

    if ($app->request->getPost("stay") != null) {
        $dice->saveScore();
    }

    if ($app->request->getPost("continue") != null) {
        if ($dice->getPlayers()[$dice->getTurn()]->getScore() >= 100) {
        } else {
            $dice->turn();
        }
    }

    if ($dice->getTurn() == 1) {
        do {
            $dice->playDice();
            $histogramBot->addValues($dice->values());

            $players = $dice->getPlayers();
            $player = $players[0];
            $bot = $players[1];
            $current = $dice->getScorePool();
        } while ($player->getScore() - ($bot->getScore() + $current) >= 10);

        $dice->saveScore();
    }

    $data["dice"] = $dice;


    $app->page->add("dice100/dice_game", $data);
    return $app->page->render($data);
});
