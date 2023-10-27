<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <style>
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
                            <a href="<?php echo site_url('admin/dashboard'); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
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
                                        <p>BPD DIY</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/bsi'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>BSI</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/cimb'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>Data CIMB</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/line'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>LINE BANK</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?php echo site_url('admin/uob'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>MANDIRI</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo site_url('admin/uob'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-credit-card sub-menu-icon"></i>
                                        <p>TMRW By UOB</p>
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
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Welcome!</h5>
                        Hallo <?php echo $this->session->userdata('name'); ?>, ini adalah dashboard ADMIN. selalu <a href="<?php echo site_url('user/logout'); ?>" class="alert-link">Logout</a> untuk keamanan akun Anda!
                    </div>
                    <!-- Cards -->
                    <div class="row">
                        <div class="col-lg-4 col-6 col-sm-12 col-12">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>BPD DIY</h3>
                                    <p>Total data: <?php echo $total_bpd; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <a href="<?php echo site_url('admin/bpd'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 col-sm-12 col-12">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>BSI Syariah</h3>
                                    <p>Total data: <?php echo $total_bsi; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <a href="<?php echo site_url('admin/bsi'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 col-sm-12 col-12">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>CIMB</h3>
                                    <p>Total data: <?php echo $total_cimb; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <a href="<?php echo site_url('admin/cimb'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 col-sm-12 col-12">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>LINE BANK</h3>
                                    <p>Total data: <?php echo $total_line; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <a href="<?php echo site_url('admin/line'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 col-sm-12 col-12">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>BANK MUAMALAT</h3>
                                    <p>Coming Soon</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <a href="<?php echo site_url('admin/dashboard'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 col-sm-12 col-12">
                            <!-- small box -->
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>TMRW By UOB</h3>
                                    <p>Total data: <?php echo $total_uob; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <a href="<?php echo site_url('admin/uob'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Add more cards similarly -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

</body>

</html>