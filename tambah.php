<?php
require 'funs.php';
$conn = mysqli_connect("localhost", "root", "", "crud2");

if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "<script> alert('data berhasil diinput')
                       document.location.href = 'index.php'
                       </script>";
  } else {
    echo "<script>
        alert('data gagal diinput')
        document.location.href = 'index.php'
        </script>";
  };
};
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
    html {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h1 {
      margin-top: 7rem;
    }

    input {
      float: right;
    }
  </style>
</head>

<body>
  <h1>Tambah Data</h1>
  <br>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="">Nama : </label>
    <input type="text" name="nama">
    <br><br>
    <label for="">Nis : </label>
    <input type="text" name="nis">
    <br><br>
    <label for="">Rombel : </label>
    <input type="text" name="rombel">
    <br><br>
    <label for="">Rayon : </label>
    <input type="text" name="rayon">
    <br><br>
    <label for="">Status : </label>
    <input type="text" name="status">
    <br><br>
    <label for="">hobi : </label>
    <input type="text" name="hobi">
    <br><br>
    <label for="">alamat : </label>
    <input type="text" name="alamat">
    <br><br>
    <label for="">Cita-cita : </label>
    <input type="text" name="cita">
    <br><br>
    <label for="">Gambar : </label>
    <input type="file" name="gambar">
    <br><br>
    <button type="submit" name="submit">kirim</button>
    <button> <a style="text-decoration: none; color:black;" href="index.php">Kembali</a></button>

  </form>
</body>

</html>