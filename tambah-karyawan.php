<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Tambah Karyawan</title>
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
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }
        
        .container {
            margin-top: 40px;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }
        
        .card {
            border: none;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            position: relative;
            overflow: hidden;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 300% 100%;
            animation: gradientShift 3s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 25px 25px 0 0 !important;
            padding: 30px;
            font-size: 26px;
            font-weight: 700;
            text-align: center;
            letter-spacing: 2px;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .card-header i {
            position: relative;
            z-index: 2;
        }
        
        .card-body {
            padding: 50px;
        }
        
        .form-group {
            margin-bottom: 30px;
            position: relative;
        }
        
        .form-group label {
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 12px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            transition: all 0.3s ease;
        }
        
        .form-group label i {
            color: #667eea;
            margin-right: 8px;
        }
        
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            padding: 18px 25px;
            font-size: 16px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f7fafc;
            color: #2d3748;
            font-weight: 500;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: white;
            transform: translateY(-2px);
        }
        
        .form-control:hover {
            border-color: #cbd5e0;
            background: #edf2f7;
        }
        
        .form-control::placeholder {
            color: #a0aec0;
            font-weight: 400;
        }
        
        select.form-control {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23667eea' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 20px center;
            background-repeat: no-repeat;
            background-size: 20px;
            padding-right: 50px;
            cursor: pointer;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        
        select.form-control::-ms-expand {
            display: none;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            z-index: 10;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .input-icon .form-control {
            padding-left: 55px;
        }
        
        .input-icon .form-control:focus + i {
            color: #764ba2;
            transform: translateY(-50%) scale(1.1);
        }
        
        .btn {
            border-radius: 15px;
            padding: 18px 35px;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            box-shadow: 0 8px 25px rgba(72, 187, 120, 0.3);
            color: white;
        }
        
        .btn-success:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(72, 187, 120, 0.4);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            box-shadow: 0 8px 25px rgba(237, 137, 54, 0.3);
            color: white;
        }
        
        .btn-warning:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(237, 137, 54, 0.4);
        }
        
        .btn-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .floating-label {
            position: relative;
        }
        
        .floating-label .form-control:focus + label,
        .floating-label .form-control:not(:placeholder-shown) + label {
            transform: translateY(-25px) scale(0.85);
            color: #667eea;
        }
        
        .form-group .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        }
        
        .form-group .form-control:focus + label {
            color: #667eea;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 30px 25px;
            }
            
            .btn-group {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .card-header {
                font-size: 22px;
                padding: 25px 20px;
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-group {
            animation: fadeIn 0.8s ease-out;
            animation-fill-mode: both;
        }
        
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        
        .btn-group {
            animation: fadeIn 0.8s ease-out 0.5s both;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card animate-fade-in">
                    <div class="card-header">
                        <i class="fas fa-user-plus mr-2"></i>
                        TAMBAH KARYAWAN
                    </div>
                    <div class="card-body">
                        <form action="simpan-karyawan.php" method="POST">

                            <div class="form-group">
                                <label></i>Nama Karyawan</label>
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="nama" placeholder="Masukkan Nama Karyawan" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label></i>Jabatan</label>
                                <div class="input-icon">
                                    <select name="jabatan" class="form-control" placeholder="Pilih Jabatan">
                                        <option value="Manager">Manager</option>
                                        <option value="Supervisor">Supervisor</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Operator">Operator</option>
                                        <option value="Driver">Driver</option>
                                        <option value="Security">Security</option>
                                        <option value="Cleaning Service">Cleaning Service</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label></i>Tanggal Masuk</label>
                                <div class="input-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                    <input type="date" name="tanggal_masuk" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label></i>No HP</label>
                                <div class="input-icon">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" class="form-control" name="no_hp" placeholder="Masukkan NO HP">
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save mr-2"></i>SIMPAN
                                </button>
                                <button type="reset" class="btn btn-warning">
                                    <i class="fas fa-undo mr-2"></i>RESET
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>