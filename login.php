<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM users
         WHERE username='$username'
         AND password='$password'"
    );

    if(mysqli_num_rows($cek) > 0){

        $_SESSION['login'] = true;
        header("Location:index.php");

    }else{

        echo "<script>
        alert('Username atau Password Salah');
        window.location='login.php';
        </script>";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2>Login Admin</h2>

<form method="POST">

<input type="text"
name="username"
class="form-control mb-3"
placeholder="Username">

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password">

<button
type="submit"
name="login"
class="btn btn-primary">
Login
</button>

</form>

</div>

</body>
</html>