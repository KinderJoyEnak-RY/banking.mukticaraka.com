<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah BPD DIY Data</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="card" style="height: 100%; padding: 10px;">
                    <div class="card-header text-center bg-danger text-white">
                        <strong>Tambah BPD Data</strong>
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

                        <!-- BPD Form -->
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
                        <div class="form-group mt-4 d-flex justify-content-between">
                            <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add BPD Data</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

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