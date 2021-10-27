<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");
$row  = $data->fetch_array();
?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include '../../templates/navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include '../../templates/sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Pemasangan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemasangan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- left column -->
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Pelanggan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                    <div class="row d-flex align-items-stretch">
                                        <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
                                            <div class="card bg-light">
                                                <div class="card-header text-muted border-bottom-0">
                                                NO . <?= $row['no_pelanggan'] ?>
                                                </div>
                                                <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                    <h2 class="lead"><b><?= $row['nama_pelanggan'] ?><sup>(<?= $row['nik']?>)</sup></b></h2>
                                                    <p class="text-muted text-sm"><b>Golongan: </b> 
                                                    <?php $data1 = $koneksi->query("SELECT * FROM pelanggan AS p
                                                    LEFT JOIN golongan AS g ON p.id_golongan = g.id_golongan
                                                     WHERE '$row[id_pelanggan]'")->fetch_array(); ?>
                                                    <?= $data1['nama_golongan'] ?> 
                                                    </p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat : <?= $row['lokasi_rumah'] ?></li>
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-check"></i></span> Status : <b><?= $row['status'] ?></b></li>
                                                    </ul>
                                                    </div>
                                                    <div class="col-5 text-center">
                                                    <img src="<?= base_url() ?>/assets/dist/img/avatar1.png" alt="user-avatar" class="img-circle img-fluid">
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="card-footer">
                                                
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Status Pemasangan</label>
                                            <div class="col-sm-10">
                                            <select class="form-control select2" data-placeholder="Pilih" id="status_pasang" name="status_pasang" required="">
                                                    <option value="Dipasang" <?php if ($row['status_pasang'] == "Dipasang") {
                                                                            echo "selected";
                                                                            } ?>>Dipasang</option>
                                                    <option value="Belum Dipasang" <?php if ($row['status_pasang'] == "Belum Dipasang") {
                                                                                echo "selected";
                                                                            } ?>>Belum Dipasang</option>
                                            </select>
                                            </div>
                                        </div>

                                    <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Bukti Pasang</label>
                                            <div class="col-sm-10">
                                            <a href="<?= base_url() ?>/filependukung/<?= $row['bukti_pasang'] ?>" data-toggle="lightbox" data-title="Foto Bukti"><i class="fa fa-images">Lihat Bukti Pasang</i></a><br><br>
                                                <input type="file" name="bukti_pasang">
                                            </div>
                                        </div> 


                                        
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Pemasangan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tgl_pemasangan" value="<?= $row['tgl_pemasangan'] ?>">
                                            </div>
                                        </div>
                                       
                                       

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/pelanggan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Ubah</i></button>
                                    </div>
                                    <!-- /.card-footer -->

                                </div>

                            </div>
                            <!--/.col (left) -->
                        </div>

                    </form>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once "../../templates/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once "../../templates/script.php"; ?>


    <?php
    if (isset($_POST['submit'])) {
        $tgl_pemasangan   = $_POST['tgl_pemasangan'];
        $status_pasang   = $_POST['status_pasang'];

        //upload foto mhs
        $e = "";
        // CEK APAKAH FOTO DIGANTI
                if (!empty($_FILES['bukti_pasang']['name'])) {
                    $bukti_pasanglama = $row['bukti_pasang'];
        
                    // UPLOAD bukti_pasang PEMOHON
                    $bukti_pasang      = $_FILES['bukti_pasang']['name'];
                    $x_bukti_pasang    = explode('.', $bukti_pasang);
                    $ext_bukti_pasang  = end($x_bukti_pasang);
                    $nama_bukti_pasang = rand(1, 99999) . '.' . $ext_bukti_pasang;
                    $size_bukti_pasang = $_FILES['bukti_pasang']['size'];
                    $tmp_bukti_pasang  = $_FILES['bukti_pasang']['tmp_name'];
                    $dir_bukti_pasang  = '../../filependukung/';
                    $allow_ext        = array('png', 'jpg', 'jpeg');
                    $allow_size       = 1024 * 1024 * 1;
                    // var_dump($nama_bukti_pasang); die();
        
                    if (in_array($ext_bukti_pasang, $allow_ext) === true) {
                        if ($size_bukti_pasang <= $allow_size) {
                            move_uploaded_file($tmp_bukti_pasang, $dir_bukti_pasang . $nama_bukti_pasang);
                            if (file_exists($dir_bukti_pasang . $bukti_pasanglama)) {
                                unlink($dir_bukti_pasang . $bukti_pasanglama);
                            }
                            $e .= "Upload Success"; 
                        } else {
                            echo "
                        <script type='text/javascript'>
                        setTimeout(function () {    
                            swal({
                                title: '',
                                text:  'Ukuran  Terlalu Besar, Maksimal 1 Mb',
                                type: 'warning',
                                timer: 3000,
                                showConfirmButton: true
                            });     
                        },10);  
                        window.setTimeout(function(){ 
                            window.history.back();
                        } ,2000);   
                        </script>";
                        }
                    } else {
                        echo "
                    <script type='text/javascript'>
                    setTimeout(function () {    
                        swal({
                            title: 'Format File Tidak Didukung',
                            text:  'Format File Harus Berupa PNG atau JPG',
                            type: 'warning',
                            timer: 3000,
                            showConfirmButton: true
                        });     
                    },10);  
                    window.setTimeout(function(){ 
                        window.history.back();
                    } ,2000);   
                    </script>";
                    }
                } else {    
                    $nama_bukti_pasang = $row['bukti_pasang']; 
                    $e .= "Upload Success!"; 
                }
        
        
        if (!empty($e)) {
        
                $submit = $koneksi->query("UPDATE pelanggan SET  
                                    status = 'Aktif',
                                    status_pasang = '$status_pasang',
                                    bukti_pasang = '$nama_bukti_pasang',
                                    tgl_pemasangan = '$tgl_pemasangan'
                                    WHERE 
                                    id_pelanggan = '$id'");
        // var_dump($submit, $koneksi->error); die();
        if ($submit) {
                    $_SESSION['pesan'] = "Data Pemasangan Ditambahkan";
                    echo "<script>window.location.replace('../pelanggan/');</script>";
                }
            }
            }
            ?>
</body>

</html>