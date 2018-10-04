<?php

namespace Anax\View;

?>
<!doctype html>
<meta charset="utf-8">
<title>Dice 100 </title>
<h1>Dice 100 game </h1>

<?php if ($dice->getPlayers()[$dice->getTurn()]->getScore() < 100) { ?>
    <form method="POST">
        <input type="submit" name="roll" value="Roll dice" <?=  $app->request->getPost("stay") != null || $app->request->getPost("roll") != null && $dice->getScorePool() == 0 || $dice->getTurn() == 1 ? "disabled" : ""; ?>>
        <input type="submit" name="stay" value="Save value" <?= $app->request->getPost("roll") != null && $dice->getScorePool() == 0 || $app->request->getPost("stay") != null || $dice->getTurn() == 1 ? "disabled" : ""; ?>>
        <input type="submit" name="reset" value="Reset game">
    </form>
<?php } else { ?>
    <form method="POST">
        <input type="submit" name="reset" value="Reset game">
    </form>
<?php }; ?>

<?php if ($app->request->getPost("roll") != null && $dice->getScorePool() == 0) :?>
    <p> You rolled a 1! Next turn and you lose all your score. </p>
<?php endif; ?>


<p><?= $dice->getPlayers()[$dice->getTurn()]->getName() ?> Turn.</p>
<ul>
    <?php foreach ($dice->getPlayers() as $p) : ?>
        <li> player <?= $p->getName() ?> Score: <?= $p->getScore() ?></li>
    <?php endforeach; ?>
</ul>

<?php if ($app->request->getPost("roll") != null || $dice->getTurn() == 1) :?>
    <p>
        <?= $dice->getPlayers()[$dice->getTurn()]->getName() ?>
        rolled
        <?= $dice->getScorePool() ?>
    </p>
<?php endif; ?>

<?php if ($app->request->getPost("stay") != null) : ?>
    <p> You saved <?= $dice->getScorePool()?> </p>
<?php endif; ?>


<p class="dice-utf8">
<?php if ($app->request->getPost("roll") != null || $dice->getTurn() == 1) : ?>
    <?php foreach ($dice->graphic() as $value) { ?>
        <i class="<?= $value ?>"></i>
    <?php }; ?>
<?php endif; ?>
</p>


<p> Player histogram
<?= $app->session->get("histogram")->getAsText() ?>
</p>

<p> Bot histogram
<?= $app->session->get("histogramBot")->getAsText() ?>
</p>

<?php if ($app->request->getPost("stay") != null || $app->request->getPost("roll") != null && $dice->getScorePool() == 0 || $dice->getTurn() == 1) : ?>
    <?php if ($dice->getPlayers()[$dice->getTurn()]->getScore() >= 100) {?>
        <h1> GAME OVER  <?= $dice->getPlayers()[$dice->getTurn()]->getName() ?> WINS</h1>
    <?php } else { ?>
        <form method="POST">
            <input type="submit" name="continue" value="Continue">
        </form>
    <?php }; ?>
<?php endif; ?>
