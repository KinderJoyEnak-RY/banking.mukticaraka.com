<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIMB</title>
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
                                    <a href="<?php echo site_url('dsr/cimb'); ?>" class="nav-link active">
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
                            <h1>CIMB Data</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCimbModal">Add CIMB Data</a>
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
                                            <th class="text-center">Souvenir</th>
                                            <th class="text-center">Nama Nasabah</th>
                                            <th class="text-center">No Rek Nasabah</th>
                                            <th class="text-center">Nama Toko</th>
                                            <th class="text-center">No MID</th>
                                            <th class="text-center">Alamat Toko</th>
                                            <th class="text-center">Beranda OCTO</th>
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
                                        if (!empty($cimb_forms)) { // Cek apakah $bpd_forms tidak kosong
                                            foreach ($cimb_forms as $form) :
                                        ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $form['tanggal']; ?></td>
                                                    <td><?php echo $form['dsr_code']; ?></td>
                                                    <td><?php echo $form['dsr_name']; ?></td>
                                                    <td><?php echo $form['jenis_skema']; ?></td>
                                                    <td><?php echo $form['nama_nasabah']; ?></td>
                                                    <td><?php echo $form['no_rek_nasabah']; ?></td>
                                                    <td><?php echo $form['nama_toko_merchant']; ?></td>
                                                    <td><?php echo $form['no_mid']; ?></td>
                                                    <td>
                                                        <?php
                                                        echo $form['alamat_toko'] . ", " .
                                                            $form['kecamatan'] . ", " .
                                                            $form['kabupaten'] . ", " .
                                                            $form['provinsi'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo base_url('uploads/' . $form['dashboard_octo_merchant']); ?>" width="40" alt="Octo Dashboard" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['dashboard_octo_merchant']); ?>">
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo base_url('uploads/' . $form['foto_toko']); ?>" width="40" alt="Foto Toko" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $form['foto_toko']); ?>">
                                                    </td>
                                                    <td><?php echo $form['spv']; ?></td>
                                                    <td><?php echo $form['koor']; ?></td>
                                                    <td><?php echo $form['asm']; ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('dsr/delete_cimb/' . $form['id']); ?>" class="btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
        <div class="modal fade" id="addCimbModal" tabindex="-1" aria-labelledby="addCimbModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCimbModalLabel">Add CIMB Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <?php echo form_open_multipart('dsr/add_cimb', array('id' => 'cimbForm')); ?>
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
                                    <label for="jenis_skema">Souvenir:</label>
                                    <select class="form-control" name="jenis_skema" id="jenis_skema" required>
                                        <option value="minyak">Minyak</option>
                                        <option value="non_minyak">Non-Minyak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_nasabah">Nama Nasabah:</label>
                                    <input type="text" class="form-control" name="nama_nasabah" id="nama_nasabah" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_rek_nasabah">No Rek Nasabah:</label>
                                    <input type="text" class="form-control" name="no_rek_nasabah" id="no_rek_nasabah" required minlength="12" maxlength="12">
                                </div>
                                <div class="form-group">
                                    <label for="nama_toko_merchant">Nama Toko:</label>
                                    <input type="text" class="form-control" name="nama_toko_merchant" id="nama_toko_merchant" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_mid">No Merchant ID:</label>
                                    <small style="color:red; font-style:italic;">No MID <b>ada di email</b> aktivasi</small>
                                    <input type="text" class="form-control" name="no_mid" id="no_mid" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_toko">Alamat Toko:</label>
                                    <small style="color:red; font-style:italic;">*alamat jalan, dusun, kelurahan</small>
                                    <input type="text" class="form-control" name="alamat_toko" id="alamat_toko" required>
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
                                    <label for="dashboard_octo_merchant">Dashboard Octo Merchant:</label>
                                    <input type="file" class="form-control" name="dashboard_octo_merchant" id="dashboard_octo_merchant" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto_toko">Foto Toko Tampak Depan:</label>
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
                        <button type="button" class="btn btn-primary" id="submitBtn">Add CIMB Data</button>
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
            var formData = new FormData($('#cimbForm')[0]);
            var noRekNasabah = $("#no_rek_nasabah").val();
            if (noRekNasabah.length !== 12 || isNaN(noRekNasabah)) {
                alert("No Rek Nasabah harus terdiri dari 12 angka.");
                return;
            }
            $.ajax({
                url: "<?php echo site_url('dsr/add_cimb'); ?>",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    try {
                        var jsonResponse = JSON.parse(response);
                        if (jsonResponse.status === 'error') {
                            $('#notification').removeClass('alert-success').addClass('alert-danger').show();
                        } else {
                            $('#addCimbModal').modal('hide');
                            $('#notification').removeClass('alert-danger').addClass('alert-success').show();
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }
                        $('#notification-message').text(jsonResponse.message);
                    } catch (e) {
                        $('#notification').removeClass('alert-success').addClass('alert-danger').show();
                        $('#notification-message').text('Unexpected server response. Please try again later.');
                    }
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