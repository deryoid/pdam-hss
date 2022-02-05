<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM kebocoran WHERE id_kebocoran = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Berhasil dihapus";
   echo "<script>window.location.replace('../kebocoran/');</script>";
}
