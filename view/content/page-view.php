<?php

namespace Anax\View;

?>
<!doctype html>
<html>
<meta charset="utf-8">

<article>
    <header>
        <h1> <?= $res->title ?> </h1>
        <p><i>Latest update: <time datetime="<?=$res->modified_iso8601 ?>" pubdate><?= $res->modified ?></time></i></p>
    </header>
    <?= $res->data ?>
</article>
