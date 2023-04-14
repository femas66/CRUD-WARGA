<?php
include 'koneksi.php';
if(isset($_GET['hapus_vaksin'])){
  $id = $koneksi->real_escape_string($_GET['hapus_vaksin']);
  $q = $koneksi->query("DELETE FROM vaksin WHERE id_vaksin = '$id'");
  header("location: halaman-vaksin.php");
}
if(isset($_GET['hapus_pekerjaan'])){
  $id = $koneksi->real_escape_string($_GET['hapus_pekerjaan']);
  $q = $koneksi->query("DELETE FROM pekerjaan WHERE id_pekerjaan = '$id'");
  header("location: halaman-pekerjaan.php");
}
if(isset($_GET['hapus_hobi'])){
  $id = $koneksi->real_escape_string($_GET['hapus_hobi']);
  $q = $koneksi->query("DELETE FROM hobi WHERE id_hobi = '$id'");
  header("location: halaman-hobi.php");
}
if(isset($_GET['hapus_agama'])){
  $id = $koneksi->real_escape_string($_GET['hapus_agama']);
  $q = $koneksi->query("DELETE FROM agama WHERE id_agama = '$id'");
  header("location: halaman-agama.php");
}
if(isset($_GET['hapus_warga'])) {
  $id = $koneksi->real_escape_string($_GET['hapus_warga']);
  $ambil_data = $koneksi->query("SELECT * FROM warga WHERE id = '$id'");
  $data_gambar = $ambil_data->fetch_array();
  unlink('gambar/' . $data_gambar['foto']);
  $q = $koneksi->query("DELETE FROM warga WHERE id = '$id'");
  header("location: index.php");
}