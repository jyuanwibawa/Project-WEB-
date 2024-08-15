<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['login_user'];
$namaSampah = $_POST['nama_sampah'];
$kategori = $_POST['kategori'];
$deskripsiSampah = $_POST['deskripsi_sampah'];

// Tangani unggahan gambar
$targetDir = "uploads/";
$uniqueName = uniqid() . "-" . basename($_FILES["gambar_sampah"]["name"]);
$targetFile = $targetDir . $uniqueName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Periksa apakah berkas adalah gambar
$check = getimagesize($_FILES["gambar_sampah"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}

// Batasi tipe berkas
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Periksa apakah $uploadOk adalah 0 karena kesalahan
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// Jika semuanya baik, coba unggah berkas
} else {
    if (move_uploaded_file($_FILES["gambar_sampah"]["tmp_name"], $targetFile)) {
        $gambarSampah = $targetFile;
        $sql = "INSERT INTO sampah (user_id, gambar_sampah, nama_sampah, kategori, deskripsi_sampah) VALUES ('$userId', '$gambarSampah', '$namaSampah', '$kategori', '$deskripsiSampah')";
        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
