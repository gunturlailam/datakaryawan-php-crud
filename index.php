<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
        
        .card-header span,
        .card-header a {
            position: relative;
            z-index: 2;
        }
        
        .card-body {
            padding: 40px;
        }
        
        .btn {
            border-radius: 15px;
            padding: 12px 25px;
            font-weight: 700;
            font-size: 14px;
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
        
        .btn-primary {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.3);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 12px 30px rgba(66, 153, 225, 0.4);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            box-shadow: 0 6px 20px rgba(245, 101, 101, 0.3);
            color: white;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 12px 30px rgba(245, 101, 101, 0.4);
        }
        
        .btn-sm {
            padding: 8px 15px;
            font-size: 12px;
            border-radius: 12px;
        }
        
        .table {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .table thead th {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border: none;
            padding: 20px 15px;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #2d3748;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .table tbody td {
            padding: 18px 15px;
            border: none;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            color: #4a5568;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .table tbody tr:hover td {
            color: #2d3748;
            font-weight: 600;
        }
        
        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
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
        
        .card {
            animation: fadeIn 0.8s ease-out;
        }
        
        .table thead th {
            animation: fadeIn 0.8s ease-out;
            animation-fill-mode: both;
        }
        
        .table thead th:nth-child(1) { animation-delay: 0.1s; }
        .table thead th:nth-child(2) { animation-delay: 0.2s; }
        .table thead th:nth-child(3) { animation-delay: 0.3s; }
        .table thead th:nth-child(4) { animation-delay: 0.4s; }
        .table thead th:nth-child(5) { animation-delay: 0.5s; }
        .table thead th:nth-child(6) { animation-delay: 0.6s; }
        .table thead th:nth-child(7) { animation-delay: 0.7s; }
        
        .table tbody tr {
            animation: fadeIn 0.8s ease-out;
            animation-fill-mode: both;
        }
        
        .table tbody tr:nth-child(1) { animation-delay: 0.8s; }
        .table tbody tr:nth-child(2) { animation-delay: 0.9s; }
        .table tbody tr:nth-child(3) { animation-delay: 1.0s; }
        .table tbody tr:nth-child(4) { animation-delay: 1.1s; }
        .table tbody tr:nth-child(5) { animation-delay: 1.2s; }
        
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin: 20px 0;
            color: #4a5568;
            font-weight: 500;
        }
        
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 8px 15px;
            background: #f7fafc;
            transition: all 0.3s ease;
        }
        
        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 10px;
            margin: 0 3px;
            padding: 8px 15px;
            border: 2px solid #e2e8f0;
            background: #f7fafc;
            color: #4a5568 !important;
            transition: all 0.3s ease;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #667eea;
            color: white !important;
            border-color: #667eea;
            transform: translateY(-2px);
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #667eea;
            color: white !important;
            border-color: #667eea;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 25px 20px;
            }
            
            .card-header {
                font-size: 20px;
                padding: 25px 20px;
                flex-direction: column;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
                max-width: 250px;
            }
            
            .table thead th,
            .table tbody td {
                padding: 12px 8px;
                font-size: 12px;
            }
        }
        
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-active {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            box-shadow: 0 2px 10px rgba(72, 187, 120, 0.3);
        }
        
        .status-pending {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            color: white;
            box-shadow: 0 2px 10px rgba(237, 137, 54, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card animate-fade-in">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span><i class="fas fa-users mr-2"></i>DATA KARYAWAN</span>
                        <a href="tambah-karyawan.php" class="btn btn-success">
                            <i class="fas fa-plus mr-2"></i>Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-hashtag mr-2"></i>NO.</th>
                                        <th><i class="fas fa-id-card mr-2"></i>ID KARYAWAN</th>
                                        <th><i class="fas fa-user mr-2"></i>NAMA KARYAWAN</th>
                                        <th><i class="fas fa-briefcase mr-2"></i>JABATAN</th>
                                        <th><i class="fas fa-calendar-alt mr-2"></i>TANGGAL MASUK</th>
                                        <th><i class="fas fa-phone mr-2"></i>NO HP</th>
                                        <th><i class="fas fa-cogs mr-2"></i>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("koneksi.php");
                                    $no = 1;
                                    $query = mysqli_query($connection, "select * from karyawan");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><strong><?php echo $no++ ?></strong></td>
                                            <td><span class="status-badge status-active"><?php echo $row['id_karyawan'] ?></span></td>
                                            <td><strong><?php echo $row['nama'] ?></strong></td>
                                            <td><?php echo $row['jabatan'] ?></td>
                                            <td><?php echo $row['tanggal_masuk'] ?></td>
                                            <td><?php echo $row['no_hp'] ?></td>
                                            <td class="text-center">
                                                <a href="edit-siswa.php?id=<?php echo $row['id_karyawan'] ?>" class="btn btn-sm btn-primary mr-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="hapus-siswa.php?id=<?php echo $row['id_karyawan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
                "pageLength": 10,
                "order": [[ 0, "asc" ]],
                "responsive": true
            });
        });
    </script>
</body>

</html>