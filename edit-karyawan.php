<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Edit Karyawan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
        }
        
        .container {
            margin-top: 40px;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }
        
        .card {
            border: none;
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.2);
            backdrop-filter: blur(25px);
            background: rgba(255, 255, 255, 0.95);
            position: relative;
            overflow: hidden;
            margin-top: 20px;
            width: 100%;
            margin: 0 auto;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 30px 30px 0 0 !important;
            padding: 40px;
            font-size: 28px;
            font-weight: 800;
            text-align: center;
            letter-spacing: 3px;
            position: relative;
            overflow: hidden;
        }
        
        .card-header i {
            margin-right: 15px;
            font-size: 32px;
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .card-body {
            padding: 60px;
        }
        
        .form-group {
            margin-bottom: 35px;
            position: relative;
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.8s ease-out forwards;
        }
        
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        
        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .form-group label {
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 15px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: block;
        }
        
        .form-group label i {
            color: #667eea;
            margin-right: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control {
            border: 3px solid #e2e8f0;
            border-radius: 20px;
            padding: 22px 30px;
            font-size: 16px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            color: #2d3748;
            font-weight: 600;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 6px rgba(102, 126, 234, 0.15);
            background: white;
            transform: translateY(-3px) scale(1.02);
            outline: none;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 25px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            z-index: 10;
            font-size: 20px;
        }
        
        .input-icon .form-control {
            padding-left: 65px;
        }
        
        select.form-control {
            cursor: pointer;
        }
        
        select.form-control option {
            padding: 10px;
            background: white;
            color: #2d3748;
        }
        
        /* Custom Select Dropdown Styling */
        select[name="jabatan"] {
            width: 100%;
            padding: 18px 25px;
            border: 3px solid #e2e8f0;
            border-radius: 20px;
            font-size: 16px;
            font-weight: 600;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            color: #2d3748;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23667eea' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 20px center;
            background-repeat: no-repeat;
            background-size: 25px;
            padding-right: 60px;
            position: relative;
            overflow: hidden;
        }
        
        select[name="jabatan"]:hover {
            border-color: #cbd5e0;
            background: linear-gradient(135deg, #edf2f7 0%, #e2e8f0 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        select[name="jabatan"]:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 6px rgba(102, 126, 234, 0.15);
            background: white;
            transform: translateY(-3px) scale(1.02);
            outline: none;
        }
        
        select[name="jabatan"] option {
            padding: 15px 20px;
            background: white;
            color: #2d3748;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }
        
        select[name="jabatan"] option:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        select[name="jabatan"] option:checked {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            font-weight: 700;
        }
        
        /* Glow effect for selected option */
        select[name="jabatan"]:focus {
            box-shadow: 0 0 0 6px rgba(102, 126, 234, 0.15), 0 0 20px rgba(102, 126, 234, 0.3);
        }
        
        /* Animation for dropdown */
        select[name="jabatan"] {
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Custom scrollbar for dropdown */
        select[name="jabatan"]::-webkit-scrollbar {
            width: 8px;
        }
        
        select[name="jabatan"]::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        select[name="jabatan"]::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }
        
        select[name="jabatan"]::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
        
        .btn {
            border-radius: 20px;
            padding: 20px 40px;
            font-weight: 800;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }
        
        .btn-success:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 45px rgba(72, 187, 120, 0.5);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            color: white;
        }
        
        .btn-warning:hover {
            transform: translateY(-5px) scale(1.05);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
        }
        
        .btn-danger:hover {
            transform: translateY(-5px) scale(1.05);
        }
        
        .btn-group {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
        }
        
        @media (max-width: 768px) {
            .card-body { padding: 40px 30px; }
            .btn-group { flex-direction: column; align-items: center; }
            .btn { width: 100%; max-width: 350px; }
            .card { transform: none; }
            .card:hover { transform: none; }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-edit"></i>
                        EDIT KARYAWAN
                    </div>
                    <div class="card-body">
                        <?php
                        include("koneksi.php");
                        $id = $_GET['id'];
                        
                        // Debug: cek apakah ID ada
                        if (!isset($id) || empty($id)) {
                            echo "<div class='alert alert-danger'>ID Karyawan tidak ditemukan!</div>";
                            exit();
                        }
                        
                        $query = mysqli_query($connection, "SELECT * FROM karyawan WHERE id_karyawan='$id'");
                        
                        // Debug: cek apakah query berhasil
                        if (!$query) {
                            echo "<div class='alert alert-danger'>Error query: " . mysqli_error($connection) . "</div>";
                            exit();
                        }
                        
                        // Debug: cek jumlah data
                        $num_rows = mysqli_num_rows($query);
                        if ($num_rows == 0) {
                            echo "<div class='alert alert-warning'>Data karyawan dengan ID $id tidak ditemukan!</div>";
                            echo "<a href='index.php' class='btn btn-primary'>Kembali ke Beranda</a>";
                            exit();
                        }
                        
                        $row = mysqli_fetch_array($query);
                        
                        // Debug: tampilkan data yang di-fetch
                        echo "<!-- Debug Info: ID=$id, Nama=" . $row['nama'] . ", Jabatan=" . $row['jabatan'] . " -->";
                        ?>
                        <form action="update-karyawan.php" method="POST">
                            <input type="hidden" name="id_karyawan" value="<?php echo htmlspecialchars($row['id_karyawan']); ?>">

                            <div class="form-group">
                                <label><i class="fas fa-user"></i>Nama Karyawan</label>
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-briefcase"></i>Jabatan</label>
                                <select name="jabatan" required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    <option value="Manager" <?php echo (trim($row['jabatan']) == 'Manager') ? 'selected' : ''; ?>>Manager</option>
                                    <option value="Supervisor" <?php echo (trim($row['jabatan']) == 'Supervisor') ? 'selected' : ''; ?>>Supervisor</option>
                                    <option value="Staff" <?php echo (trim($row['jabatan']) == 'Staff') ? 'selected' : ''; ?>>Staff</option>
                                    <option value="Admin" <?php echo (trim($row['jabatan']) == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="Operator" <?php echo (trim($row['jabatan']) == 'Operator') ? 'selected' : ''; ?>>Operator</option>
                                    <option value="Driver" <?php echo (trim($row['jabatan']) == 'Driver') ? 'selected' : ''; ?>>Driver</option>
                                    <option value="Security" <?php echo (trim($row['jabatan']) == 'Security') ? 'selected' : ''; ?>>Security</option>
                                    <option value="Cleaning Service" <?php echo (trim($row['jabatan']) == 'Cleaning Service') ? 'selected' : ''; ?>>Cleaning Service</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-calendar-alt"></i>Tanggal Masuk</label>
                                <div class="input-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                    <input type="date" name="tanggal_masuk" value="<?php echo htmlspecialchars($row['tanggal_masuk']); ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-phone"></i>No HP</label>
                                <div class="input-icon">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" class="form-control" name="no_hp" value="<?php echo htmlspecialchars($row['no_hp']); ?>" required>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save mr-2"></i>UPDATE
                                </button>
                                <button type="reset" class="btn btn-warning">
                                    <i class="fas fa-undo mr-2"></i>RESET
                                </button>
                                <a href="index.php" class="btn btn-danger">
                                    <i class="fas fa-times mr-2"></i>BATAL
                                </a>
                            </div>
                        </form>
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            console.log('=== TEST DROPDOWN JABATAN EDIT ===');
            
            // Test dropdown jabatan
            var jabatanSelect = $('select[name="jabatan"]');
            console.log('Dropdown jabatan ditemukan:', jabatanSelect.length > 0);
            console.log('Total options:', jabatanSelect.find('option').length);
            
            // Tampilkan semua option
            jabatanSelect.find('option').each(function(index) {
                console.log('Option ' + index + ':', $(this).val(), $(this).text(), $(this).prop('selected'));
            });
            
            // Test klik dropdown jabatan
            jabatanSelect.on('click', function() {
                console.log('🔥 Dropdown jabatan diklik!');
                console.log('Options yang ada:', $(this).find('option').length);
                
                // Force show options
                $(this).focus();
                $(this).trigger('mousedown');
            });
            
            // Test change jabatan
            jabatanSelect.on('change', function() {
                var selectedValue = $(this).val();
                var selectedText = $(this).find('option:selected').text();
                console.log('🎯 Jabatan dipilih:', selectedValue, selectedText);
                
                if (selectedValue !== '') {
                    console.log('✅ Jabatan berhasil dipilih:', selectedText);
                    alert('Jabatan dipilih: ' + selectedText);
                }
            });
            
            // Test focus
            jabatanSelect.on('focus', function() {
                console.log('🎯 Dropdown jabatan mendapat focus');
            });
            
            // Test mousedown
            jabatanSelect.on('mousedown', function() {
                console.log('🖱️ Mouse down pada dropdown jabatan');
            });
            
            // Cek apakah dropdown terlihat
            console.log('Dropdown visible:', jabatanSelect.is(':visible'));
            console.log('Dropdown width:', jabatanSelect.width());
            console.log('Dropdown height:', jabatanSelect.height());
            console.log('Dropdown display:', jabatanSelect.css('display'));
            console.log('Dropdown position:', jabatanSelect.offset());
            
            // Force enable dropdown
            jabatanSelect.prop('disabled', false);
            jabatanSelect.css('pointer-events', 'auto');
            jabatanSelect.css('opacity', '1');
            
            console.log('Dropdown enabled:', !jabatanSelect.prop('disabled'));
        });
    </script>
</body>
</html>