<?php
include "koneksi.php";

if(isset($_POST['register'])){

$nia = $_POST['nia'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$query = mysqli_query($conn,"INSERT INTO users (nia,password,role) 
VALUES ('$nia','$password','$role')");

if($query){
    echo "<script>alert('Akun berhasil dibuat'); window.location='login.php';</script>";
}else{
    echo "Gagal daftar";
}

}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <link rel="stylesheet" href="login.css">
</head>

<body class="login-background">

<div class="login-container">

    <div class="login-header">
        DAFTAR AKUN
    </div>

    <form method="POST">

        <label>NIA</label>
        <div class="input-icon">
            <input type="text" name="nia" required>
        </div>

        <label>Password</label>
        <div class="input-icon">
            <input type="password" name="password" required>
        </div>

        <label>Role</label>
        <div class="input-icon">
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" name="register" class="btn-login">
            DAFTAR
        </button>

        <div class="register-text">
            Sudah punya akun? <a href="login.php">Login</a>
        </div>

    </form>

</div>

</body>
</html>