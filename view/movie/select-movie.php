<?php

namespace Anax\View;

?>

<!doctype html>
<meta charset="utf-8">

<form method="post">
    <fieldset>
    <legend>Select Movie</legend>
    <p>
        <label>Movie:<br>
        <select name="movieId">
            <option value="">Select movie...</option>
            <?php foreach ($res as $movie) : ?>
            <option value="<?= $movie->id ?>"><?= $movie->title ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    </p>
    <p>
        <input type="submit" name="doEdit" value="Edit">
        <input type="submit" name="doCreate" value="Create">
        <input type="submit" name="doDelete" value="Delete">
    </p>
    </fieldset>
</form>
