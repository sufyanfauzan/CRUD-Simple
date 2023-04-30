<?php
require 'funs.php';

$id = $_GET["id"];
$student = query("SELECT * FROM marga WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script> alert('data berhasil diubah')
                       document.location.href = 'index.php'
                       </script>";
    } else {
        echo "<script>
        alert('data tidak berhasil diubah')
        document.location.href = 'index.php'
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/tu.css">
</head>

<body>
    <h1>Update Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $student["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $student['gambar']; ?>">
        <br><br>
        <label for="">Nama : </label>
        <input type="text" name="nama" value="<?= $student["nama"]; ?>">
        <br><br>
        <label for="">Nis : </label>
        <input type="text" name="nis" value="<?= $student["nis"]; ?>">
        <br><br>
        <label for="">Rombel : </label>
        <input type="text" name="rombel" value="<?= $student["rombel"]; ?>">
        <br><br>
        <label for="">Rayon : </label>
        <input type="text" name="rayon" value="<?= $student["rayon"]; ?>">
        <br><br>
        <label for="">Status : </label>
        <input type="text" name="status" value="<?= $student["status"]; ?>">
        <br><br>
        <label for="">Hobi : </label>
        <input type="text" name="hobi" value="<?= $student["hobi"]; ?>">
        <br><br>
        <label for="">alamat : </label>
        <input type="text" name="alamat" value="<?= $student["alamat"]; ?>">
        <br><br>
        <label for="">cita : </label>
        <input type="text" name="cita" value="<?= $student["cita"]; ?>">
        <br><br>
        <label for="">Gambar : </label>
        <img src=" img/<?= $student['gambar']; ?>" width="150"> <br><br>
        <input type="file" name="gambar">
        <script src="index.js"></script>
        <br><br>
        <button type="submit" name="submit">Update</button>
        <button> <a style="text-decoration: none; color:black;" href="index.php">Kembali</a></button>
    </form>
    <br>
</body>

</html>