<?php
$type = $this->input->post('type');
$no = 1;
?>
<style>
    /* Mengatur ukuran teks pada modal */
    #dsrDetailsModal .modal-body {
        font-size: 0.8rem;
        overflow-x: auto;
        /* Menambahkan scroll horizontal */
    }

    /* Mengatur lebar modal */
    #dsrDetailsModal .modal-dialog {
        max-width: 90%;
        /* Anda dapat menyesuaikan ini sesuai kebutuhan */
    }
</style>

<?php
if ($type == 'cimb' && $data && isset($data[0]['jenis_skema'])) {
?>
    <!-- Tampilkan tabel CIMB -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Souvenir</th>
                    <th>Nama Nasabah</th>
                    <th>No Rek Nasabah</th>
                    <th>Nama Merchant</th>
                    <th>No MID</th>
                    <th>Alamat Merchant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['jenis_skema'] ?></td>
                        <td><?= $row['nama_nasabah'] ?></td>
                        <td><?= $row['no_rek_nasabah'] ?></td>
                        <td><?= $row['nama_toko_merchant'] ?></td>
                        <td><?= $row['no_mid'] ?></td>
                        <td>
                            <?php
                            echo $row['alamat_toko'] . ", " .
                                $row['kecamatan'] . ", " .
                                $row['kabupaten'] . ", " .
                                $row['provinsi'];
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
} elseif ($type == 'bsi' && $data && isset($data[0]['no_rek_bsi_syariah_nasabah'])) {
?>
    <!-- Tampilkan tabel BSI SYARIAH -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Nasabah</th>
                    <th>No HP Nasabah</th>
                    <th>No Rek BSI Nasabah</th>
                    <th>Kota Akuisisi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['nama_nasabah'] ?></td>
                        <td><?= $row['no_hp_nasabah'] ?></td>
                        <td><?= $row['no_rek_bsi_syariah_nasabah'] ?></td>
                        <td>
                            <?php
                            echo $row['kabupaten'] . ", " . $row['provinsi'];
                            ?>
                        <td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
} elseif ($type == 'uob' && $data && isset($data[0]['no_rek_nasabah'])) {
?>
    <!-- Tampilkan tabel UOB -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Souvenir</th>
                    <th>Nama Nasabah</th>
                    <th>No HP Nasabah</th>
                    <th>No Rek Nasabah</th>
                    <th>Kota Akuisisi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['jenis_skema'] ?></td>
                        <td><?= $row['nama_nasabah'] ?></td>
                        <td><?= $row['no_hp_nasabah'] ?></td>
                        <td><?= $row['no_rek_nasabah'] ?></td>
                        <td>
                            <?php
                            echo $row['kabupaten'] . ", " . $row['provinsi'];
                            ?>
                        <td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
} elseif ($type == 'line' && $data && isset($data[0]['no_rek_line_nasabah'])) {
?>
    <!-- Tampilkan tabel LINE BANK -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Nasabah</th>
                    <th>No HP Nasabah</th>
                    <th>No Rek Line Nasabah</th>
                    <th>Kota Akuisisi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['nama_nasabah'] ?></td>
                        <td><?= $row['no_hp_nasabah'] ?></td>
                        <td><?= $row['no_rek_line_nasabah'] ?></td>
                        <td>
                            <?php
                            echo $row['kabupaten'] . ", " . $row['provinsi'];
                            ?>
                        <td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
} elseif ($type == 'bpd' && $data && isset($data[0]['nik_nasabah'])) {
?>
    <!-- Tampilkan tabel BPD DIY SYARIAH -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Nasabah</th>
                    <th>NIK Nasabah</th>
                    <th>No HP Nasabah</th>
                    <th>Email Nasabah</th>
                    <th>Nama Merchant</th>
                    <th>Alamat Merchant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['nama_nasabah'] ?></td>
                        <td><?= $row['nik_nasabah'] ?></td>
                        <td><?= $row['no_hp_nasabah'] ?></td>
                        <td><?= $row['email_nasabah'] ?></td>
                        <td><?= $row['nama_merchant'] ?></td>
                        <td>
                            <?php
                            echo $row['alamat_merchant'] . ", " . $row['kecamatan'] . ", " . $row['kabupaten'] . ", " . $row['provinsi'];
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
} else {
    echo "<p>No data available.</p>";
}
