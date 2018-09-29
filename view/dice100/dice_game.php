<?php

namespace Anax\View;

?>
<!doctype html>
<meta charset="utf-8">
<title>Dice 100 </title>
<h1>Dice 100 game </h1>

<?php if ($_SESSION["dice"]->getPlayers()[$_SESSION["dice"]->getTurn()]->getScore() < 100) { ?>
    <form method="POST">
        <input type="submit" name="roll" value="Roll dice" <?=  isset($_POST["stay"]) ||isset($_POST["roll"]) && $_SESSION["dice"]->getScorePool() == 0 || $_SESSION["dice"]->getTurn() == 1 ? "disabled" : ""; ?>>
        <input type="submit" name="stay" value="Save value" <?= isset($_POST["roll"]) && $_SESSION["dice"]->getScorePool() == 0 || isset($_POST["stay"]) || $_SESSION["dice"]->getTurn() == 1 ? "disabled" : ""; ?>>
        <input type="submit" name="reset" value="Reset game">
    </form>
<?php } else { ?>
    <form method="POST">
        <input type="submit" name="reset" value="Reset game">
    </form>
<?php }; ?>

<?php if (isset($_POST["roll"]) && $_SESSION["dice"]->getScorePool() == 0) :?>
    <p> You rolled a 1! Next turn and you lose all your score. </p>
<?php endif; ?>


<p><?= $_SESSION["dice"]->getPlayers()[$_SESSION["dice"]->getTurn()]->getName() ?> Turn.</p>
<ul>
    <?php foreach ($_SESSION["dice"]->getPlayers() as $p) : ?>
        <li> player <?= $p->getName() ?> Score: <?= $p->getScore() ?></li>
    <?php endforeach; ?>
</ul>

<?php if (isset($_POST["roll"]) || $_SESSION["dice"]->getTurn() == 1) :?>
    <p>
        <?= $_SESSION["dice"]->getPlayers()[$_SESSION["dice"]->getTurn()]->getName() ?>
        rolled
        <?= $_SESSION["dice"]->getScorePool() ?>
    </p>
<?php endif; ?>

<?php if (isset($_POST["stay"])) : ?>
    <p> You saved <?= $_SESSION["dice"]->getScorePool()?> </p>
<?php endif; ?>


<p class="dice-utf8">
<?php if (isset($_POST["roll"]) || $_SESSION["dice"]->getTurn() == 1) : ?>
    <?php foreach ($_SESSION["dice"]->graphic() as $dice) { ?>
        <i class="<?= $dice ?>"></i>
    <?php }; ?>
<?php endif; ?>


<?php if (isset($_POST["stay"]) || isset($_POST["roll"]) && $_SESSION["dice"]->getScorePool() == 0 || $_SESSION["dice"]->getTurn() == 1) : ?>
    <?php if ($_SESSION["dice"]->getPlayers()[$_SESSION["dice"]->getTurn()]->getScore() >= 100) {?>
        <h1> GAME OVER  <?= $_SESSION["dice"]->getPlayers()[$_SESSION["dice"]->getTurn()]->getName() ?> WINS</h1>
    <?php } else { ?>
        <form method="POST">
            <input type="submit" name="continue" value="Continue">
        </form>
    <?php }; ?>
<?php endif; ?>
