<?php
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    if ($mode == 'ubah') {
        $err = true;
        if (isset($_POST['simpan'])) {

            $kode = $_POST['kode_produk'];
            $nama = $_POST['nama_produk'];
            $jenis_produk = $_POST['jenis_produk'];
            $bahan = $_POST['jenis_bahan'];
            $warna = $_POST['warna'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            // var_dump($kode, $nama, $jenis_produk, $bahan, $ukuran, $warna, $stok);

            include('../../koneksi/koneksi.php');
            $err = false;
            $sql = "UPDATE produk set nama_produk = '$nama', jenis_produk = '$jenis_produk', jenis_bahan = '$bahan', warna = '$warna', harga = '$harga', stok = '$stok'
                    WHERE kode_produk = '$kode'";
            session_start();
            if (mysqli_query($koneksi, $sql)) {
                $_SESSION['simpan'] = 2;
            } else {
                $_SESSION['simpan'] = 9;
            }
            header("Location: ../../../front-end/page/main.php?page=master-produk");
            mysqli_close($koneksi);
        }
    }
}
