<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMRW By UOB</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
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
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php echo $this->session->userdata('name'); ?></span>
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
                <span class="brand-text font-weight-light">DSR Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                                    Banking
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
                                        <p>BSI</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/cimb'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>CIMB</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/line'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>LINE BANK</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/uob'); ?>" class="nav-link">
                                        <p>MANDIRI</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/uob'); ?>" class="nav-link active">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>TMRW By UOB</p>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>TMRW By UOB Data</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <<a href="<?php echo site_url('dsr/tambah_uob'); ?>" class="btn btn-primary mb-3">Add UOB Data</a>
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
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Mitra Code</th>
                                                <th class="text-center">DSR</th>
                                                <th class="text-center">Souvenir</th>
                                                <th class="text-center">Nama Nasabah</th>
                                                <th class="text-center">No HP Nasabah</th>
                                                <th class="text-center">No Rek Nasabah</th>
                                                <th class="text-center">Kota Akuisisi</th>
                                                <th class="text-center">Foto KTP Nasabah</th>
                                                <th class="text-center">SPV</th>
                                                <th class="text-center">KOOR</th>
                                                <th class="text-center">ASM</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            if (!empty($uob_forms)) { // Cek apakah $uob_forms tidak kosong
                                                foreach ($uob_forms as $form) :
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $form['tanggal']; ?></td>
                                                        <td><?php echo $form['dsr_code']; ?></td>
                                                        <td><?php echo $form['dsr_name']; ?></td>
                                                        <td><?php echo $form['jenis_skema']; ?></td>
                                                        <td><?php echo $form['nama_nasabah']; ?></td>
                                                        <td><?php echo $form['no_hp_nasabah']; ?></td>
                                                        <td><?php echo $form['no_rek_nasabah']; ?></td>
                                                        <td><?php echo $form['kabupaten'] . ", " . $form['provinsi']; ?></td>
                                                        <td>
                                                            <img src="<?php echo base_url('uploads/' . $form['foto_ktp_nasabah']); ?>" width="40" alt="Foto Ktp Nasabah" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['foto_ktp_nasabah']); ?>">
                                                        </td>
                                                        <td><?php echo $form['spv']; ?></td>
                                                        <td><?php echo $form['koor']; ?></td>
                                                        <td><?php echo $form['asm']; ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('dsr/delete_uob/' . $form['id']); ?>" class="btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
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