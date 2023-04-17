<?php

require 'funs.php';
$students = query("SELECT * FROM marga");

if (isset($_POST["cari"]))
  $students = cari($_POST["keyword"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .cari {
      display: flex;
      justify-content: center;
    }

    html {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <br>
  <h1 style="text-align:center;">Data</h1>
  <a style="text-decoration: none; color:black; font-size:20px" href="tambah.php">Tambah Data</a>

  <div class="cari">
    <form action="" method="post">
      <input type="text" name="keyword" size="20" autocomplete="off">
      <button type="submit" name="cari">Cari</button>
    </form>
  </div>
  <br>

  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Nis</th>
        <th>Rombel</th>
        <th>Rayon</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($students as $student) { ?>
        <tr>
          <td><?= $i; ?></td>
          <td><img src="img/<?= $student['gambar']; ?>" width="50"></td>
          <td><?= $student["nama"]; ?></td>
          <td><?= $student["nis"]; ?></td>
          <td><?= $student["rombel"]; ?></td>
          <td><?= $student["rayon"]; ?></td>
          <td><?= $student["status"]; ?></td>
          <td>
            <a style="text-decoration: none; color:black;" href="delete.php?id=<?= $student["id"] ?>" onclick="return confirm('Hapus data?');">Delete</a>
            |
            <a style="text-decoration: none; color:black;" href="update.php?id=<?= $student["id"] ?>">Update</a>
            |
            <a style="text-decoration: none; color:black;" href="lihat.php?id=<?= $student["id"] ?>">Lihat</a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php } ?>

    </tbody>

  </table>


</body>

</html>