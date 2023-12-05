<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BJJ Digital</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <style>
        h1 {
            font-size: 1.5em;
        }

        table th,
        table td {
            font-size: 0.8em;
        }

        .nav .nav-treeview .nav-icon.sub-menu-icon {
            font-size: 0.6em !important;
        }

        .btn-primary {
            background-color: #4e73df;
            /* Warna biru */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            /* Warna biru yang lebih gelap */
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .btn-primary {
                width: 100%;
                /* Button lebar penuh pada layar kecil */
                margin-bottom: 10px;
            }
        }
    </style>
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
                <li class="nav-item">
                    <a href="<?php echo site_url('dsr/dashboard'); ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php echo $this->session->userdata('name'); ?>; <?php echo $this->session->userdata('code'); ?></span>
                        <span class="dropdown-item dropdown-header"></span>
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
                            <a href="<?php echo site_url('dsr/dashboard'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-university"></i>
                                <p>
                                    Banking Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/bpd'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BPD DIY</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/bsi'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BSI Syariah</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/cimb'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>CIMB NIAGA</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/line'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>LINE BANK</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/uob'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>TMRW By UOB</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/mandiri'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BANK MANDIRI</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/bjj'); ?>" class="nav-link active">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BJJ DIGITAL</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>BJJ Digital</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('dsr/dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">BJJ Digital</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <a href="<?php echo site_url('dsr/tambah_bjj'); ?>" class="btn btn-primary mb-3">Add BJJ Data</a>
                            <div id="notification" class="alert" style="display:none;">
                                <span id="notification-message"></span>
                            </div>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('success')) : ?>
                                <div class="alert alert-success">
                                    <?= $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="bjjTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Mitra Code</th>
                                            <th class="text-center">DSR</th>
                                            <th class="text-center">Nama Nasabah</th>
                                            <th class="text-center">No HP Nasabah</th>
                                            <th class="text-center">No Rek Nasabah</th>
                                            <th class="text-center">Jenis Tabungan</th>
                                            <th class="text-center">Jenis Setoran</th>
                                            <th class="text-center">Nominal Setoran</th>
                                            <th class="text-center">SS Dashboard</th>
                                            <th class="text-center">SS Saku Utama</th>
                                            <th class="text-center">SPV</th>
                                            <th class="text-center">KOOR</th>
                                            <th class="text-center">ASM</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (!empty($bjj_forms)) { // Cek apakah $bjj_forms tidak kosong
                                            foreach ($bjj_forms as $form) :
                                        ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $form['tanggal']; ?></td>
                                                    <td><?php echo $form['dsr_code']; ?></td>
                                                    <td><?php echo $form['dsr_name']; ?></td>
                                                    <td><?php echo $form['nama_nasabah']; ?></td>
                                                    <td><?php echo $form['no_hp_aktif_nasabah']; ?></td>
                                                    <td><?php echo $form['no_rek_nasabah']; ?></td>
                                                    <td><?php echo $form['jenis_tabungan']; ?></td>
                                                    <td><?php echo $form['select_setoran']; ?></td>
                                                    <td>
                                                        <?php
                                                        // Periksa apakah 'nominal_setoran' tidak null dan terisi
                                                        if (!empty($form['nominal_setoran'])) {
                                                            echo 'Rp. ' . number_format($form['nominal_setoran'], 2, ',', '.');
                                                        } else {
                                                            echo 'Rp. 0,00'; // Tampilkan nilai default jika 'nominal_setoran' null atau tidak terisi
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo base_url('uploads/' . $form['ss_dashboard']); ?>" width="40" alt="SS Dashboard" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['ss_dashboard']); ?>">
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo base_url('uploads/' . $form['ss_saku_utama']); ?>" width="40" alt="SS Saku Utama" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['ss_saku_utama']); ?>">
                                                    </td>
                                                    <td><?php echo $form['spv']; ?></td>
                                                    <td><?php echo $form['koor']; ?></td>
                                                    <td><?php echo $form['asm']; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('dsr/delete_bjj/' . $form['id']); ?>" class="btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            endforeach;
                                        } else {
                                            echo "<tr><td colspan='15' class='text-center'>Tidak ada data untuk ditampilkan</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">View Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="modalImage" src="" alt="Full-size Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

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
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bjjTable').DataTable();

            $('#imageModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var imageUrl = button.data('image');
                var modal = $(this);
                modal.find('#modalImage').attr('src', imageUrl);
            });
        });
    </script>

</body>

</html>