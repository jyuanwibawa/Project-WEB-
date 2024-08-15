<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sampah_id = $_POST["id"];

    // Tambahkan sampah ke database tanpa memeriksa duplikat
    // Implementasi kode untuk menambahkan sampah ke database sesuai kebutuhan Anda
}
?>
