<?php
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    if ($mode == 'ubah') {
        $err = true;
        if (isset($_POST['simpan'])) {

            $id = $_POST['id_pelanggan'];
            $nama = $_POST['nama_pelanggan'];
            $no_telepon = $_POST['no_telepon'];
            $user = $_POST['username'];
            $pass = $_POST['password'];
            // var_dump($kode, $nama, $jenis_produk, $bahan, $ukuran, $warna, $stok);

            include('../../koneksi/koneksi.php');
            $err = false;
            $sql = "UPDATE pelanggan set nama = '$nama', no_telepon = '$no_telepon', username = '$user', password = '$pass'
                    WHERE id_pelanggan = '$id'";
            session_start();
            if (mysqli_query($koneksi, $sql)) {
                $_SESSION['simpan'] = 2;
            } else {
                $_SESSION['simpan'] = 9;
            }
            header("Location: ../../../front-end/page/main.php?page=pengguna-pelanggan");
            mysqli_close($koneksi);
        }
    }
}
