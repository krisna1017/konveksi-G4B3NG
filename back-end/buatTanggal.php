<?php
include('../back-end/koneksi/koneksi.php');

$id = $_POST['id_pembayaran'];
$tampil = mysqli_query($koneksi, "SELECT tanggal_pembayaran FROM pembayaran WHERE id_pembayaran = '$id'");
$hasil = mysqli_fetch_assoc($tampil);
$cek_data = mysqli_num_rows($tampil);
if ($cek_data > 0) {
    // $_SESSION['tanggal_bayar'] = $hasil['tanggal_pembayaran'];
    $bulanTahun = substr($hasil['tanggal_pembayaran'], 0, 7);
    $ambil_tanggal = substr($hasil['tanggal_pembayaran'], 8, 10);
    $hari = 3;
    $tanggal = $ambil_tanggal + $hari;
    $fix_tanggal = str_pad($tanggal, 2, '0', STR_PAD_LEFT);
    echo $bulanTahun . '-' . $fix_tanggal;
} else {
    echo "";
}
