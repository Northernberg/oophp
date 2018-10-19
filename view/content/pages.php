<?php

namespace Anax\View;

?>
<!doctype html>
<html>
<meta charset="utf-8">
<h1> Pages </h1>

<?php
if (!$res) {
    return;
}
?>

<table>
    <tr class="first">
        <th>Id</th>
        <th>Title</th>
        <th>Type</th>
        <th>Status</th>
        <th>Published</th>
        <th>Deleted</th>
    </tr>
<?php $id = -1; foreach ($res as $row) :
    $id++;
?>
    <tr>
        <td><?= $row->id ?></td>
        <td><a href ="pages/<?= $row->path == null ? '404' : $row->path ?>"><?= $row->title ?></a></td>
        <td><?= $row->type ?></td>
        <td><?= $row->status ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->deleted ?></td>
    </tr>
<?php endforeach; ?>
</table>
