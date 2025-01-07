<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl-8 mb-6 order-0">
            <div class="card">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Hi <?= $_SESSION['username'] ?>! 🎉</h5>
                            <p class="mb-6">
                                Konveksi G3B4NG<br /><?= $_SESSION['level'] ?>
                            </p>

                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-6">
                            <img
                                src="../../assets/img/illustrations/man-with-laptop.png"
                                height="175"
                                class="scaleX-n1-rtl"
                                alt="View Badge User" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="flex-shrink-0">
                                    <h5>Data Penjualan</h5>
                                </div>
                                <div class="dropdown">
                                    <button
                                        class="btn p-0"
                                        type="button"
                                        id="cardOpt3"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1">Profit</p>
                            <?php
                            $query_tot_penjualan = mysqli_query($koneksi, "SELECT sum(total_harga) as total_penjualan from pesanan where status_pesanan = 'lunas'");
                            $data = mysqli_fetch_assoc($query_tot_penjualan);
                            ?>
                            <h5 class="card-title mb-3">Rp. <?= number_format($data['total_penjualan'], 2, ",", ".") ?></h5>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +100%</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="flex-shrink-0">
                                    <h5>Data Pelanggan</h5>
                                </div>
                                <div class="dropdown">
                                    <button
                                        class="btn p-0"
                                        type="button"
                                        id="cardOpt6"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1">Aktif</p>
                            <?php
                            $query_all_pelanggan = mysqli_query($koneksi, "SELECT count(*) from pelanggan");
                            $data = mysqli_fetch_array($query_all_pelanggan);
                            ?>
                            <h5 class="card-title mb-3"><?= $data['0'] ?></h5>
                            <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +100%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- statistik pesanan -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-1 me-2">Statistik Pesanan</h5>
                    </div>
                    <div class="dropdown">
                        <button
                            class="btn text-muted p-0"
                            type="button"
                            id="orederStatistics"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-6">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <?php
                            $query_tot_pesanan = mysqli_query($koneksi, "SELECT sum(jumlah) as total_pesanan from pesanan");
                            $data = mysqli_fetch_assoc($query_tot_pesanan);
                            ?>
                            <h3 class="mb-1"><?= $data['total_pesanan'] ?></h3>
                            <small>Total Pesanan</small>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <?php
                        $query_produk = mysqli_query($koneksi, "SELECT produk.kode_produk, produk.nama_produk, pesanan.jumlah from pesanan join produk using(kode_produk) group by produk.kode_produk ");
                        while ($data = mysqli_fetch_assoc($query_produk)) {
                        ?>
                            <li class="d-flex align-items-center mb-5">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-t-shirt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0"><?= $data['nama_produk'] ?></h6>
                                        <small><?= $data['kode_produk'] ?></small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0"><?= $data['jumlah'] ?></h6>
                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ statistik pesanan -->

        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 order-2 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Pembayaran</h5>
                    <div class="dropdown">
                        <button
                            class="btn text-muted p-0"
                            type="button"
                            id="transactionID"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <ul class="p-0 m-0">
                        <?php
                        $query_pembayaran = mysqli_query($koneksi, "SELECT pelanggan.username, pembayaran.metode_pembayaran, pembayaran.jumlah_bayar from pelanggan inner join pesanan using (id_pelanggan) inner join pembayaran using (id_pesanan) where status_pesanan = 'lunas'");
                        while ($data = mysqli_fetch_assoc($query_pembayaran)) {
                        ?>
                            <li class="d-flex align-items-center mb-6">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="../../assets/img/icons/unicons/wallet.png" alt="cash">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="d-block"><?= $data['metode_pembayaran'] ?></small>
                                        <h6 class="fw-normal mb-0"><?= $data['username'] ?></h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-2">
                                        <h6 class="fw-normal mb-0">+<?= number_format($data['jumlah_bayar'], 0, ",", ".") ?></h6>
                                        <span class="text-muted">Rp</span>
                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    </div>
</div>