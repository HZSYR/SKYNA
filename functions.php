<?php
session_start();
// isLoggedIn();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skyna_studio";

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

function getPromoData($table, $where = null)
{
    global $conn;

    $query = "SELECT * FROM $table";
    if ($where) {
        $query .= " WHERE $where";
    }

    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}
// produk
function addProduct($nama_produk, $kategori, $promo, $harga, $diskon,  $fileInputName, $targetDirectory)
{
    global $conn;

    // Upload foto produk
    $foto = uploadImage($fileInputName, $targetDirectory);
    if (!$foto) {
        return false;
    }

    // Query untuk menambahkan produk
    $query = "INSERT INTO produk (nama_produk, kategori,promo, harga, diskon, foto) VALUES (?,?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssdss", $nama_produk, $kategori, $promo, $harga, $diskon, $foto);

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
function updateProduct($id, $nama_produk, $kategori, $promo, $harga, $diskon, $fileInputName, $targetDirectory, $oldFotoPath)
{
    global $conn;

    // Default gunakan foto lama
    $foto = $oldFotoPath;

    // Jika ada file baru diunggah
    if (!empty($_FILES[$fileInputName]['name'])) {
        // Hapus foto lama jika ada
        if (!empty($oldFotoPath) && file_exists($targetDirectory . $oldFotoPath)) {
            unlink($targetDirectory . $oldFotoPath);
        }

        // Unggah foto baru
        $foto = uploadImage($fileInputName, $targetDirectory);
        if (!$foto) {
            $_SESSION['message'] = "Gagal mengunggah foto baru!";
            $_SESSION['message_type'] = 'error';
            return false;
        }
    }

    // Query untuk mengupdate produk
    $query = "UPDATE produk SET nama_produk = ?, kategori = ?, promo = ?, harga = ?, diskon = ?, foto = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssddsi", $nama_produk, $kategori, $promo, $harga, $diskon, $foto, $id);

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

function addCategory($kategori)
{
    global $conn;

    // Query untuk menambahkan kategori
    $query = "INSERT INTO kategori (kategori) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $kategori);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Kategori berhasil ditambahkan.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal menambahkan kategori: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

// Fungsi untuk mengupdate data Kategori
function updateCategory($id, $kategori)
{
    global $conn;

    // Query untuk mengupdate kategori
    $query = "UPDATE kategori SET kategori = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $kategori, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Kategori berhasil diperbarui.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal memperbarui kategori: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

// Fungsi untuk menghapus data produk
function deleteCategory($id)
{
    global $conn;

    // Query untuk menghapus kategori
    $query = "DELETE FROM kategori WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Kategori berhasil dihapus.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal menghapus kategori: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

function updateLogo($id, $fileInputName, $targetDirectory, $oldFotoPath)
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

    // Query untuk mengupdate Logo
    $query = "UPDATE logo SET logo = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $foto, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Logo berhasil diperbarui.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal memperbarui Logo: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

function addAdmin($email, $password)
{
    global $conn;

    // Cek apakah email sudah ada di database
    $query = "SELECT COUNT(*) AS count FROM admin WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data['count'] > 0) {
        $_SESSION['message'] = "Email sudah terdaftar!";
        $_SESSION['message_type'] = 'error';
        header('Location: index.php');
        return false;
    }

    // Hash password sebelum disimpan
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Query untuk menambahkan admin baru
    $query = "INSERT INTO admin (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Admin berhasil ditambahkan.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal menambahkan admin: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

function deleteAdmin($id)
{
    global $conn;

    // Query untuk menghapus admin berdasarkan ID
    $query = "DELETE FROM admin WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Admin berhasil dihapus.";
        $_SESSION['message_type'] = 'success';
        return true;
    } else {
        $_SESSION['message'] = "Gagal menghapus admin: " . $stmt->error;
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

function loginAdmin($email, $password)
{
    global $conn;

    // Query untuk mencari admin berdasarkan email
    $query = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah admin ditemukan
    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $admin['password'])) {
            // Set session login
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_email'] = $admin['email'];
            $_SESSION['message'] = "Login berhasil!";
            $_SESSION['message_type'] = 'success';
            return true;
        } else {
            $_SESSION['message'] = "Password salah!";
            $_SESSION['message_type'] = 'error';
            return false;
        }
    } else {
        $_SESSION['message'] = "Email tidak ditemukan!";
        $_SESSION['message_type'] = 'error';
        return false;
    }
}

function isLoggedIn()
{
    if (!isset($_SESSION['admin_id'])) {
        $_SESSION['message'] = "Silakan login terlebih dahulu!";
        $_SESSION['message_type'] = 'error';
        header('Location: login.php');
        exit;
    }
}
