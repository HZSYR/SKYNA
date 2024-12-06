<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skyna-studio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function uploadImage($fileInputName, $targetDirectory, $oldFotoPath = null)
{
    global $conn;
    // Menetapkan nama file tujuan
    $targetFile = $targetDirectory . basename($_FILES[$fileInputName]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Cek apakah file gambar atau bukan
    $check = getimagesize($_FILES[$fileInputName]["tmp_name"]);
    if ($check === false) {
        $_SESSION['message'] = "file bukan gambar.";
        $_SESSION['message_type'] = 'error';
        return false;
    }

    // Cek ukuran file (batas 1MB)
    if ($_FILES[$fileInputName]["size"] > 1000000) {
        $_SESSION['message'] = "Ukuran file terlalu besar.";
        $_SESSION['message_type'] = 'error';
        return false;
    }

    // Izinkan format file tertentu
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $_SESSION['message'] = "Hanya mengizinkan file JPG, JPEG, PNG & GIF.";
        $_SESSION['message_type'] = 'error';
        return false;
    }

    // Cek apakah $uploadOk diset ke 0 karena kesalahan
    if ($uploadOk == 0) {
        $_SESSION['message'] = "Foto yang dipilih tidak sesuai.";
        $_SESSION['message_type'] = 'error';
        return false;
    } else {
        // Mengupload file
        if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFile)) {
            // Hapus foto lama jika ada
            if ($oldFotoPath && file_exists($oldFotoPath)) {
                unlink($oldFotoPath);
            }
            return basename($targetFile);
        } else {
            $_SESSION['message'] = "Ada yang salah saat mengupload foto.";
            $_SESSION['message_type'] = 'error';
            return false;
        }
    }
}
// Fungsi untuk mengambil data dari tabel admin
function getTableData($tableName)
{
    global $conn;
    $query = "SELECT * FROM $tableName";
    $result = $conn->query($query);

    if (!$result) {
        die("Query error: " . $conn->error);
    }

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

// produk
function addProduct($nama_produk, $kategori, $harga, $diskon, $fileInputName, $targetDirectory)
{
    global $conn;

    // Upload foto produk
    $foto = uploadImage($fileInputName, $targetDirectory);
    if (!$foto) {
        return false;
    }

    // Query untuk menambahkan produk
    $query = "INSERT INTO produk (nama_produk, kategori, harga, diskon, foto) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdds", $nama_produk, $kategori, $harga, $diskon, $foto);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Produk berhasil ditambahkan.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal menambahkan produk: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

// Fungsi untuk mengupdate data produk
function updateProduct($id, $nama_produk, $kategori, $harga, $diskon, $fileInputName, $targetDirectory, $oldFotoPath)
{
    global $conn;

    // Upload foto baru jika ada
    $foto = $oldFotoPath;
    if (!empty($_FILES[$fileInputName]['name'])) {
        $foto = uploadImage($fileInputName, $targetDirectory, $oldFotoPath);
        if (!$foto) {
            return false;
        }
    }

    // Query untuk mengupdate produk
    $query = "UPDATE produk SET nama_produk = ?, kategori = ?, harga = ?, diskon = ?, foto = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssddsi", $nama_produk, $kategori, $harga, $diskon, $foto, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Produk berhasil diperbarui.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal memperbarui produk: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

// Fungsi untuk menghapus data produk
function deleteProduct($id, $fotoPath)
{
    global $conn;

    // Hapus file foto jika ada
    if (file_exists($fotoPath)) {
        unlink($fotoPath);
    }

    // Query untuk menghapus produk
    $query = "DELETE FROM produk WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Produk berhasil dihapus.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal menghapus produk: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}
