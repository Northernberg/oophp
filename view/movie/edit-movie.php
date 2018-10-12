<?php

namespace Anax\View;

?>

<!doctype html>
<meta charset="utf-8">

<form method="post">
    <fieldset>
    <legend>Edit Movie</legend>
    <p>
        <label>Title:
            <input type="text" name="movieTitle" value="<?= $movie->title ?>"/>
        </label>
    </p>
    <p>
        <label>Year:
            <input type="number" name="movieYear" value="<?= $movie->year ?>" max="9999"/>
        </label>
    </p>
    <p>
        <label>Image:
            <input type="text" name="movieImage" value="<?= $movie->image ?>"/>
        </label>
    </p>
    <p>
        <input type="submit" name="doSave" value="Save">
    </p>
    </fieldset>
</form>
