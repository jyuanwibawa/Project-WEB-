<?php
include "koneksi.php"; // Sertakan file koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ulangpassword = $_POST['ulangpassword'];

    // Pastikan password dan konfirmasi password cocok
    if ($password == $ulangpassword) {
        // Query untuk menyimpan pengguna baru ke dalam tabel
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            header("location: login.php"); // Redirect ke halaman login setelah registrasi berhasil
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $error = "Password tidak cocok";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dua Bagian - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .container {
            display: flex;
            height: 100%;
        }

        .left {
            flex: 1;
            background-color: #ffffff;
            /* Ubah warna latar belakang */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .right {
            flex: 1;
            background-color: #4c845c;
            /* Ubah warna latar belakang */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .register-form {
            width: 100%;
            max-width: 550px;
            /* Lebarkan form */
            margin-top: 1vh;
        }

        .register-form input,
        .register-form button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .register-form button {
            background-color: white;
            /* Ubah warna tombol */
            color: black;
            height: 50px;
            border: none;
            cursor: pointer;
            margin-top: 20%;
            /* Menyesuaikan posisi tombol */
        }

        .logo {
            font-size: 4em;
            color: #4c845c;
            /* Ubah warna logo */
            margin-top: 35vh;
        }

        .offer {
            font-size: 1.5em;
            color: #4c845c;
            /* Ubah warna teks tawaran */
            margin-top: 25%;
        }

        .header-text {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 1.5em;
            font-weight: bold;
            color: #4c845c;
            /* Ubah warna teks header */
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="header-text">ECOHERO</div>
            <div class="logo">LOGO</div>
            <div class="offer">Start for free and get <br> attractive offers</div>
        </div>

        <div class="right">
            <div style=" margin-right:350px; margin-bottom:30px;">
                <span style="font-size: 2em; color:#ffffff">Get’s started</span> <br>
                <span style="font-size: 1em; color: #ffffff;">Already have an account? <a href="login.php">Log in</a></span>
            </div>

            <form class="register-form" action="#" method="post" style="text-align: center;">
                <h2 style="text-align: center; color: #ccc; ">Register</h2>
                <input type="text" name="username" placeholder="Username" required style="height: 50px;">
                <input type="password" name="password" placeholder="Password" required style="height: 50px;">
                <input type="password" name="ulangpassword" placeholder="Ulang Password" required style="height: 50px;">
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>

</html>
