<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSI SYARIAH</title>
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
                <span class="brand-text font-weight-light">Admin Dashboard</span>
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
                                    Banking
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/bpd'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>Data BPD DIY</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/bsi'); ?>" class="nav-link active">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>Data BSI</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/cimb'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>Data CIMB</p>
                                    </a>
                                </li>
                                <li class=" nav-item">
                                    <a href="<?php echo site_url('admin/line'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>Data LINE BANK</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?php echo site_url('admin/uob'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>Data MANDIRI</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/uob'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>Data TMRW By UOB</p>
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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <form action="<?php echo site_url('admin/bsi_filtered'); ?>" method="post" class="d-flex">
                                            <div class="mr-3">
                                                <label for="start_date">Dari Tanggal:</label>
                                                <input type="date" name="start_date" id="start_date" required>
                                            </div>
                                            <div class="mr-3">
                                                <label for="end_date">Sampai Tanggal:</label>
                                                <input type="date" name="end_date" id="end_date" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-3">Filter</button>
                                        </form>
                                        <a href="<?php echo site_url('admin/export_bsi'); ?>" class="btn btn-success mr-2"><i class="fas fa-download"></i> Ekspor Semua Data</a>
                                        <button onclick="exportFilteredData()" class="btn btn-info"><i class="fas fa-filter"></i> Ekspor Data Terfilter</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataBSI" class="table table-bordered table-hover small-table-font">
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
                                                                <?php
                                                                echo $form['kabupaten'] . ", " .
                                                                    $form['provinsi'];
                                                                ?>
                                                            <td>
                                                                <img src="<?php echo base_url('uploads/' . $form['ss_info_rekening']); ?>" width="40" alt="Info Rekening" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['ss_info_rekening']); ?>">
                                                            </td>
                                                            <td>
                                                                <img src="<?php echo base_url('uploads/' . $form['ss_dashboard']); ?>" width="40" alt="ss dashboard" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['ss_dashboard']); ?>">
                                                            </td>
                                                            <td>
                                                                <img src="<?php echo base_url('uploads/' . $form['foto_ktp_nasabah']); ?>" width="40" alt="foto ktp" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['foto_ktp_nasabah']); ?>">
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
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
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
                "pageLength": 10, // Jumlah data per halaman
                "lengthChange": false, // Matikan fitur untuk mengubah jumlah data per halaman
                "language": {
                    "search": "Cari: ", // Ubah placeholder default
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