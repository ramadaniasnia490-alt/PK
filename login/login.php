<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
    $nia = $_POST['nia'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE nia='$nia'");
    $data = mysqli_fetch_assoc($query);

    if($data && password_verify($password,$data['password'])){
        $_SESSION['nia'] = $data['nia'];
        $_SESSION['role'] = $data['role'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('NIA atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Akun</title>
    <link rel="stylesheet" href="login.css">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="login-background">

<div class="login-container">
    <div class="login-header">
        LOGIN AKUN
    </div>

    <form method="POST">

        <label>NIA</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            <input type="text" name="nia" placeholder="Masukkan NIA" required>
        </div>

        <label>Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Masukkan Password" required>
        </div>

        <button class="btn-login" name="login">MASUK</button>

        <p class="register-text">
            Belum punya akun? <a href="register.php">Daftar</a>
        </p>

    </form>
</div>

</body>
</html>