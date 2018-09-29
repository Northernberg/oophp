<?php

namespace Anax\View;

?>
<!doctype html>
<meta charset="utf-8">
<title>Dice 100 </title>
<h1>Dice 100 game </h1>

<form method="POST" action="dice/start">
    <label for="name"> Choose name </label>
    <input type="text" name="name">
    <input type="submit" name="startGame" value="Start game">
</form>
