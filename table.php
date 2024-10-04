<?php
session_start();
require 'backend.php';

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

$data = query("SELECT * FROM allsmartphone");



?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="smartphone/exophonelogo.webp" type="image/x-icon">
  <title>table</title>
</head>

<body>
  <table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th>no</th>
      <th>image</th>
      <th>name</th>
      <th>action</th>
    </tr>
    <?php $id = 1; ?>
    <?php foreach ($data as $d) : ?>
      <tr>
        <td><?= $id; ?></td>
        <td><img src="smartphone/<?= $d["image"]; ?>" alt="" style="width: 160px; height:212px;"></td>
        <td><?= $d["name"]; ?></td>
        <td>
          <button><a href="edit.php?id=<?= $d["id"]; ?>">Edit</a></button>
          <button><a href="delete.php?id=<?= $d["id"]; ?>" onclick="return confirm('you want to delete')">Hapus</a></button>
        </td>
      </tr>
      <?php $id++ ?>
    <?php endforeach ?>
  </table>
</body>

</html>