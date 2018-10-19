<?php

namespace Anax\View;

?>
<!doctype html>
<html>
<meta charset="utf-8">
<h1> Bloglist </h1>

<?php
if (!$res) {
    return;
}
?>
<article>
    
<?php foreach ($res as $row) : ?>
<section>
    <header>
        <h1><a href="blog/<?=$row->slug?>"> <?= $row->title ?> </a></h1>
        <p><i>Latest update: <time datetime="<?=$row->published_iso8601 ?>" pubdate><?= $row->published ?></time></i></p>
    </header>
    <?= $row->data ?>
</section>
<?php endforeach; ?>

</article>
