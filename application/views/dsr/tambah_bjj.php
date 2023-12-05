<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Input Data BJJ Digital</title>
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
                                        <p>TMRW by UOB</p>
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
                                <li class="breadcrumb-item active">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('dsr/bjj'); ?>">BJJ Digital</a></li>
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
                                    <strong>Form Input Data BJJ Digital</strong>
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

                                    <!-- MANDIRI Form -->
                                    <?php echo form_open_multipart('dsr/add_bjj', array('id' => 'bjjForm')); ?>
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
                                        <label for="jenis_tabungan">Jenis Tabungan:</label>
                                        <!-- Input untuk melakukan pencarian pada dropdown -->
                                        <select class="form-control" name="jenis_tabungan" id="jenis_tabungan" required>
                                            <option value="" disabled selected>Pilih Jenis Tabungan</option>
                                            <option value="REGULER">REGULER</option>
                                            <option value="DEPOSITO">DEPOSITO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="select_setoran">Setoran Awal:</label>
                                        <select class="form-control" name="select_setoran" id="select_setoran" required onchange="toggleNominalSetoran(this)">
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <option value="setoran">Setoran</option>
                                            <option value="non_setoran">Non Setoran</option>
                                        </select>
                                        <!-- Elemen untuk teks peringatan -->
                                        <span id="setoranAlert" style="display: none; color: red;">*Setoran: Silahkan mengisi nominal setoran pada kolom dibawah</span>
                                    </div>
                                    <div class="form-group" id="nominal_setoran_div" style="display:none;">
                                        <label for="nominal_setoran">Nominal Setoran (Rp):</label>
                                        <input type="text" class="form-control" name="nominal_setoran" id="nominal_setoran">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_nasabah">Nama Nasabah:</label>
                                        <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp_aktif_nasabah">No HP Nasabah:</label>
                                        <input type="text" class="form-control" name="no_hp_aktif_nasabah" id="no_hp_aktif_nasabah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_rek_nasabah">No Rekening Nasabah:</label>
                                        <input type="text" class="form-control" name="no_rek_nasabah" id="no_rek_nasabah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ss_dashboard">SS Dashboard:</label>
                                        <input type="file" class="form-control" name="ss_dashboard" id="ss_dashboard" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ss_saku_utama">SS Saku Utama:</label>
                                        <input type="file" class="form-control" name="ss_saku_utama" id="ss_saku_utama" required>
                                        <!-- Menampilkan gambar contoh di bawah input file -->
                                        <div class="mt-2">
                                            <p>Gambar Contoh:</p>
                                            <img src="<?php echo base_url('uploads/img/contoh3.jpeg'); ?>" alt="Contoh 1" style="width:100px; height:auto;">
                                            <img src="<?php echo base_url('uploads/img/contoh2.jpeg'); ?>" alt="Contoh 2" style="width:100px; height:auto;">
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 d-flex justify-content-between">
                                        <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Add BJJ Data</button>
                                    </div>
                                    <?php echo form_close(); ?>
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
        function toggleNominalSetoran(select) {
            var value = select.value;
            var div = document.getElementById('nominal_setoran_div');
            var alert = document.getElementById('setoranAlert');

            if (value == 'setoran') {
                div.style.display = 'block';
                alert.style.display = 'block'; // Tampilkan teks peringatan
            } else {
                div.style.display = 'none';
                alert.style.display = 'none'; // Sembunyikan teks peringatan
            }
        }
    </script>
    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function inputFormatRupiah() {
            var nominalInput = document.getElementById('nominal_setoran');
            nominalInput.addEventListener('keyup', function(e) {
                nominalInput.value = formatRupiah(this.value, 'Rp. ');
            });
        }

        inputFormatRupiah();
    </script>


</body>

</html>