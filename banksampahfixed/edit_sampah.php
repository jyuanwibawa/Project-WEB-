<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_sampah = $_POST['nama_sampah'];
    $kategori = $_POST['kategori'];
    $deskripsi_sampah = $_POST['deskripsi_sampah'];
    $user_id = $_POST['user_id'];

    // File upload handling
    if ($_FILES['gambar_sampah']['name']) {
        $target_dir = "uploads/";
        $imageFileType = strtolower(pathinfo($_FILES["gambar_sampah"]["name"], PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["gambar_sampah"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        // Check file size
        if ($_FILES["gambar_sampah"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            exit();
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Generate a unique name for the file
        $newFileName = uniqid('sampah_', true) . '.' . $imageFileType;
        $target_file = $target_dir . $newFileName;

        // If all checks pass, upload file
        if (move_uploaded_file($_FILES["gambar_sampah"]["tmp_name"], $target_file)) {
            // Update database with new file path
            $gambar_sampah = $target_file;
            $sql = "UPDATE sampah SET nama_sampah='$nama_sampah', kategori='$kategori', deskripsi_sampah='$deskripsi_sampah', gambar_sampah='$gambar_sampah' WHERE id='$id' AND user_id='$user_id'";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        // Update database without changing the image
        $sql = "UPDATE sampah SET nama_sampah='$nama_sampah', kategori='$kategori', deskripsi_sampah='$deskripsi_sampah' WHERE id='$id' AND user_id='$user_id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>
