<?php

//include koneksi database
include('koneksi.php');

// Validasi apakah ID ada
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID Karyawan tidak ditemukan!");
}

$id = $_GET['id'];

// Escape string untuk keamanan
$id = mysqli_real_escape_string($connection, $id);

// Ambil data karyawan sebelum dihapus
$query_select = "SELECT * FROM karyawan WHERE id_karyawan='$id'";
$result = mysqli_query($connection, $query_select);

if (!$result) {
    die("Error query: " . mysqli_error($connection));
}

$num_rows = mysqli_num_rows($result);
if ($num_rows == 0) {
    die("Data karyawan dengan ID $id tidak ditemukan!");
}

$row = mysqli_fetch_array($result);
$nama_karyawan = $row['nama'];

// Query hapus data
$query_delete = "DELETE FROM karyawan WHERE id_karyawan='$id'";

//kondisi pengecekan apakah data berhasil dihapus atau tidak
if ($connection->query($query_delete)) {
    // Tampilkan alert sukses dengan JavaScript
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Hapus Sukses</title>
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
            <h2>Data Berhasil Dihapus!</h2>
            <p>Data karyawan <strong>$nama_karyawan</strong> telah berhasil dihapus dari database.</p>
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
    //pesan error gagal hapus data dengan detail error
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Hapus Error</title>
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
            <h2>Data Gagal Dihapus!</h2>
            <p>Terjadi kesalahan saat menghapus data karyawan.</p>
            <div class='error-details'>
                <strong>Error Detail:</strong><br>
                " . $connection->error . "
            </div>
            <div>
                <a href='index.php' class='btn btn-secondary'>
                    <i class='fas fa-arrow-left mr-2'></i>Kembali ke Beranda
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
