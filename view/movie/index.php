<?php

namespace Anax\View;

?>
<?php
if (!$res) {
    return;
}
?>

<!doctype html>
<meta charset="utf-8">
<h1>Movies </h1>

<a href="movie/search"> Search for a title </a>
|
<a href="movie/select"> Select movie</a>


<table>
    <tr class="first">
        <th>Rad</th>
        <th>Id</th>
        <th>Bild</th>
        <th>Titel</th>
        <th>År</th>
    </tr>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $id ?></td>
        <td><?= $row->id ?></td>
        <td><img class="thumb" src="<?= $row->image ?>"></td>
        <td><?= $row->title ?></td>
        <td><?= $row->year ?></td>
    </tr>
<?php endforeach; ?>
</table>
