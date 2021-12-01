<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;

    $kecamatan   = $_POST['kecamatan'];

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
  <title>LAPORAN DATA PELANGGAN</title>
</head>
<body>

    
    <h3><center><br>
      LAPORAN DATA PELANGGAN<br> 
      Di Kecamatan : <?= $kecamatan;?><br> 
    </center></h3><br><br>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                            <thead class="bg-blue">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>No Pelanggan</th>
                                                    <th>NIK</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Kecamatan</th>
                                                    <th>Lokasi Rumah</th>
                                                    <th>Golongan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM pelanggan AS sa 
                                            LEFT JOIN golongan AS g ON sa.id_golongan = g.id_golongan
                                            WHERE sa.kecamatan = '$kecamatan'");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td><?= $row['no_pelanggan'] ?></td>
                                                        <td><?= $row['nik'] ?></td>
                                                        <td><?= $row['nama_pelanggan'] ?></td>
                                                        <td><?= $row['kecamatan'] ?></td>
                                                        <td><?= $row['lokasi_rumah'] ?></td>
                                                        <td><?= $row['nama_golongan'] ?></td>
                                                        <td><?= $row['status'] ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<!-- <label>Jumlah Pegawai : <?php echo "<b>".$jumlah.' Pegawai'."</b>"; ?></label> -->
<br>

<br>
</div> 


</body>
</html>