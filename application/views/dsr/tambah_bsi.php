<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Input Data BSI Syariah</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <style>
        .nav .nav-treeview .nav-icon.sub-menu-icon {
            font-size: 0.6em !important;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Responsive button */
        @media (max-width: 768px) {
            .form-group button {
                width: 100%;
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
                                    <a href="<?php echo site_url('dsr/bsi'); ?>" class="nav-link active">
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
                                    <a href="<?php echo site_url('dsr/bjj'); ?>" class="nav-link">
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
                            <h1>BSI Syariah</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('dsr/bsi'); ?>">BSI Syariah</a></li>
                                <li class="breadcrumb-item active">Input Data</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="height: 100%; padding: 10px;">
                                <div class="card-header text-center bg-green text-white">
                                    <strong>Form Input Data BSI Syariah</strong>
                                </div>
                                <div class="card-body" style="padding: 10px;">

                                    <!-- Alert Messages -->
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

                                    <!-- BSI Form -->
                                    <?php echo form_open_multipart('dsr/add_bsi', array('id' => 'bsiForm')); ?>
                                    <!-- Your form fields go here. For example: -->
                                    <div class="form-group">
                                        <label for="dsr_code">Mitra Code:</label>
                                        <input type="text" class="form-control" name="dsr_code" id="dsr_code" value="<?php echo $this->session->userdata('code'); ?>" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="dsr_name">DSR:</label>
                                        <input type="text" class="form-control" name="dsr_name" id="dsr_name" value="<?php echo $this->session->userdata('name'); ?>" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="spv">SPV:</label>
                                        <input type="text" class="form-control" name="spv" id="spv" value="<?php echo $supervisors['spv']; ?>" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="koor">KOOR:</label>
                                        <input type="text" class="form-control" name="koor" id="koor" value="<?php echo $supervisors['koor']; ?>" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="asm">ASM:</label>
                                        <input type="text" class="form-control" name="asm" id="asm" value="<?php echo $supervisors['asm']; ?>" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_nasabah">Nama Nasabah:</label>
                                        <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp_nasabah">No Telepon Nasabah:</label>
                                        <input type="text" class="form-control" name="no_hp_nasabah" id="no_hp_nasabah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_rek_bsi_syariah_nasabah">No Rek BSI Syariah Nasabah:</label>
                                        <small style="color:red; font-style:italic;">*No Rekening wajib<b> harus 10 angka</b></small>
                                        <input type="text" class="form-control" name="no_rek_bsi_syariah_nasabah" id="no_rek_bsi_syariah_nasabah" required minlength="10" maxlength="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="kota">Provinsi/Kota Akuisisi:</label>
                                        <input type="text" class="form-control" name="kota" id="kota" placeholder="Pilih provinsi dan kabupaten dibawah ini " readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi:</label>
                                        <select class="form-control" name="provinsi" id="provinsi">
                                            <!-- Isi dari API -->
                                        </select>
                                        <input type="hidden" name="provinsi_name" id="provinsi_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="kabupaten">Kabupaten/Kota:</label>
                                        <select class="form-control" name="kabupaten" id="kabupaten">
                                            <!-- Isi dari API setelah provinsi dipilih -->
                                        </select>
                                        <input type="hidden" name="kabupaten_name" id="kabupaten_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto_ktp_nasabah">Foto KTP Nasabah:</label>
                                        <input type="file" class="form-control" name="foto_ktp_nasabah" id="foto_ktp_nasabah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ss_info_rekening">Screenshot Info Rekening:</label>
                                        <input type="file" class="form-control" name="ss_info_rekening" id="ss_info_rekening" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ss_dashboard">Screenshot Dashboard BSI Syariah:</label>
                                        <input type="file" class="form-control" name="ss_dashboard" id="ss_dashboard" required>
                                    </div>
                                    <div class="form-group mt-4 d-flex justify-content-between">
                                        <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Add BSI Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
    <script>
        $(document).ready(function() {
            // Ambil data provinsi
            $.ajax({
                url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
                method: "GET",
                success: function(data) {
                    // Isi dropdown provinsi dengan data dari API
                    $.each(data.provinsi, function(key, value) {
                        $("#provinsi").append('<option value="' + value.id + '">' + value.nama + '</option>');
                    });
                }
            });

            $("#provinsi").change(function() {
                var provinsiId = $(this).val(); // Mendefinisikan provinsiId
                $("#provinsi_name").val($("#provinsi option:selected").text());
                $.ajax({
                    url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + provinsiId,
                    method: "GET",
                    success: function(data) {
                        $("#kabupaten").empty();
                        $.each(data.kota_kabupaten, function(key, value) {
                            $("#kabupaten").append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                    }
                });
            });

            $("#kabupaten").change(function() {
                var kabupatenId = $(this).val(); // Mendefinisikan kabupatenId
                $("#kabupaten_name").val($("#kabupaten option:selected").text());
            });
        });
    </script>

</body>

</html>