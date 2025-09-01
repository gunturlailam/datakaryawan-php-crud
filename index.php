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
        body {
            background: #f4f6f9;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background: linear-gradient(90deg, #007bff 0%, #00c6ff 100%);
            color: #fff;
            font-size: 1.5rem;
            font-weight: 600;
            border-radius: 16px 16px 0 0;
            letter-spacing: 1px;
        }

        .btn-success {
            background: linear-gradient(90deg, #00c851 0%, #33b5e5 100%);
            border: none;
        }

        .btn-primary {
            background: linear-gradient(90deg, #4285f4 0%, #34a853 100%);
            border: none;
        }

        .btn-danger {
            background: linear-gradient(90deg, #ff4444 0%, #ffbb33 100%);
            border: none;
        }

        .table th,
        .table td {
            vertical-align: middle !important;
        }

        .table thead th {
            background: #e3e6ea;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 60px; max-width: 1100px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span><i class="fa fa-users mr-2"></i>DATA KARYAWAN</span>
                        <a href="tambah-siswa.php" class="btn btn-success btn-md">
                            <i class="fa fa-plus mr-1"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>ID KARYAWAN</th>
                                        <th>NAMA KARYAWAN</th>
                                        <th>JABATAN</th>
                                        <th>TANGGAL MASUK</th>
                                        <th>NO HP</th>
                                        <th>AKSI</th>
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
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['id_karyawan'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td><?php echo $row['jabatan'] ?></td>
                                            <td><?php echo $row['tanggal_masuk'] ?></td>
                                            <td><?php echo $row['no_hp'] ?></td>
                                            <td class="text-center">
                                                <a href="edit-siswa.php?id=<?php echo $row['id_karyawan'] ?>" class="btn btn-sm btn-primary mr-1">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="hapus-siswa.php?id=<?php echo $row['id_karyawan'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i>
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
            $('#myTable').dataTable();
        });
    </script>
</body>

</html>