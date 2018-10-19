<?php

namespace Anax\View;

?>
<!doctype html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

<h1> Content </h1>


<a href="content/create"> Create </a>
|
<a href="content/pages"> Pages </a>
|
<a href="content/blog"> Blog </a>
<?php
if (!$res) {
    return;
}
?>

<table>
    <tr class="first">
        <th>Rad</th>
        <th>Id</th>
        <th>Title</th>
        <th>Type</th>
        <th>Slug</th>
        <th>Published</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Deleted</th>
        <th>Actions</th>
    </tr>
<?php $id = -1; foreach ($res as $row) :
    $id++;
?>
    <tr>
        <td><?= $id ?></td>
        <td><?= $row->id ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->slug ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>
        <td><a href="content/edit?id=<?= $row->id ?>"><i class="far fa-edit"></i></a></td>
        <td><a href="content/delete?id=<?= $row->id ?>"><i class="far fa-trash-alt"></i></a></td>
    </tr>
<?php endforeach; ?>
</table>
