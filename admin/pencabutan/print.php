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
  <title>LAPORAN DATA PENCABUTAN WATER METER</title>
</head>
<body>

    
    <h3><center><br>
      LAPORAN DATA PENCABUTAN WATER METER
    </center></h3><br><br>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                            <thead class="bg-blue">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>No Pelanggan</th>
                                                    <th>Pelanggan</th>
                                                    <th>Status</th>
                                                    <th>Status Cabut</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM pelanggan AS sa 
                                            LEFT JOIN golongan AS g ON sa.id_golongan = g.id_golongan
                                            WHERE sa.status_cabut = 'Dicabut' ORDER BY sa.id_pelanggan DESC");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['no_pelanggan'] ?></td>
                                                        <td>
                                                            <ul>
                                                                <li><?= $row['nik'] ?></li>
                                                                <li><?= $row['nama_pelanggan'] ?></li>
                                                                <li><?= $row['kecamatan'] ?></li>
                                                                <li><?= $row['lokasi_rumah'] ?></li>
                                                                <li><?= $row['nama_golongan'] ?></li>
                                                            </ul>
                                                        </td>
                                                        <td><?= $row['status'] ?></td>
                                                        <td>
                                                            <?= $row['status_cabut'] ?> 
                                                        </td>
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