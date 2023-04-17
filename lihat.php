<?php

require 'funs.php';

$id = $_GET["id"];

$student = query("SELECT * FROM marga WHERE id= $id")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>CRUD</title>

  <style>
    html,
    p,
    img {
      display: flex;
      justify-content: center;
    }

    .card {
      margin-top: 5rem;
      width: 500px;
      height: 100%;
      border-radius: 30px;
      background: white;
      box-shadow: 15px 15px 30px #bebebe,
        -15px -15px 30px #ffffff;
    }

    img {
      margin-top: 65px;
      width: 150px;
    }

    p {
      font-size: 23px;
    }

    h1 {
      margin-top: 20px;
    }
  </style>
</head>

<body>


  <div class="card">
    <h1 style="text-align:center; padding-top:5rem;">Data Lengkap</h1>

    <p> <img src="img/<?= $student['gambar']; ?>" width="50"></p>
    <p><?= $student["nama"] ?></p>
    <p><?= $student["nis"] ?></p>
    <p><?= $student["rombel"] ?></p>
    <p><?= $student["rayon"] ?></p>
    <p><?= $student["status"] ?></p>
    <p><?= $student["hobi"] ?></p>
    <p><?= $student["alamat"] ?></p>
    <p><?= $student["cita"] ?></p>
    <p style="text-align:center;"><a style="text-decoration: none;" href="index.php">Kembali</a></p>

  </div>


</body>

</html>