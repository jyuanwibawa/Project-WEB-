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
    <title>Informasi</title>
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

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .card {
            position: relative;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            text-align: center;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }

        .card h3 {
            margin: 10px 0;
        }

        .card p {
            margin: 5px 0;
        }

        .card-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .card-actions-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .card-actions-row button {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* New styles for button back */
        .back-button-container {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
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

    <h1 style="text-align: center; position: relative; padding-top:50px;"> <!-- Modified -->
        <div class="back-button-container"> <!-- Added -->
            <button style="margin-top:40px;margin-left:90px; background-color: #4c845c; color: white; border: none; padding: 10px; font-size: 16px; cursor: pointer; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; width: 60px; height: 60px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
        </div>
        Information
    </h1>
    <div style="background-color: #4c845c; height: 100%; border-radius: 20px; width: 60%; margin: 0 auto;">


        <div class="card-container">
            <?php
            $userId = $_SESSION['login_user'];
            $sql = "SELECT * FROM sampah WHERE user_id = '$userId'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<img src='" . $row["gambar_sampah"] . "' alt='" . $row["nama_sampah"] . "'>";
                    echo "<p style='text-align: left;'>" . $row["kategori"] . "</p>";
                    echo "<p style='text-align: left;'>" . $row["deskripsi_sampah"] . "</p>";
                    echo "<div class='card-actions'>";
                    echo "<div class='card-actions-row'>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Belum ada data sampah yang diinput.";
            }
            ?>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>