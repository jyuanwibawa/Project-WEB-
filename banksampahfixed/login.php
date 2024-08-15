<?php
session_start();

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT user_id FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $_SESSION['login_user'] = $username;

        header("location: home.php");
    } else {
        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
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
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .right {
            flex: 1;
            background-color: #4c845c;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            width: 100%;
            max-width: 550px;
            margin-top: 20vh;
        }

        .login-form input,
        .login-form button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-form button {
            background-color: white;
            color: #4c845c;
            height: 50px;
            border: none;
            cursor: pointer;
            margin-top: 25%;
        }

        .logo {
            font-size: 4em;
            color: #4c845c;
            margin-top: 35vh;
        }

        .offer {
            font-size: 1.5em;
            color: #4c845c;
            margin-top: 25%;
        }

        .header-text {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 1.5em;
            font-weight: bold;
            color: #4c845c;
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
            <h2 style="margin-right:500px; color: #ffffff;">Login</h2>
            <form class="login-form" method="post">
                <input type="text" name="username" placeholder="Username" required style="height: 50px;">
                <input type="password" name="password" placeholder="Password" required style="height: 50px;">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
