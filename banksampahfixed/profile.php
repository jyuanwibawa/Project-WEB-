<?php
session_start();

// Sertakan file koneksi
include "koneksi.php";

// Periksa jika pengguna belum login, jika belum, redirect ke halaman login
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    exit; // Pastikan kode berhenti di sini
}

// Variabel untuk menyimpan pesan kesalahan atau sukses
$message = '';

// Jika formulir pengeditan dikirimkan
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    // Query untuk memperbarui detail pengguna
    $updateQuery = "UPDATE users SET username = '$newUsername', password = '$newPassword' WHERE username = '{$_SESSION['login_user']}'";

    if ($conn->query($updateQuery) === TRUE) {
        // Perbarui sesi dengan username baru jika berhasil
        $_SESSION['login_user'] = $newUsername;
        $message = "Detail pengguna berhasil diperbarui.";
    } else {
        $message = "Error: " . $updateQuery . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Tambahkan styling -->
    <style>
        /* Style untuk navbar */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #4c845c;
            display: flex;
            justify-content: center;
        }

        li {
            display: inline;
        }

        .nav-center {
            flex: 1;
            display: flex;
            justify-content: center;
            margin-left: 50px;
        }

        .nav-left span {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            color: white;
            display: flex;
            justify-content: flex-end;
            flex: 0 0 auto;
            margin-top: 7px;
            margin-left: 20px;
            /* Jarak dari daftar menu */
        }

        .nav-right {
            display: flex;
            justify-content: flex-end;
            flex: 0 0 auto;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <ul>
        <div class="nav-left">
            <span>ECOHERO</span>
        </div>
        <div class="nav-center">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="information.php">Information</a></li>
        </div>
        <div class="nav-right">
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </div>
        <div class="nav-right">
            <li><a href="profile.php">Profile</a></li>
        </div>
    </ul>

    <!-- Konten profil -->
    <h1>Profile</h1>
    <h2>Selamat Datang, <?php echo $_SESSION['login_user']; ?></h2>

    <!-- Tampilkan pesan kesalahan atau sukses -->
    <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- Formulir untuk mengedit detail pengguna -->
    <form method="post">
        <label for="new_username">Username Baru:</label><br>
        <input type="text" id="new_username" name="new_username" required><br>
        <label for="new_password">Password Baru:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <input type="submit" value="Simpan Perubahan">
    </form>

    <br><br>
    <a href="logout.php">Logout</a>

</body>
</html>
