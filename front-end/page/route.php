 <?php
    // Get the requested page from the URL
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

    // Sanitize the page name
    $page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);

    // Build the file path
    if ($_SESSION["level"] == "admin") {
        if ($page == 'dashboard') $page = 'dashboard';
        else if ($page == 'master-produk') $page = 'master/produk';
        else if ($page == 'master-pesanan') $page = 'master/pesanan';
        else if ($page == 'master-produksi') $page = 'master/produksi';
        else if ($page == 'pengguna-pelanggan') $page = 'pengguna/pelanggan';
        else if ($page == 'laporan-penjualan') $page = 'laporan/penjualan';
        else if ($page == 'laporan-produksi') $page = 'laporan/produksi';
        else if ($page == 'laporan-pembayaran') $page = 'laporan/pembayaran';
    } else if ($_SESSION["level"] == "pelanggan") {
        if ($page == 'pelanggan-produk') $page = 'pelanggan/produk';
        if ($page == 'pelanggan-pesanan') $page = 'pelanggan/pesanan';
        if ($page == 'pelanggan-pembayaran') $page = 'pelanggan/pembayaran';
    }


    $file = $page . '.php';
    // echo $file;
    // Check if the file exists
    if (file_exists($file)) {
        include $file;
    } else {
        echo '<h1>Page not found</h1>';
    }
    ?>