<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="col-lg-12 col-md-6">
            <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
                <div>
                    <h5>Data Pesanan</h5>
                </div>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center"><strong>No</strong></th>
                        <th><strong>Id Pesanan</strong></th>
                        <th><strong>Nama Produk</strong></th>
                        <th><strong>Jumlah</strong></th>
                        <th><strong>Total Harga</strong></th>
                        <th><strong>Tanggal Pesanan</strong></th>
                        <th><strong>Status Pesanan</strong></th>
                        <th class='text-center'><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    include("../../back-end/pelanggan/pesananView.php");
                    ?>
                </tbody>

                <!-- modal proses bayar -->
                <div class="modal fade" id="modalUpdate" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form id="tambahpesanan"
                                action="<?php echo '../../back-end/pelanggan/prosesBayar.php'; ?>"
                                method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Maintenance Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-6" style="display: none;">
                                            <label for="txtKode" class="form-label">Kode produk</label>
                                            <input type="text" class="form-control" id="txtKodeEdit" name="kode_produk" style="display: none;">
                                            <input type="text" class="form-control" id="txtKodeEditView" name="kode_produk" disabled>
                                        </div>
                                    </div>
                                    <div class="row g-6">
                                        <div class="col mb-6">
                                            <label for="txtIdPembayaran" class="form-label">Id Pembayaran</label>
                                            <input type="text" id="txtIdPembayaran" class="form-control"
                                                name="id_pembayaran" readonly required>
                                        </div>
                                    </div>
                                    <div class="row g-6">
                                        <div class="col mb-6">
                                            <label for="txtIdPesan" class="form-label">Id Pesanan</label>
                                            <input type="text" id="txtIdPesan" class="form-control"
                                                name="id_pesanan" readonly required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtTotal" class="form-label">Total Harga</label>
                                            <input type="text" id="txtTotal" class="form-control" name="total" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtBayar" class="form-label">Bayar</label>
                                            <input type="text" id="txtBayar" class="form-control"
                                                name="bayar" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtMetode" class="form-label">Metode Pembayaran</label>
                                            <input type="text" id="txtMetode" class="form-control"
                                                name="metode" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtTanggal" class="form-label">Tanggal Pembayaran</label>
                                            <input type="text" id="txtTanggal" class="form-control"
                                                name="tanggal" readonly>
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <div class="col mb-6">
                                            <label for="txtStatus" class="form-label">Status Pesanan</label>
                                            <input type="text" id="txtStatus" class="form-control"
                                                name="status" readonly>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Bayar"></input>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>

                <!-- modal detail pesanan -->
                <div class="modal fade" id="modalDetailPesanan" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form action="#">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Detail Pesanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Id pesanan</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="idPesanan" id="idPesanan" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Nama produk</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="namaProduk" id="namaProduk" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Ukuran S</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="namaProduk" id="ukuranS" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Ukuran M</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="namaProduk" id="ukuranM" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6" style="display: none;">
                                        <div class="col-4">
                                            <span>Ukuran L</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="namaProduk" id="ukuranL" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Ukuran XL</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="namaProduk" id="ukuranXL" required>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <!-- modal detail pembayaran -->
                <div class="modal fade" id="modalDetailPembayaran" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form action="#">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Detail Pembayaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            Id pembayaran
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="idbayar" id="idBayar">
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Id pesanan</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="idPesan" id="idPesan">
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Tanggal pembayaran</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="Tanggal" id="Tanggal">
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Jumlah Bayar</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="jBayar" id="jBayar">
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-6">
                                        <div class="col-4">
                                            <span>Metode pembayaran</span>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="metodeBayar" id="metodeBayar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


            </table>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</div>

</div>

<?php
echo "<script> $(document).ready(function() {
        $('.edit').click(function(){
            $('#txtIdPesan').val($(this).attr('attr-pesanan'));
            $('#txtIdPembayaran').val($(this).attr('attr-pembayaran'));
            $('#txtTotal').val($(this).attr('attr-total'));
            $('#txtTanggal').val($(this).attr('attr-tanggal'));
            $('#txtStatus').val($(this).attr('attr-status'));
        });
        $('.detailPembayaran').click(function(){
            $('#idBayar').val($(this).attr('attr-bayar'));
            $('#idPesan').val($(this).attr('attr-pesan'));
            $('#Tanggal').val($(this).attr('attr-tanggal'));
            $('#jBayar').val($(this).attr('attr-jumlah'));
            $('#metodeBayar').val($(this).attr('attr-metode'));
            
        });
        $('.detailPesanan').click(function(){
            $('#idPesanan').val($(this).attr('attr-pesan'));
            $('#namaProduk').val($(this).attr('attr-nama'));
            $('#ukuranS').val($(this).attr('attr-s'));
            $('#ukuranM').val($(this).attr('attr-m'));
            $('#ukuranL').val($(this).attr('attr-l'));
            $('#ukuranXL').val($(this).attr('attr-xl'));
            
        });

    });</script>";

// include("../../back-end/master/fakultas/fakultasCreate.php");
// include("../../back-end/master/fakultas/fakultasUpdate.php");
// include("../../back-end/master/fakultas/fakultasDelete.php");

// session_start();
if (isset($_SESSION["simpan"])) {
    // echo "<script> alert(".$_SESSION['simpan'].") </script>";

    if ($_SESSION['simpan'] != null) {
        echo "<script> $(document).ready(function() { 
                        
        const toastPlacementExample = document.querySelector('.toast-placement-ex'),
        toastPlacementBtn = document.querySelector('#showToastPlacement');
        let selectedType, selectedPlacement, toastPlacement;
        
        selectedPlacement = 'top-0 end-0'.split(' ');";


        if ($_SESSION['simpan'] == 1) {
            echo "selectedType = 'bg-info';";
            echo "document.querySelector('#pesanToast').innerHTML = 'Pesanan berhasil dibuat'; ";
            //  $_SESSION['simpan'] = 0;
        } else if ($_SESSION['simpan'] == 2) {
            echo "selectedType = 'bg-info';";
            echo "document.querySelector('#pesanToast').innerHTML = 'Pembayaran berhasil'; ";
            //  $_SESSION['simpan'] = 0;
        } else if ($_SESSION['simpan'] == 3) {
            echo "selectedType = 'bg-info';";
            echo "document.querySelector('#pesanToast').innerHTML = 'Data telah dihapus'; ";
            //  $_SESSION['simpan'] = 0;
        } else if ($_SESSION['simpan'] == 9) {
            echo "selectedType = 'bg-danger';";
            echo "document.querySelector('#pesanToast').innerHTML = 'Terjadi kesalahan pembuatan pesanan'; ";
            //  $_SESSION['simpan'] = 0;
        }
        // echo "document.querySelector('#pesanToast').innerHTML = 'Data telah disimpan'; ";
        echo "toastPlacementExample.classList.add(selectedType);
        DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);
        toastPlacement = new bootstrap.Toast(toastPlacementExample);
        toastPlacement.show();
        
    
    })  ;
</script>";
        $_SESSION['simpan'] = 0;
    }
}

?>