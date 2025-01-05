<?php
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    if ($mode == 'tambah') {
        $err = true;
        if (isset($_POST['simpan'])) {

            $id = $_POST['id_pelanggan'];
            $nama = $_POST['nama_pelanggan'];
            $no_telepon = $_POST['no_telepon'];
            $user = $_POST['username'];
            $pass = $_POST['password'];

            // var_dump($id, $nama, $no_telepon, $username, $password);

            include('../../koneksi/koneksi.php');
            $err = false;
            $sql = "INSERT INTO pelanggan (id_pelanggan, nama, no_telepon, username, password)
                    VALUES ('$id', '$nama', '$no_telepon', '$user', '$pass')";
            session_start();
            if (mysqli_query($koneksi, $sql)) {
                $_SESSION['simpan'] = 1;
            } else {
                $_SESSION['simpan'] = 9;
            }
            header("Location: ../../../front-end/page/main.php?page=pengguna-pelanggan");
            mysqli_close($koneksi);
        }
    }
}
