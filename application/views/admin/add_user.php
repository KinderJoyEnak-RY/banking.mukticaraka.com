<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                            <a href="<?php echo site_url('admin/users'); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Users</p>
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
                    <div class="row mb-3 mt-4 justify-content-center">
                        <div class="col-md-6">
                            <!-- Header "Tambah User" dengan styling tambahan -->
                            <div class="text-center p-3 mb-3" style="background-color: #007bff; color: white; border-radius: 5px;">
                                <h2>Tambah User</h2>
                            </div>
                            <?php if ($this->session->flashdata('success')) : ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Card untuk form -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- Form untuk tambah user -->
                                    <?php echo form_open('admin/add_user'); ?>
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control" name="code" id="code" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="toggle-password">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select class="form-control" name="level" id="level" required>
                                            <option value="admin">Admin</option>
                                            <option value="BSH">BSH (head of business)</option>
                                            <option value="ASM">ASM (Area Sales Manager)</option>
                                            <option value="KOOR">KOOR (Koordinator)</option>
                                            <option value="SPV">SPV (Supervisor)</option>
                                            <option value="DSR">DSR (Direct Sales Rep)</option>
                                            <option value="SDM">SDM (Staff Digitalisasi Merchant)</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_code">Atasan</label>
                                        <select class="form-control" name="parent_code" id="parent_code">
                                            <!-- Isi dropdown ini berdasarkan level yang dipilih -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="dob" id="dob" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="referral">Referral Code CIMB</label>
                                        <input type="text" class="form-control" name="referral" id="referral">
                                    </div>
                                    <!-- Tombol Cancel -->
                                    <a href="<?php echo site_url('admin/users'); ?>" class="btn btn-secondary">
                                        <i class="fas fa-times mr-2"></i> Cancel
                                    </a>
                                    <!-- Tombol Add User dengan class float-right -->
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fas fa-user-plus mr-2"></i> Add User
                                    </button>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script>
        $("#toggle-password").click(function() {
            var input = $("#password");
            var icon = $(this).find("i");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fas fa-eye").addClass("fas fa-eye-slash");
            } else {
                input.attr("type", "password");
                icon.removeClass("fas fa-eye-slash").addClass("fas fa-eye");
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#level').change(function() {
                var level = $(this).val();
                var parentLevel;
                switch (level) {
                    case 'DSR':
                    case 'SDM':
                        parentLevel = 'SPV';
                        break;
                    case 'SPV':
                        parentLevel = 'KOOR';
                        break;
                    case 'KOOR':
                        parentLevel = 'ASM';
                        break;
                    case 'ASM':
                        parentLevel = 'BSH';
                        break;
                    default:
                        parentLevel = null;
                }

                if (parentLevel) {
                    $.ajax({
                        url: '<?php echo site_url('admin/get_users_by_level/'); ?>' + parentLevel,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var options = '<option value="">Pilih Atasan</option>';
                            for (var i = 0; i < data.length; i++) {
                                options += '<option value="' + data[i].code + '">' + data[i].name + '</option>';
                            }
                            $('#parent_code').html(options);
                        }
                    });
                } else {
                    $('#parent_code').html('<option value="">Pilih Level terlebih dahulu</option>');
                }
            });
        });
    </script>
</body>

</html>