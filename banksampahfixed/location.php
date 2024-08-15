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
    <title>Location</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .swal2-confirm {
            background-color: #4c845c !important;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
        }

        .swal2-confirm:hover {
            background-color: #218838;
        }

        .map-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
            padding-top: 30px;
        }

        #map {
            height: 200px;
            width: 60%;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            margin-left: 250px;
            background-color: #ffffff;
            width: 60%;
        }

        .input-container input,
        .input-container button {
            height: 30px;
            width: 90%;
            margin: 10px 0;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            width: 30%;
        }

        .button-container button {
            height: 30px;
            width: 48%;
            cursor: pointer;
            border: none;
            background-color: #ffffff;
            color: black;
            border-radius: 4px;
            border: 1px solid #4c845c;
        }

        .button-container button:hover {
            background-color: #218838;
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

        .back-button-container {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .location-text {
            text-align: center;
            margin-top: 50px;
            padding-top: 30px;
            position: relative;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <div class="content" style="background-color:#4c845c;height:1000px;">
        <div class="location-text">
            <div class="back-button-container">
                <button style="margin-top:40px;margin-left:90px; background-color: #ffffff; color: green; border: none; padding: 10px; font-size: 16px; cursor: pointer; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; width: 60px; height: 60px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
            </div>
            <h2>Location</h2>
        </div>

        <div class="map-container">
            <div id="map"></div>
        </div>

        <div class="input-container">
            <input type="text" id="destination" placeholder="Current Position">
            <input type="text" id="current-position" placeholder="Destination">
            <div class="button-container">
                <button onclick="findRoute()"><i class="fas fa-paper-plane"></i></button>
                <button onclick=""><i class="fas fa-share"></i></button>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    <script>
        var map = L.map('map').setView([-6.917159467698715, 107.60638797375107], 13);
        var latitude = 0;
        var longitude = 0;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function getCurrentPosition() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;

            console.log("Latitude: " + latitude + " Longitude: " + longitude);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    console.warn("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.warn("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    console.warn("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    console.warn("An unknown error occurred.");
                    break;
            }
        }

        getCurrentPosition();

        async function findRoute() {
            var currentPosition = [-6.917159467698715, 107.60638797375107];
            var destination = (latitude != 0 && longitude != 0) ? [latitude, longitude] : [-7.920993108076468, 112.65741615665497];

            async function getCoordinates(address) {
                const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${address}`);
                const data = await response.json();
                if (data.length > 0) {
                    return [parseFloat(data[0].lat), parseFloat(data[0].lon)];
                } else {
                    throw new Error('Address not found');
                }
            }

            async function getAddressName(coords) {
                const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${coords[0]}&lon=${coords[1]}`);
                const data = await response.json();
                return data.display_name;
            }

            try {
                const currentPosCoord = await getCoordinates(currentPosition);
                const destCoord = await getCoordinates(destination);

                const currentAddress = await getAddressName(currentPosCoord);
                const destAddress = await getAddressName(destCoord);

                document.getElementById('current-position').value = currentAddress;
                document.getElementById('destination').value = destAddress;

                L.Routing.control({
                    waypoints: [
                        L.latLng(currentPosCoord[0], currentPosCoord[1]),
                        L.latLng(destCoord[0], destCoord[1])
                    ],
                    routeWhileDragging: false,
                    addWaypoints: false,
                    createMarker: function() {
                        return null;
                    },
                    lineOptions: {
                        styles: [{
                            color: 'red',
                            weight: 6
                        }]
                    },
                    profile: 'car'
                }).addTo(map);

                Swal.fire({
                    title: 'Sampahmu akan dijemput',
                    icon: 'info',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            } catch (error) {
                alert(error.message);
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
