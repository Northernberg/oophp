<?php

namespace Anax\View;

?>

<!doctype html>
<meta charset="utf-8">

<form method="get">
    <fieldset>
    <legend>Search</legend>
    <p>
        <label>Title (use % as wildcard):
            <input type="search" name="searchTitle" value=""/>
        </label>
    </p>
    <p>
        <input type="submit" name="doSearch" value="Search">
    </p>
    <p><a href="?searchTitle=%">Show all</a></p>
    </fieldset>
</form>

<?php if ($res) : ?>
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
        <td><img class="thumb" src="../<?= $row->image ?>"></td>
        <td><?= $row->title ?></td>
        <td><?= $row->year ?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php endif;?>
