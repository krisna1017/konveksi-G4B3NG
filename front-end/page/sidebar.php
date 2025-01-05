<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">GABENG</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <?php
    if (isset($_SESSION[''])) {
        header("Location:../login.php");
    } else {
        if ($_SESSION['level'] == "admin") {
    ?>
            <ul class="menu-inner py-1">
                <!-- Dashboards -->
                <li class="menu-item  <?php if ($nav_active == 'dashboard') echo "active open" ?>" id="menu-dashboard">
                    <a href="main.php?page=dashboard" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-smile"></i>
                        <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>

                    </a>
                </li>

                <!-- Menu Master -->
                <li class="menu-item
                <?php
                if ($nav_active == 'master-pesanan' || $nav_active == 'master-produk' || $nav_active == 'master-produksi') echo "active open"
                ?>
                " id="menu-master">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
                        <div class="text-truncate" data-i18n="master">Master</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item <?php if ($nav_active == 'master-produk') echo "active open" ?>" id="master-produk">
                            <a href="main.php?page=master-produk" class="menu-link">
                                <div class="text-truncate" data-i18n="master-produk">Produk</div>
                            </a>
                        </li>
                        <li class="menu-item <?php if ($nav_active == 'master-pesanan') echo "active open" ?>" id="master-pesanan">
                            <a href="main.php?page=master-pesanan" class="menu-link">
                                <div class="text-truncate" data-i18n="master-pesanan">Pesanan</div>
                            </a>
                        </li>
                        <li class="menu-item <?php if ($nav_active == 'master-produksi') echo "active open" ?>" id="master-produksi">
                            <a href="main.php?page=master-produksi" class="menu-link">
                                <div class="text-truncate" data-i18n="master-produksi">Produksi</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Data User -->
                <li class="menu-item 
                <?php if ($nav_active == 'pengguna-pelanggan') echo "active open" ?>
                " id="menu-pengguna">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div class="text-truncate" data-i18n="pengguna">Pengguna</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item <?php if ($nav_active == 'pengguna-pelanggan') echo "active open" ?>" id="pengguna-pelanggan">
                            <a href="main.php?page=pengguna-pelanggan" class="menu-link">
                                <div class="text-truncate" data-i18n="pelanggan">Pelanggan</div>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Laporan -->
                <li class="menu-item
                <?php
                if ($nav_active == 'laporan-penjualan' || $nav_active == 'laporan-produksi' || $nav_active == 'laporan-pembayaran') echo "active open"
                ?>
                " id="menu-laporan">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-report"></i>
                        <div class=" text-truncate" data-i18n="Transaksi">Laporan</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item <?php if ($nav_active == 'laporan-penjualan') echo "active open" ?>" id="laporan-penjualan">
                            <a href="main.php?page=laporan-penjualan" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-collection"></i>
                                <div class="text-truncate" data-i18n="penjualan">Penjualan</div>
                            </a>
                        </li>
                        <li class="menu-item <?php if ($nav_active == 'laporan-produksi') echo "active open" ?>" id="laporan-produksi">
                            <a href="main.php?page=laporan-produksi" class="menu-link">
                                <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
                                <div class="text-truncate" data-i18n="produksi">Produksi</div>
                            </a>
                        </li>
                        <li class="menu-item <?php if ($nav_active == 'laporan-pembayaran') echo "active open" ?>" id="laporan-pembayaran">
                            <a href="main.php?page=laporan-pembayaran" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-dollar"></i>
                                <div class="text-truncate" data-i18n="pembayaran">Pembayaran</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php
        } else {
        ?>
            <ul class="menu-inner py-1">
                <li class="menu-item <?php if ($nav_active == 'pelanggan-produk') echo "active open" ?>" id="pelanggan-produk">
                    <a href="main.php?page=pelanggan-produk" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                        <div class="text-truncate" data-i18n="pelanggan-produk">Produk</div>
                    </a>
                </li>
                <li class="menu-item <?php if ($nav_active == 'pelanggan-pesanan') echo "active open" ?>" id="pelanggan-pesanan">
                    <a href="main.php?page=pelanggan-pesanan" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                        <div class="text-truncate" data-i18n="master-pesanan">Pesanan</div>
                    </a>
                </li>
            </ul>

    <?php
        }
    }
    ?>
</aside>