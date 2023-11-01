<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <style>
        @media (max-width: 768px) {
            /* Gaya khusus untuk layar yang lebih kecil dari 768px */
        }

        .hierarchy-list {
            list-style-type: none;
        }

        .hierarchy-list>li {
            margin: 10px 0;
            padding-left: 20px;
            border-left: 2px solid #ddd;
        }

        .hierarchy-list>li>strong {
            color: #007bff;
        }

        .hierarchy-list>li>ul>li {
            margin: 5px 0;
            padding-left: 20px;
            border-left: 2px solid #f39c12;
        }

        .hierarchy-list>li>ul>li>strong {
            color: #f39c12;
        }

        .hierarchy-list>li>ul>li>ul>li {
            margin: 5px 0;
            padding-left: 20px;
            border-left: 2px solid #00a65a;
        }

        .hierarchy-list>li>ul>li>ul>li>strong {
            color: #00a65a;
        }

        .hierarchy-list>li>ul>li>ul>li>ul>li {
            margin: 5px 0;
            padding-left: 20px;
            border-left: 2px solid #f56954;
        }

        .hierarchy-list>li>ul>li>ul>li>ul>li>strong {
            color: #f56954;
        }

        .hierarchy-list>li>ul>li>ul>li>ul>li>ul>li {
            margin: 5px 0;
            padding-left: 20px;
        }

        .hidden {
            display: none;
        }

        .expandable {
            cursor: pointer;
        }

        .horizontal-list {
            display: flex;
            gap: 10px;
            /* Jarak antar item */
            list-style-type: none;
            /* Menghilangkan bullet points */
            padding-left: 0;
            /* Menghilangkan padding default */
        }

        .horizontal-list>li {
            margin: 0;
            /* Menghilangkan margin default */
        }

        /* Warna untuk BSH */
        .table>tbody>tr>td {
            background-color: #e1f5fe;
            /* biru muda */
        }

        /* Warna untuk ASM */
        .table>tbody>tr>td>table>tbody>tr>td {
            background-color: #c8e6c9;
            /* hijau muda */
        }

        /* Warna untuk KOOR */
        .table>tbody>tr>td>table>tbody>tr>td>table>tbody>tr>td {
            background-color: #ffe0b2;
            /* oranye muda */
        }

        /* Warna untuk SPV */
        .table>tbody>tr>td>table>tbody>tr>td>table>tbody>tr>td>table>tbody>tr>td {
            background-color: #ffccbc;
            /* coklat muda */
        }

        /* Warna untuk DSR */
        .table>tbody>tr>td>table>tbody>tr>td>table>tbody>tr>td>table>tbody>tr>td>table>tbody>tr>td {
            background-color: #d1c4e9;
            /* ungu muda */
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
                <span class="brand-text font-weight-light">SPV Dashboard</span>
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
                            <a href="<?php echo site_url('spv/dashboard'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('spv/hierarchy'); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Hirarki
                                </p>
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
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Hirarki Bawahan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <?php foreach ($subordinates as $spv) : ?>
                                                <tr>
                                                    <td>
                                                        <strong class="expandable">+SPV:</strong> <?php echo $spv['name']; ?> (<?php echo $spv['code']; ?>)
                                                        <table class="hidden">
                                                            <?php foreach ($spv['dsrs'] as $dsr) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <strong class="expandable">+DSR:</strong> <?php echo $dsr['name']; ?> (<?php echo $dsr['code']; ?>)
                                                                        <table class="hidden">
                                                                            <tr>
                                                                                <td>CIMB: <?php echo $dsr['total_data_cimb']; ?> <i class="fas fa-info-circle view-details" data-dsr-code="<?php echo $dsr['code']; ?>" data-type="cimb"></i></td>
                                                                                <td>UOB: <?php echo $dsr['total_data_uob']; ?> <i class="fas fa-info-circle view-details" data-dsr-code="<?php echo $dsr['code']; ?>" data-type="uob"></i></td>
                                                                                <td>LINE: <?php echo $dsr['total_data_line']; ?> <i class="fas fa-info-circle view-details" data-dsr-code="<?php echo $dsr['code']; ?>" data-type="line"></i></td>
                                                                                <td>BSI: <?php echo $dsr['total_data_bsi']; ?> <i class="fas fa-info-circle view-details" data-dsr-code="<?php echo $dsr['code']; ?>" data-type="bsi"></i></td>
                                                                                <td>BPD: <?php echo $dsr['total_data_bpd']; ?> <i class="fas fa-info-circle view-details" data-dsr-code="<?php echo $dsr['code']; ?>" data-type="bpd"></i></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </table>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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

        <div class="modal fade" id="dsrDetailsModal" tabindex="-1" role="dialog" aria-labelledby="dsrDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dsrDetailsModalLabel">Detail Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Content will be loaded here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            $('.expandable').click(function() {
                var $this = $(this);
                var $nextTable = $this.closest('td').find('table').first();

                if ($nextTable.is(':visible')) {
                    $nextTable.slideUp();
                    $this.text($this.text().replace('-', '+'));
                } else {
                    $nextTable.slideDown();
                    $this.text($this.text().replace('+', '-'));
                }
            });

            $('.view-details').click(function() {
                var dsrCode = $(this).data('dsr-code');
                var type = $(this).data('type');
                fetchDetails(dsrCode, type);
            });
        });
    </script>
    <script>
        function fetchDetails(dsrCode, type) {
            $.ajax({
                url: '<?php echo site_url('spv/fetchDetails'); ?>',
                type: 'POST',
                data: {
                    dsrCode: dsrCode,
                    type: type
                },
                success: function(response) {
                    $('#dsrDetailsModal .modal-body').html(response);
                    $('#dsrDetailsModal').modal('show');
                }
            });
        }
    </script>

</body>

</html>