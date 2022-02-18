<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;


$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA GANTI METER</title>
</head>

<body>


    <h3>
        <center><br>
            LAPORAN DATA GANTI METER<br>
        </center>
    </h3><br><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead class="bg-blue">
                        <tr align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Permintaan</th>
                            <th>Alamat</th>
                            <th>Nama Teknisi</th>
                            <th>Tanggal Perbaikan</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    $data = $koneksi->query("SELECT * FROM ganti_meter ORDER BY id_gm DESC");
                    while ($row = $data->fetch_array()) {
                    ?>
                        <tbody style="background-color: white">
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['tgl_permintaan'] ?></td>
                                <td><?= $row['link_gmap'] ?></td>
                                <td><?= $row['nama_teknisi'] ?></td>
                                <td><?= $row['tgl_perbaikan'] ?></td>
                                <td><?= $row['biaya'] ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
    <br>
    <!-- <label>Jumlah Pegawai : <?php echo "<b>" . $jumlah . ' Pegawai' . "</b>"; ?></label> -->
    <br>

    <br>
    </div>


</body>

</html>