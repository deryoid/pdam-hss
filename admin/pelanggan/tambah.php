<?php
require '../../config/config.php';
require '../../config/koneksi.php';
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
                            <h1 class="m-0 text-dark">Pelanggan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                                <!-- <li class="breadcrumb-item active">Data Master</li> -->
                                <li class="breadcrumb-item active">Pelanggan</li>
                                <li class="breadcrumb-item active">Tambah Data</li>
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

                                    <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">No Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="no_pelanggan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nik">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_pelanggan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="kecamatan">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Lokasi Rumah</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" name="lokasi_rumah"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Golongan</label>
                                            <div class="col-sm-10">
                                            <select class="form control select2" name="id_golongan" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM golongan ORDER BY id_golongan DESC");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_golongan'] ?>"><?= $item['nama_golongan'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Link Gmap</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" name="link_gmap"></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/pelanggan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Simpan</i></button>
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
        $no_pelanggan        = $_POST['no_pelanggan'];
        $nik               = $_POST['nik'];
        $nama_pelanggan               = $_POST['nama_pelanggan'];
        $kecamatan          = $_POST['kecamatan'];
        $lokasi_rumah         = $_POST['lokasi_rumah'];
        $id_golongan         = $_POST['id_golongan'];
        $link_gmap          = $_POST['link_gmap'];



        $submit = $koneksi->query("INSERT INTO pelanggan VALUES (
            NULL,
            '$no_pelanggan',
            '$nik',
            '$nama_pelanggan',
            '$kecamatan',
            '$lokasi_rumah',
            '$id_golongan',
            '$link_gmap',
            'Tidak Aktif',
            'Belum Dipasang',
            NULL,
            NULL,
            NULL,
            NULL,
            NULL
            )");


       
        if ($submit) {

            $_SESSION['pesan'] = "Data Pelanggan Ditambahkan";
            echo "<script>window.location.replace('../pelanggan/');</script>";
        }
    }
    ?>


</body>

</html>