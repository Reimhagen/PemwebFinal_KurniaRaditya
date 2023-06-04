<?php
if (isset($_POST["username"])){

    $user=$_POST["username"];
    $pass=$_POST["password"];

    if($user=="215150200111031" && $pass=="KurniaRaditya")
    {
        //jika bisa login
        setcookie("shinobu", "Kurnia", time() + 1800);
        header("Location: index.php");
    }
    else
    {
        //jika !bisa login
        echo '<script type="text/javascript">alert("Login Gagal, Anda masuk sebagai tamu");</script>';
        header("Location: index_g.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laman Login</title>
</head>
<style>
    body {
        background-image: url('yoyi.jpg');
        background-repeat: no-repeat;
        background-position: center top;
        background-size: fill;
        background-color: rgba(0, 0, 0.5, 0.5);
        position: relative;
        z-index: -1;
        
    }

    table {
        position: relative;
        z-index: 1;
    }
</style>
<body>
    <h2>Login</h2>
    <form action="./sistem_login.php" method="post">
        <div class="username">
            Username
            <br>
            <input type="text"  name="username" id="username">
        </div>
        <div class="password">
            Password
            <br>
            <input type="password"  name="password" id="password">
        </div>
        <input type="submit" value="Masuk">
    </form>
</body>
</html>