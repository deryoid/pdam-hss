<aside class="main-sidebar sidebar-light-blue elevation-2" >
  <!-- dark-primary  -->
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>/assets/dist/img/logo.jpg" style="width: 50px;" alt="#" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light"><b> PDAM HSS</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/assets/dist/img/avatar1.png" class="img-circle elevation-1" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <i>
            <?php
            if ($_SESSION['role'] == "Administrator") {
              echo "Admin";
            } elseif ($_SESSION['role'] == "Teknisi") {
              echo $_SESSION['nama_petugas'];
            }
            ?>
          </i>
        </a>
      </div>
    </div>




    <?php if ($_SESSION['role'] == "Administrator") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/golongan') ?>" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Golongan</p>
                </a>
              </li>
            </ul>
<!--            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/petugas') ?>" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Petugas</p>
                </a>
              </li>
            </ul> -->
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/pemasangan') ?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Pemasangan Water Meter
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/pencabutan') ?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Pencabutan Water Meter
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/golongan/print') ?>" target="blank" class="nav-link">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Golongan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/pelanggan/printseluruh') ?>" target="blank" class="nav-link">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Seluruh Pelanggan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" data-toggle="modal" data-target="#modal_printpk" class="nav-link">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Pelanggan Per-Kecamatan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" data-toggle="modal" data-target="#modal_printpg" class="nav-link">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Pelanggan Per-Golongan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/pemasangan/print') ?>" target="blank" class="nav-link">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Pemasangan Water Meter</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/pencabutan/print') ?>" target="blank" class="nav-link">
                  <i class="fas fa-print nav-icon"></i>
                  <p>Pencabutan Water Meter</p>
                </a>
              </li>
            </ul>
          </li>
         


        </ul>
      </nav>
      <!-- /.sidebar-menu -->



    <?php } elseif ($_SESSION['role'] == "Teknisi") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('teknisi/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('teknisi/lokasiatm') ?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
               List Lokasi ATM
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= base_url('teknisi/perbaikan') ?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Progres Perbaikan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('teknisi/perbaikan_selesai') ?>" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Perbaikan Selesai
              </p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="<?= base_url('teknisi/maintance') ?>" class="nav-link">
              <i class="nav-icon fas fa-toolbox"></i>
              <p>
                Pemeliharaan
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <?php } ?>
  </div>
  <!-- /.sidebar -->
</aside>


 <!-- MODAL Print -->
 <div id="modal_printpk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
    <!-- Start content -->
        <div class="content">
            <div class="container"> 
                <div class="row">
                     <div class="col-sm-12">
                          <div class="card-box">
                                <form class="form-horizontal" action="<?= base_url('admin/pelanggan/print') ?>" method="POST" target="blank">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Pilih Kecamatan </label>
                                            <div class="col-sm-12">
                                            <select class="form control select2" name="kecamatan" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT kecamatan FROM pelanggan GROUP BY kecamatan");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['kecamatan'] ?>"><?= $item['kecamatan'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="submit" name="print" class="btn btn-success" value="Print">
                                        

                                </form>
                                       
                                </div>
                            </div>                          
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>



 <!-- MODAL Print -->
 <div id="modal_printpg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
    <!-- Start content -->
        <div class="content">
            <div class="container"> 
                <div class="row">
                     <div class="col-sm-12">
                          <div class="card-box">
                                <form class="form-horizontal" action="<?= base_url('admin/pelanggan/printgol') ?>" method="POST" target="blank">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Pilih Golongan </label>
                                            <div class="col-sm-12">
                                            <select class="form control select2" name="nama_golongan" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd1 = $koneksi->query("SELECT * FROM golongan");
                                                    foreach ($sd1 as $item1) {
                                                    ?>
                                                        <option value="<?= $item1['nama_golongan'] ?>"><?= $item1['nama_golongan'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="submit" name="print" class="btn btn-success" value="Print">
                                        

                                </form>
                                       
                                </div>
                            </div>                          
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>