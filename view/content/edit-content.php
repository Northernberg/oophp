<?php

namespace Anax\View;

?>

<!doctype html>
<meta charset="utf-8">

<form method="post">
    <fieldset>
    <legend>Edit content</legend>
    <p>
        <label>Title:
            <input type="text" name="contentTitle" value="<?= $res->title ?>"/>
        </label>
    </p>
    <p>
        <label>Path:
            <input type="text" name="contentPath" value="<?= $res->path ?>"/>
        </label>
    </p>
    <p>
        <label>Slug:
            <input type="text" name="contentSlug" value="<?= $res->slug ?>"/>
        </label>
    </p>

    <p>
        <label>Text:
            <textarea name="contentData"><?= $res->data ?> </textarea>
        </label>
    </p>

    <p>
        <label>Type:
            <input type="text" name="contentType" value="<?= $res->type ?>"/>
        </label>
    </p>

    <p>
        <label>Filter:
            <input type="text" name="contentFilter" value="<?= $res->filter ?>"/>
        </label>
    </p>

    <p>
        <label>Published:
            <input type="datetime" name="contentPublished" value="<?= $res->published ?>"/>
        </label>
    </p>
    <p>
        <input type="submit" name="doSave" value="Save">
    </p>
    </fieldset>
</form>
