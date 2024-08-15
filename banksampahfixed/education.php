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
    <title>Education</title>
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

        /* New styles for button back */
        .back-button-container {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .pic-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
        }

        .pic-container img {
            width: 100%;
            height: auto;
        }

        /* Settings start */
        .justified-grid-gallery {
            --space: 4px;
            --min-height: 190px;
            --last-row-background: rgb(188 234 153);
        }

        /* Settings end */

        .justified-grid-gallery {
            display: flex;
            flex-wrap: wrap;
            grid-gap: var(--space);
            list-style: none;
            margin: 0 !important;
            padding: 0 !important;
        }

        .justified-grid-gallery>* {
            flex-grow: calc(var(--width) * (100000 / var(--height)));
            flex-basis: calc(var(--min-height) * (var(--width) / var(--height)));
            aspect-ratio: var(--width) / var(--height);
            position: relative;
            overflow: hidden;
            margin: 0 !important;
            padding: 0 !important;
        }

        .justified-grid-gallery>*>img {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .justified-grid-gallery::after {
            content: " ";
            flex-grow: 1000000000;
            background: var(--last-row-background);
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

    <h1 style="text-align: center; position: relative; padding-top: 50px;">
        <div class="back-button-container">
            <button style="margin-top: 40px; margin-left: 90px; background-color: #4c845c; color: white; border: none; padding: 10px; font-size: 16px; cursor: pointer; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; width: 60px; height: 60px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
        </div>
        Education
    </h1>
    <div style="background-color: #4c845c; height: 100%; border-radius: 20px; width: 60%; margin: 0 auto;">
        <section class="justified-grid-gallery">
            <figure style="--width: 640; --height: 520;">
                <img src="https://www.ruparupa.com/blog/wp-content/uploads/2021/09/Rumah-Adat-Provinsi-di-Indonesia.jpeg" alt="a random image with a butterfly" />
            </figure>
            <figure style="--width: 500; --height: 420;">
                <img src="https://loremflickr.com/500/420/butterfly?random=2" alt="a random image with a butterfly" />
            </figure>
            <figure style="--width: 710; --height: 580;">
                <img src="https://loremflickr.com/710/580/butterfly?random=3" alt="a random image with a butterfly" />
            </figure>
            <figure style="--width: 760; --height: 540;">
                <img src="https://loremflickr.com/760/540/butterfly?random=4" alt="a random image with a butterfly" />
            </figure>
            <figure style="--width: 690; --height: 570;">
                <img src="https://loremflickr.com/690/570/butterfly?random=5" alt="a random image with a butterfly" />
            </figure>
            <figure style="--width: 540; --height: 340;">
                <img src="https://loremflickr.com/540/340/butterfly?random=6" alt="a random image with a butterfly" />
            </figure>
            <figure style="--width: 340; --height: 550;">
                <img src="https://loremflickr.com/340/550/butterfly?random=7" alt="a random image with a butterfly" />
            </figure>
        </section>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>