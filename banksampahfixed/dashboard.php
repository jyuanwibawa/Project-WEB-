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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin-bottom: 20px;
            /* Atur margin bottom sesuai kebutuhan */
            font-family: 'Poppins', sans-serif;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #4c845c;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li {
            display: inline;
        }

        .nav-center {
            display: flex;
            justify-content: center;
            flex: 1;
            margin-left: 50px;
            /* Tambahkan margin kiri untuk menggeser kontainer ke kanan */
        }

        .nav-right {
            display: flex;
            justify-content: flex-end;
            flex: 0 0 auto;
        }

        .nav-left span {
            font-family: 'Poppins', sans-serif;
            /* Gaya font Poppins */
            font-size: 24px;
            /* Ukuran font */
            color: white;
            /* Warna teks */
            display: flex;
            justify-content: flex-end;
            flex: 0 0 auto;
            margin-top: 7px;
            margin-left: 20px;
            /* Jarak dari daftar menu */
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
            margin-top: 90px;
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

        .edit-button {
            background-color: #4CAF50;
            color: white;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
        }

        .upload-button {
            background-color: #2196F3;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            text-align: center;
        }

        .add-button button {
            background-color: white;
            /* Mengubah warna background menjadi putih */
            color: #008000;
            /* Mengubah warna ikon menjadi hijau */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .add-button button i {
            font-size: 24px;
        }

        .add-button button:hover {
            background-color: #45a049;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-group button:hover {
            background-color: #45a049;
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
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </div>
    </ul>

    <!-- background -->
    <div style="background-color: #4c845c;border-radius:20px;">
        <h1 style="text-align: center; position: relative;"> <!-- Modified -->
            Information
        </h1>

        <div class="add-button">
            <button id="addDataBtn">
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <!-- The Modal for Input -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form id="inputForm" action="submit_sampah.php" method="post" enctype="multipart/form-data">
                    <h2>Input Sampah</h2>
                    <div class="form-group">
                        <label for="gambar_sampah">Gambar Sampah</label>
                        <input type="file" id="gambar_sampah" name="gambar_sampah" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_sampah">Nama Sampah</label>
                        <input type="text" id="nama_sampah" name="nama_sampah" placeholder="Nama Sampah" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_sampah">Deskripsi Sampah</label>
                        <textarea id="deskripsi_samp
ahi" name="deskripsi_sampah" placeholder="Deskripsi Sampah" required></textarea>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['login_user']; ?>">
                    <div class="form-group">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- The Modal for Edit -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeEdit">&times;</span>
                <form id="editForm" action="edit_sampah.php" method="post" enctype="multipart/form-data">
                    <h2>Edit Sampah</h2>
                    <div class="form-group">
                        <label for="edit_gambar_sampah">Gambar Sampah</label>
                        <input type="file" id="edit_gambar_sampah" name="gambar_sampah" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_sampah">Nama Sampah</label>
                        <input type="text" id="edit_nama_sampah" name="nama_sampah" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_kategori">Kategori</label>
                        <input type="text" id="edit_kategori" name="kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_deskripsi_sampah">Deskripsi Sampah</label>
                        <textarea id="edit_deskripsi_sampah" name="deskripsi_sampah" required></textarea>
                    </div>
                    <input type="hidden" name="id" id="edit_id">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['login_user']; ?>">
                    <div class="form-group">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-container">
            <?php
            $userId = $_SESSION['login_user'];
            $sql = "SELECT * FROM sampah WHERE user_id = '$userId'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<img src='" . $row["gambar_sampah"] . "' alt='" . $row["nama_sampah"] . "'>";
                    echo "<h3>" . $row["nama_sampah"] . "</h3>";
                    echo "<p><strong>Kategori:</strong> " . $row["kategori"] . "</p>";
                    echo "<p><strong>Deskripsi:</strong> " . $row["deskripsi_sampah"] . "</p>";
                    echo "<div class='card-actions'>";
                    echo "<div class='card-actions-row'>";
                    echo "<button class='edit-button' onclick=\"openEditModal(" . htmlspecialchars(json_encode($row)) . ")\">Edit</button>";
                    echo "<button class='delete-button' onclick=\"deleteSampah('" . $row["id"] . "')\">Delete</button>";
                    echo "</div>";
                    echo "<button class='upload-button' onclick=\"uploadSampah('" . $row["id"] . "')\">Upload</button>";
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
        var modal = document.getElementById("myModal");
        var editModal = document.getElementById("editModal");
        var btn = document.getElementById("addDataBtn");
        var span = document.getElementsByClassName("close")[0];
        var closeEdit = document.getElementById("closeEdit");

        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        closeEdit.onclick = function() {
            editModal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        }

        function openEditModal(data) {
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_nama_sampah').value = data.nama_sampah;
            document.getElementById('edit_kategori').value = data.kategori;
            document.getElementById('edit_deskripsi_sampah').value = data.deskripsi_sampah;
            editModal.style.display = "block";
        }

        function deleteSampah(id) {
            if (confirm("Are you sure you want to delete this item?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_sampah.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText);
                        location.reload(); // Reload the page to reflect the changes
                    }
                };
                xhr.send("id=" + id);
            }
        }

        function uploadSampah(id) {
            console.log('Upload sampah with id:', id);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "upload_sampah.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    location.reload(); // Reload halaman untuk merefleksikan perubahan
                }
            };
            // Kirim ID sampah ke server
            xhr.send("id=" + id);
        }
    </script>
</body>

</html>