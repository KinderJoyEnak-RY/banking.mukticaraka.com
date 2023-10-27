<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPD DIY SYARIAH</title>
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
                                    <a href="<?php echo site_url('dsr/bpd'); ?>" class="nav-link active">
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
                                    <a href="<?php echo site_url('dsr/mandiri'); ?>" class="nav-link">
                                        <p>MANDIRI</p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo site_url('dsr/uob'); ?>" class="nav-link">
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
                            <h1>BPD DIY Data</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBpdModal">Add BPD DIY</a>
                            <div id="notification" class="alert" style="display:none;">
                                <span id="notification-message"></span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Mitra Code</th>
                                            <th class="text-center">DSR</th>
                                            <th class="text-center">Nama Nasabah</th>
                                            <th class="text-center">No HP Nasabah</th>
                                            <th class="text-center">Email Nasabah</th>
                                            <th class="text-center">NIK Nasabah</th>
                                            <th class="text-center">Nama Toko</th>
                                            <th class="text-center">Alamat Toko</th>
                                            <th class="text-center">Foto KTP Nasabah</th>
                                            <th class="text-center">Foto Toko</th>
                                            <th class="text-center">SPV</th>
                                            <th class="text-center">KOOR</th>
                                            <th class="text-center">ASM</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (!empty($bpd_forms)) { // Cek apakah $bpd_forms tidak kosong
                                            foreach ($bpd_forms as $form) :
                                        ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $form['tanggal']; ?></td>
                                                    <td><?php echo $form['dsr_code']; ?></td>
                                                    <td><?php echo $form['dsr_name']; ?></td>
                                                    <td><?php echo $form['nama_nasabah']; ?></td>
                                                    <td><?php echo $form['no_hp_nasabah']; ?></td>
                                                    <td><?php echo $form['email_nasabah']; ?></td>
                                                    <td><?php echo $form['nik_nasabah']; ?></td>
                                                    <td><?php echo $form['nama_merchant']; ?></td>
                                                    <td>
                                                        <?php
                                                        echo $form['alamat_merchant'] . ", " .
                                                            $form['kecamatan'] . ", " .
                                                            $form['kabupaten'] . ", " .
                                                            $form['provinsi'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo base_url('uploads/' . $form['foto_ktp_nasabah']); ?>" width="40" alt="Foto Ktp Nasabah" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['foto_ktp_nasabah']); ?>">
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo base_url('uploads/' . $form['foto_toko']); ?>" width="40" alt="Foto Toko" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['foto_toko']); ?>">
                                                    </td>
                                                    <td><?php echo $form['spv']; ?></td>
                                                    <td><?php echo $form['koor']; ?></td>
                                                    <td><?php echo $form['asm']; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('dsr/delete_bpd/' . $form['id']); ?>" class="btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
        <div class="modal fade" id="addBpdModal" tabindex="-1" aria-labelledby="addBpdModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBpdModalLabel">Add BPD DIY</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <?php echo form_open_multipart('dsr/add_bpd', array('id' => 'bpdForm')); ?>
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
                                    <label for="nama_nasabah">Nama Nasabah:</label>
                                    <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp_nasabah">No HP Nasabah:</label>
                                    <input type="text" class="form-control" name="no_hp_nasabah" id="no_hp_nasabah" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_nasabah">Email Nasabah:</label>
                                    <input type="text" class="form-control" name="email_nasabah" id="email_nasabah" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik_nasabah">NIK Nasabah:</label>
                                    <input type="text" class="form-control" name="nik_nasabah" id="nik_nasabah" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_merchant">Nama Toko:</label>
                                    <input type="text" class="form-control" name="nama_merchant" id="nama_merchant" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_merchant">Alamat Toko:</label>
                                    <small style="color:red; font-style:italic;">*alamat jalan, dusun, kelurahan, mall dll</small>
                                    <input type="text" class="form-control" name="alamat_merchant" id="alamat_merchant" required>
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
                                    <label for="kecamatan">Kecamatan:</label>
                                    <select class="form-control" name="kecamatan" id="kecamatan">
                                        <!-- Isi dari API setelah kabupaten/kota dipilih -->
                                    </select>
                                    <input type="hidden" name="kecamatan_name" id="kecamatan_name">
                                </div>
                                <div class="form-group">
                                    <label for="foto_ktp_nasabah">Foto KTP Nasabah:</label>
                                    <input type="file" class="form-control" name="foto_ktp_nasabah" id="foto_ktp_nasabah" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto_toko">Foto Toko:</label>
                                    <input type="file" class="form-control" name="foto_toko" id="foto_toko" required>
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
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitBtn">Add BPD Data</button>
                    </div>
                </div>
            </div>
        </div>

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
        $("#submitBtn").click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#bpdForm')[0]);
            $.ajax({
                url: "<?php echo site_url('dsr/add_bpd'); ?>",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var jsonResponse = JSON.parse(response); // Parse JSON response
                    if (jsonResponse.status === 'error') {
                        $('#notification').removeClass('alert-success').addClass('alert-danger').show();
                    } else {
                        $('#addBpdModal').modal('hide');
                        $('#notification').removeClass('alert-danger').addClass('alert-success').show();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                    $('#notification-message').text(jsonResponse.message);
                },
                error: function() {
                    $('#notification').removeClass('alert-success').addClass('alert-danger').show();
                    $('#notification-message').text('Terjadi kesalahan pada server.');
                }
            });
        });
    </script>
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
                $.ajax({
                    url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + kabupatenId,
                    method: "GET",
                    success: function(data) {
                        $("#kecamatan").empty();
                        $.each(data.kecamatan, function(key, value) {
                            $("#kecamatan").append('<option value="' + value.id + '">' + value.nama + '</option>');
                        });
                    }
                });
            });

            $("#kecamatan").change(function() {
                $("#kecamatan_name").val($("#kecamatan option:selected").text());
                // ... Anda bisa menambahkan kode lain di sini jika diperlukan ...
            });
        });
    </script>

</body>

</html>