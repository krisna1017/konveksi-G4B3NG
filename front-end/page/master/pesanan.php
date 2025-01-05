<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="col-lg-12 col-md-6">
            <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
                <div>
                    <h5>Daftar Pesanan Pelanggan</h5>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>No</strong></th>
                            <th><strong>Nama pelanggan</strong></th>
                            <th><strong>Id pesanan</strong></th>
                            <th><strong>Nama produk</strong></th>
                            <th><strong>Jenis produk</strong></th>
                            <th><strong>Harga</strong></th>
                            <th><strong>Jumlah beli</strong></th>
                            <th><strong>Total harga</strong></th>
                            <th><strong>Status pesanan</strong></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        include('../../back-end/master/pesanan/daftarPesanan.php')
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    <div
        class="bs-toast toast toast-placement-ex m-2"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
        data-bs-delay="2000">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-medium">Informasi</div>

            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="pesanToast"></div>
    </div>
    <!-- Page JS -->
    <button id="showToastPlacement" class="hide" style="display : none;">show toast</button>
    <script src="../../assets/js/ui-toasts.js"></script>



</div