<?php

namespace Anax\View;

?>

<!doctype html>
<meta charset="utf-8">

<form method="post">
    <fieldset>
    <legend>Delete content</legend>
    <p>
        <label>Title:
            <input type="text" name="contentTitle" value="<?= $res->title ?>"/>
        </label>
    </p>
    <p>
        <input type="submit" name="doDelete" value="Delete"> 
    </p>

</form>
