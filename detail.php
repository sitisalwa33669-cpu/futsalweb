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
?>

<!DOCTYPE html>
<html>
<head>
<title>Detail Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h2>Detail Booking</h2>

<table class="table">

<tr>
<td>Nama</td>
<td><?= $d['nama_pelanggan'] ?></td>
</tr>

<tr>
<td>Lapangan</td>
<td><?= $d['lapangan'] ?></td>
</tr>

<tr>
<td>Tanggal</td>
<td><?= $d['tanggal'] ?></td>
</tr>

<tr>
<td>Status</td>
<td><?= $d['status'] ?></td>
</tr>

<tr>
<td>Bukti</td>
<td>

<img
src="upload/<?= $d['bukti'] ?>"
width="250">

</td>
</tr>

</table>

<a href="index.php"
class="btn btn-primary">

Kembali

</a>

</div>

</body>
</html>