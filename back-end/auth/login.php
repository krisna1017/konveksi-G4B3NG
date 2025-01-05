<!-- proses login -->
<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    include('../back-end/koneksi/koneksi.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' and password = '$password'") or die(mysqli_error($koneksi));
    $data_admin = mysqli_fetch_assoc($query_admin);
    $cek_data = mysqli_num_rows($query_admin);

    $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE username = '$username' and password = '$password'") or die(mysqli_error($koneksi));
    $data_pelanggan = mysqli_fetch_assoc($query_pelanggan);
    $cek_data2 = mysqli_num_rows($query_pelanggan);

    session_start();
    if ($cek_data > 0) {
        $_SESSION['id_admin'] = $data_admin['id_admin'];
        $_SESSION['username'] = $data_admin['username'];
        $_SESSION['level'] = $data_admin['level'];
        header('Location: page/main.php?page=dashboard');
    } else if ($cek_data2 > 0) {
        $_SESSION['id_pelanggan'] = $data_pelanggan['id_pelanggan'];
        $_SESSION['username'] = $data_pelanggan['username'];
        $_SESSION['level'] = "pelanggan";
        header('Location: page/main.php?page=pelanggan-produk');
    } else {
        // echo "<script>alert('gagal')</script>";
        echo "<script> $(document).ready(function() { 

                    const toastPlacementExample = document.querySelector('.toast-placement-ex'),
                    toastPlacementBtn = document.querySelector('#showToastPlacement');
                    let selectedType, selectedPlacement, toastPlacement;
                    selectedType = 'bg-warning';
                    selectedPlacement = 'top-0 end-0'.split(' ');

                    toastPlacementExample.classList.add(selectedType);
                    DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);
                    toastPlacement = new bootstrap.Toast(toastPlacementExample);
                    toastPlacement.show();

                })  ;
            </script>";
    }
}
?>