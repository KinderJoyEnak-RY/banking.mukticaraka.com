<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hierarchy</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- OrgChart CSS -->
    <link rel="stylesheet" href="https://balkangraph.com/js/latest/OrgChart.js">
    <style>
        #tree {
            width: 100%;
            height: 550px;
            border: 1px solid #ccc;
            overflow: auto;
        }

        .orgchart {
            background: #f7f7f7;
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
                                        <p>CIMB</p>
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
                            <a href="<?php echo site_url('admin/view_hierarchy'); ?>" class="nav-link active">
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

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row mb-3 mt-4">
                        <div class="col-12 text-right">
                            <!-- Anda bisa menambahkan tombol atau konten lain di sini jika diperlukan -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <!-- Tempat untuk menampilkan OrgChart -->
                            <div id="tree"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- OrgChart JS -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var hierarchyData = <?php echo $hierarchy_json; ?>;

                    var chart = new OrgChart(document.getElementById("tree"), {
                        nodeBinding: {
                            field_0: "name",
                            field_1: "code",
                            field_2: "level"
                        },

                        nodes: hierarchyData,
                        nodeMenu: {
                            details: {
                                text: "Details"
                            },
                            edit: {
                                text: "Edit"
                            },
                            add: {
                                text: "Add"
                            },
                            remove: {
                                text: "Remove"
                            }
                        },
                        nodeContextMenu: {
                            edit: {
                                text: "Edit"
                            },
                            add: {
                                text: "Add"
                            },
                            remove: {
                                text: "Remove"
                            }
                        },
                        dragDropMenu: {
                            addInGroup: {
                                text: "Add in group"
                            },
                            addAsChild: {
                                text: "Add as child"
                            }
                        },
                        layout: OrgChart.mixed,
                        template: "rony",
                        align: OrgChart.ORIENTATION_TOP,
                        toolbar: {
                            zoom: true,
                            fit: true,
                            expandAll: true
                        }
                    });
                });
            </script>

        </div>


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <!-- DataTables JS and its Bootstrap 4 integration -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- OrgChart JS -->
    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>

</body>

</html>