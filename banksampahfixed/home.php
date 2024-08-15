<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

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

        .nav-right {
            display: flex;
            justify-content: flex-end;
            flex: 0 0 auto;
        }
        .nav-left span {
            font-family: 'Poppins', sans-serif; /* Gaya font Poppins */
            font-size: 24px; /* Ukuran font */
            color: white; /* Warna teks */
            display: flex;
            justify-content: flex-end;
            flex: 0 0 auto;
            margin-top: 7px;
            margin-left: 20px; /* Jarak dari daftar menu */
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

    <!-- background -->
    <div style="background-color: #4c845c; height: 200px; position: relative;">
        <h1 style="margin-left: 30px;">Hallo!,<br>
            <?php echo $_SESSION['login_user']; ?>
        </h1>
    </div>

    <!-- konten lingkaran -->
    <div style="text-align: center; margin-top: 150px;">
        <div style="text-align: center; display: inline-block; margin-right: 20px;">
            <a href="location.php" style="text-decoration: none; color: #4c845c;">
                <div style="width: 70px; height: 70px; border-radius: 50%; background-color: #4c845c; display: inline-block;"></div>
                <div style="font-size: 16px; color: #333;">Location</div>
            </a>
        </div>
        <div style="text-align: center; display: inline-block; margin-right: 20px;">
            <a href="education.php" style="text-decoration: none; color: #4c845c;">
                <div style="width: 70px; height: 70px; border-radius: 50%; background-color: #4c845c; display: inline-block;"></div>
                <div style="font-size: 16px; color: #333;">Education</div>
            </a>
        </div>
        <div style="text-align: center; display: inline-block;">
            <a href="information.php" style="text-decoration: none; color: #4c845c ;">
                <div style="width: 70px; height: 70px; border-radius: 50%; background-color: #4c845c; display: inline-block;"></div>
                <div style="font-size: 16px; color: #333;">Information</div>
            </a>
        </div>
    </div>

</body>

</html>