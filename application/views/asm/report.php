<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Filter</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- Home link -->
                <li class="nav-item">
                    <a href="<?php echo site_url('asm/dashboard'); ?>" class="nav-link">Home</a>
                </li>
                <!-- Data Laporan link -->
                <li class="nav-item">
                    <a href="<?php echo site_url('asm/report'); ?>" class="nav-link">Report Filter</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Account Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php echo $this->session->userdata('name'); ?></span>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo site_url('user/profile'); ?>" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo site_url('user/logout'); ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?php echo base_url('uploads/img/logooo.png'); ?>" alt="PT. MCS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PT. MCS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('uploads/img/profile.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $this->session->userdata('name'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo site_url('asm/dashboard'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('asm/hierarchy'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Data Laporan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('asm/report'); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-filter"></i>
                                <p>Report Filter</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Report Filter</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('asm/dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">Report Filter</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Report</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <!-- Form Filter Rentang Tanggal -->
                                    <form action="<?php echo site_url('asm/filter_report'); ?>" method="post">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <input type="date" name="start_date" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <input type="date" name="end_date" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Tampilkan ringkasan tanggal -->
                                    <?php if (isset($start_date) && isset($end_date)) : ?>
                                        <div class="alert alert-info">
                                            Summary dari tanggal <?php echo $start_date; ?> sampai <?php echo $end_date; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Banking Products</th>
                                                    <th>Total Data</th>
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Jika data disaring -->
                                                <?php if (isset($filtered_data)) : ?>
                                                    <?php foreach ($filtered_data as $bank_name => $data) : ?>
                                                        <tr>
                                                            <td><?php echo ucfirst($bank_name); ?></td>
                                                            <td><?php echo count($data); ?></td>
                                                            <td>
                                                                <!-- Contoh: Tombol untuk trigger modal atau link ke halaman detail -->
                                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $bank_name; ?>">
                                                                    Lihat Detail
                                                                </button>

                                                                <!-- Modal Detail Data -->
                                                                <div class="modal fade" id="detailModal<?php echo $bank_name; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?php echo $bank_name; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="detailModalLabel<?php echo $bank_name; ?>">Detail Data <?php echo ucfirst($bank_name); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- Isi detail data di sini -->
                                                                                <?php foreach ($data as $d) : ?>
                                                                                    <p>Data ID: <?php echo $d['id']; ?> - Tanggal: <?php echo $d['tanggal']; ?></p>
                                                                                    <!-- Tambahkan detail lain sesuai kebutuhan -->
                                                                                <?php endforeach; ?>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    <!-- Jika data awal -->
                                                <?php elseif (isset($bankSummaries)) : ?>
                                                    <?php foreach ($bankSummaries as $bank_name => $summary) : ?>
                                                        <tr>
                                                            <td><?php echo ucfirst($bank_name); ?></td>
                                                            <td><?php echo $summary['total']; ?></td>
                                                            <td>
                                                                <!-- Tombol untuk trigger modal -->
                                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $bank_name; ?>">
                                                                    Lihat Detail
                                                                </button>

                                                                <!-- Modal Detail Data -->
                                                                <div class="modal fade" id="detailModal<?php echo $bank_name; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?php echo $bank_name; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="detailModalLabel<?php echo $bank_name; ?>">Detail Data <?php echo ucfirst($bank_name); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?php
                                                                                // Pilih data yang akan ditampilkan
                                                                                $data_to_display = isset($filtered_data[$bank_name]) ? $filtered_data[$bank_name] : $all_data[$bank_name];
                                                                                foreach ($data_to_display as $d) : ?>
                                                                                    <p>Data ID: <?php echo $d['id']; ?> - Tanggal: <?php echo $d['tanggal']; ?></p>
                                                                                    <!-- Tambahkan detail lain sesuai kebutuhan -->
                                                                                <?php endforeach; ?>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright © <a href="https://mukticaraka.com/" target="_blank">PT. MCS</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.1
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

</body>

</html>