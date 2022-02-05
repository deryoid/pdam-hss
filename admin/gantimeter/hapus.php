<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM ganti_meter WHERE id_gm = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Berhasil dihapus";
   echo "<script>window.location.replace('../gantimeter/');</script>";
}
