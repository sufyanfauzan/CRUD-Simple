<?php

$conn = mysqli_connect("localhost", "root","","crud2");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $wadah = [];
  while ($cr = mysqli_fetch_assoc($result)) {
    $wadah[] = $cr;
  }
  return $wadah;
}
function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $rombel = htmlspecialchars($data["rombel"]);
    $rayon = htmlspecialchars($data["rayon"]);
    $status = htmlspecialchars($data["status"]);
		$hobi = htmlspecialchars($data["hobi"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$cita = htmlspecialchars($data["cita"]);
    $gambar = upload();
	if( !$gambar ) {
		return false;

		
	}

    $query = "INSERT INTO marga
            VALUES
            ('', '$nama', '$nis', '$rombel', '$rayon', '$status', '$hobi', '$alamat', '$cita', '$gambar') ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
                document.location.href= 'tambah.php';
			  </script>";
		return false;
	}

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
                document.location.href= 'tambah.php';
			  </script>";
		return false;
	}

	if( $ukuranFile > 2000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
                document.location.href= 'tambah.php';
			  </script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM marga WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $rombel = htmlspecialchars($data["rombel"]);
    $rayon = htmlspecialchars($data["rayon"]);
    $status = htmlspecialchars($data["status"]);
		$hobi = htmlspecialchars($data["hobi"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$cita = htmlspecialchars($data["cita"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
	
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
    $query = "UPDATE marga SET
       nama = '$nama',
       nis = '$nis',
       rombel = '$rombel',
       rayon = '$rayon',
       status = '$status',
       hobi = '$hobi',
       alamat = '$alamat',
       cita = '$cita',
			 gambar = '$gambar'
       WHERE id = $id
       ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM marga WHERE
    nama LIKE '%$keyword%' OR
    nis LIKE '%$keyword%' OR
    rombel LIKE '%$keyword%' OR
    rayon LIKE '%$keyword%' OR
    status LIKE '%$keyword%' 
    ";
    return query($query);
}
