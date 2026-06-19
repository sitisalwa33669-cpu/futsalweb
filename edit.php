<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM booking WHERE id='$id'"
);

$d = mysqli_fetch_array($data);

if (!$d) {
    header("Location:index.php");
    exit;
}

if(isset($_POST['update'])){

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $lapangan = mysqli_real_escape_string($koneksi, $_POST['lapangan']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    mysqli_query(
        $koneksi,
        "UPDATE booking SET

        nama_pelanggan='$nama',
        lapangan='$lapangan',
        tanggal='$tanggal',
        status='$status'

        WHERE id='$id'
        "
    );

    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Edit Booking</h2>

<form method="POST">

<input
type="text"
name="nama"
value="<?= $d['nama_pelanggan'] ?>"
class="form-control mb-3">

<select
name="lapangan"
class="form-control mb-3">

<option><?= $d['lapangan'] ?></option>
<option>Lapangan A</option>
<option>Lapangan B</option>
<option>Lapangan C</option>

</select>

<input
type="date"
name="tanggal"
value="<?= $d['tanggal'] ?>"
class="form-control mb-3">

<select
name="status"
class="form-control mb-3">

<option><?= $d['status'] ?></option>
<option>Booking</option>
<option>Selesai</option>

</select>

<button
name="update"
class="btn btn-success">

Update

</button>

</form>

</div>

</body>
</html>