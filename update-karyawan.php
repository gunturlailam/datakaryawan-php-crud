<?php

//include koneksi database
include('koneksi.php');

// Validasi apakah form dikirim dengan method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak diizinkan!");
}

//get data dari form
$id_karyawan = trim($_POST['id_karyawan'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$jabatan = trim($_POST['jabatan'] ?? '');
$tanggal_masuk = trim($_POST['tanggal_masuk'] ?? '');
$no_hp = trim($_POST['no_hp'] ?? '');

// Validasi data tidak boleh kosong
if (empty($id_karyawan) || empty($nama) || empty($jabatan) || empty($tanggal_masuk) || empty($no_hp)) {
    die("Semua field harus diisi!");
}

// Validasi format tanggal
if (!strtotime($tanggal_masuk)) {
    die("Format tanggal tidak valid!");
}

// Validasi nomor HP (hanya angka dan minimal 10 digit)
if (!preg_match('/^[0-9]{10,15}$/', $no_hp)) {
    die("Format nomor HP tidak valid! Gunakan 10-15 digit angka.");
}

// Escape string untuk mencegah SQL injection
$id_karyawan = mysqli_real_escape_string($connection, $id_karyawan);
$nama = mysqli_real_escape_string($connection, $nama);
$jabatan = mysqli_real_escape_string($connection, $jabatan);
$tanggal_masuk = mysqli_real_escape_string($connection, $tanggal_masuk);
$no_hp = mysqli_real_escape_string($connection, $no_hp);

// Debug: tampilkan data yang akan diupdate
echo "<!-- Debug Update: ID=$id_karyawan, Nama=$nama, Jabatan=$jabatan, Tanggal=$tanggal_masuk, HP=$no_hp -->";

//query update data ke dalam database
$query = "UPDATE karyawan SET nama='$nama', jabatan='$jabatan', tanggal_masuk='$tanggal_masuk', no_hp='$no_hp' WHERE id_karyawan='$id_karyawan'";

// Debug: tampilkan query yang akan dieksekusi
echo "<!-- Query: $query -->";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if ($connection->query($query)) {
    // Tampilkan alert sukses dengan JavaScript
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Update Sukses</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .alert-container {
                background: white;
                border-radius: 20px;
                padding: 40px;
                text-align: center;
                box-shadow: 0 25px 50px rgba(0,0,0,0.15);
                max-width: 500px;
                width: 90%;
                animation: slideIn 0.5s ease-out;
            }
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateY(-30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .success-icon {
                font-size: 80px;
                color: #48bb78;
                margin-bottom: 20px;
                animation: bounce 1s ease-in-out;
            }
            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% {
                    transform: translateY(0);
                }
                40% {
                    transform: translateY(-20px);
                }
                60% {
                    transform: translateY(-10px);
                }
            }
            h2 {
                color: #2d3748;
                margin-bottom: 15px;
                font-size: 28px;
            }
            p {
                color: #4a5568;
                margin-bottom: 30px;
                font-size: 16px;
                line-height: 1.6;
            }
            .btn {
                background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
                color: white;
                padding: 15px 30px;
                border: none;
                border-radius: 15px;
                font-size: 16px;
                font-weight: 700;
                text-decoration: none;
                display: inline-block;
                transition: all 0.3s ease;
                box-shadow: 0 8px 25px rgba(72, 187, 120, 0.3);
            }
            .btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 35px rgba(72, 187, 120, 0.4);
                color: white;
                text-decoration: none;
            }
            .loading {
                margin-top: 20px;
                color: #718096;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class='alert-container'>
            <div class='success-icon'>
                <i class='fas fa-check-circle'></i>
            </div>
            <h2>Data Berhasil Diupdate!</h2>
            <p>Data karyawan <strong>$nama</strong> telah berhasil diperbarui di database.</p>
            <a href='index.php' class='btn'>
                <i class='fas fa-arrow-left mr-2'></i>Kembali ke Data Karyawan
            </a>
            <div class='loading'>
                <i class='fas fa-spinner fa-spin mr-2'></i>Redirect dalam 3 detik...
            </div>
        </div>
        
        <script>
            // Auto redirect setelah 3 detik
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 3000);
        </script>
    </body>
    </html>
    ";
} else {
    //pesan error gagal update data dengan detail error
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Update Error</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .alert-container {
                background: white;
                border-radius: 20px;
                padding: 40px;
                text-align: center;
                box-shadow: 0 25px 50px rgba(0,0,0,0.15);
                max-width: 500px;
                width: 90%;
                animation: slideIn 0.5s ease-out;
            }
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateY(-30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .error-icon {
                font-size: 80px;
                color: #f56565;
                margin-bottom: 20px;
                animation: shake 0.5s ease-in-out;
            }
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-10px); }
                75% { transform: translateX(10px); }
            }
            h2 {
                color: #2d3748;
                margin-bottom: 15px;
                font-size: 28px;
            }
            p {
                color: #4a5568;
                margin-bottom: 20px;
                font-size: 16px;
                line-height: 1.6;
            }
            .error-details {
                background: #fed7d7;
                border: 1px solid #feb2b2;
                border-radius: 10px;
                padding: 15px;
                margin: 20px 0;
                text-align: left;
                font-family: monospace;
                font-size: 14px;
                color: #c53030;
            }
            .btn {
                background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
                color: white;
                padding: 15px 30px;
                border: none;
                border-radius: 15px;
                font-size: 16px;
                font-weight: 700;
                text-decoration: none;
                display: inline-block;
                transition: all 0.3s ease;
                box-shadow: 0 8px 25px rgba(245, 101, 101, 0.3);
                margin: 0 10px;
            }
            .btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 35px rgba(245, 101, 101, 0.4);
                color: white;
                text-decoration: none;
            }
            .btn-secondary {
                background: linear-gradient(135deg, #718096 0%, #4a5568 100%);
                box-shadow: 0 8px 25px rgba(113, 128, 150, 0.3);
            }
            .btn-secondary:hover {
                box-shadow: 0 15px 35px rgba(113, 128, 150, 0.4);
            }
        </style>
    </head>
    <body>
        <div class='alert-container'>
            <div class='error-icon'>
                <i class='fas fa-exclamation-triangle'></i>
            </div>
            <h2>Data Gagal Diupdate!</h2>
            <p>Terjadi kesalahan saat mengupdate data karyawan.</p>
            <div class='error-details'>
                <strong>Error Detail:</strong><br>
                " . $connection->error . "
            </div>
            <div>
                <a href='edit-karyawan.php?id=$id_karyawan' class='btn btn-secondary'>
                    <i class='fas fa-undo mr-2'></i>Coba Lagi
                </a>
                <a href='index.php' class='btn'>
                    <i class='fas fa-home mr-2'></i>Kembali ke Beranda
                </a>
            </div>
        </div>
    </body>
    </html>
    ";
}

// Tutup koneksi
$connection->close();
?>
