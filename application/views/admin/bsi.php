<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSI Syariah</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <style>
        .small-table-font {
            font-size: 0.7rem;
        }

        .nav .nav-treeview .nav-icon.sub-menu-icon {
            font-size: 0.6em !important;
        }

        @media (min-width: 768px) {
            .card-header .form-group {
                margin-bottom: 0;
                /* Menghilangkan margin bawah */
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
                    <a href="<?php echo site_url('admin/dashboard'); ?>" class="nav-link">Home</a>
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
                            <a href="<?php echo site_url('admin/dashboard'); ?>" class="nav-link">
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
                                    <a href="<?php echo site_url('admin/bpd'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BPD DIY</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/bsi'); ?>" class="nav-link active">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BSI Syariah</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/cimb'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>CIMB NIAGA</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/line'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>LINE BANK</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/uob'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>TMRW by UOB</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/mandiri'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BANK MANDIRI</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/bjj'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BJJ DIGITAL</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/muamalat'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>Bank Muamalat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/users'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/view_hierarchy'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p>Hierarchy</p>
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
                            <h1>BSI Syariah</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active">BSI Syariah</li>
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
                                    <div class="row">
                                        <!-- Form Filter -->
                                        <div class="col-lg-8">
                                            <form action="<?php echo site_url('admin/bsi_filtered'); ?>" method="post" class="row align-items-end">
                                                <div class="col-md-4 mb-3 mb-md-0">
                                                    <label for="start_date" class="mb-0">Dari Tanggal:</label>
                                                    <input type="date" name="start_date" id="start_date" required class="form-control">
                                                </div>
                                                <div class="col-md-4 mb-3 mb-md-0">
                                                    <label for="end_date" class="mb-0">Sampai Tanggal:</label>
                                                    <input type="date" name="end_date" id="end_date" required class="form-control">
                                                </div>
                                                <div class="col-md-4 mb-3 mb-md-0">
                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Tombol Ekspor Data -->
                                        <div class="col-lg-4 text-lg-right text-center mt-3 mt-lg-0">
                                            <a href="<?= site_url('admin/export_bsi'); ?>" class="btn btn-success btn-sm mr-2">
                                                <i class="fas fa-download"></i> Ekspor Semua Data
                                            </a>
                                            <button onclick="exportFilteredData()" class="btn btn-info btn-sm">
                                                <i class="fas fa-filter"></i> Ekspor Data Terfilter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataBSI" class="table table-bordered table-hover table-striped small-table-font">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Tanggal</th>
                                                    <th class="text-center">Mitra Code</th>
                                                    <th class="text-center">DSR</th>
                                                    <th class="text-center">Nama Nasabah</th>
                                                    <th class="text-center">No Tlp Nasabah</th>
                                                    <th class="text-center">Rek BSI Nasabah</th>
                                                    <th class="text-center">Kota Akuisisi</th>
                                                    <th class="text-center">Info Rekening</th>
                                                    <th class="text-center">SS Dashboard</th>
                                                    <th class="text-center">KTP Nasabah</th>
                                                    <th class="text-center">SPV</th>
                                                    <th class="text-center">KOOR</th>
                                                    <th class="text-center">ASM</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                if (!empty($bsi_forms)) { // Cek apakah $bsi_forms tidak kosong
                                                    foreach ($bsi_forms as $form) :
                                                ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $form['tanggal']; ?></td>
                                                            <td><?php echo $form['dsr_code']; ?></td>
                                                            <td><?php echo $form['dsr_name']; ?></td>
                                                            <td><?php echo $form['nama_nasabah']; ?></td>
                                                            <td><?php echo $form['no_hp_nasabah']; ?></td>
                                                            <td><?php echo $form['no_rek_bsi_syariah_nasabah']; ?></td>
                                                            <td>
                                                                <?php echo $form['kabupaten'] . ", " . $form['provinsi']; ?>
                                                            <td>
                                                                <a href="<?php echo base_url('uploads/' . $form['ss_info_rekening']); ?>" target="_blank">Lihat info rekening</a>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('uploads/' . $form['ss_dashboard']); ?>" target="_blank">Lihat ss dashboard</a>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('uploads/' . $form['foto_ktp_nasabah']); ?>" target="_blank">Lihat Foto KTP</a>
                                                            </td>
                                                            <td><?php echo $form['spv']; ?></td>
                                                            <td><?php echo $form['koor']; ?></td>
                                                            <td><?php echo $form['asm']; ?></td>
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
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal untuk menampilkan gambar -->
        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="" id="modalImage" class="img-fluid" alt="Octo Dashboard">
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
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#imageModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var imageSrc = button.data('image');
            var modal = $(this);
            modal.find('#modalImage').attr("src", imageSrc);
        });

        $(document).ready(function() {
            $('#dataBSI').DataTable({
                "pageLength": 10,
                "language": {
                    "search": "Cari: ",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data yang tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total data)"
                }
            });
        });
    </script>
    <script>
        function exportFilteredData() {
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;

            if (startDate && endDate) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '<?php echo site_url('admin/export_bsi_filtered'); ?>';

                var inputStartDate = document.createElement('input');
                inputStartDate.type = 'hidden';
                inputStartDate.name = 'start_date';
                inputStartDate.value = startDate;
                form.appendChild(inputStartDate);

                var inputEndDate = document.createElement('input');
                inputEndDate.type = 'hidden';
                inputEndDate.name = 'end_date';
                inputEndDate.value = endDate;
                form.appendChild(inputEndDate);

                document.body.appendChild(form);
                form.submit();
            } else {
                alert('Harap pilih tanggal awal dan akhir.');
            }
        }
    </script>


</body>

</html>