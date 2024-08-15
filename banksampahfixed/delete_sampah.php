<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Get the image file path
    $sql = "SELECT gambar_sampah FROM sampah WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filePath = $row['gambar_sampah'];

        // Delete the image file
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the record from the database
        $sql = "DELETE FROM sampah WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Record not found";
    }

    $conn->close();
}
?>
