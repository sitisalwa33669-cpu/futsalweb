<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $lapangan = mysqli_real_escape_string($koneksi, $_POST['lapangan']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    $namaFile = '';

    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {
        if (!is_dir('upload')) {
            mkdir('upload', 0755, true);
        }

        $namaFile = basename($_FILES['bukti']['name']);
        $namaFile = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $namaFile);
        $tmp = $_FILES['bukti']['tmp_name'];
        move_uploaded_file($tmp, "upload/$namaFile");
    }

    mysqli_query(
        $koneksi,
        "INSERT INTO booking (nama_pelanggan, lapangan, tanggal, status, bukti) VALUES (
        '$nama',
        '$lapangan',
        '$tanggal',
        '$status',
        '$namaFile'
        )"
    );

    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h3>Tambah Booking</h3>

<form method="POST"
enctype="multipart/form-data">

<input type="text"
name="nama"
class="form-control mb-3"
placeholder="Nama Pelanggan"
required>

<select
name="lapangan"
class="form-control mb-3">

<option>Lapangan A</option>
<option>Lapangan B</option>
<option>Lapangan C</option>

</select>

<input type="date"
name="tanggal"
class="form-control mb-3"
required>

<select
name="status"
class="form-control mb-3">

<option>Booking</option>
<option>Selesai</option>

</select>

<input type="file"
name="bukti"
class="form-control mb-3">

<button
name="simpan"
class="btn btn-success">

Simpan

</button>

</form>

</div>

</body>
</html>