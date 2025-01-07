<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="col-lg-12 col-md-6">
            <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
                <div>
                    <h5>Daftar Produksi Pesanan</h5>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">Tambah Produksi</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form
                                action="<?php echo '../../back-end/master/produksi/produksiCreate.php?mode=tambah'; ?>"
                                method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Maintenance Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtId" class="form-label">Id produksi</label>
                                            <?php
                                            $query = mysqli_query($koneksi, 'SELECT max(id_produksi) as id FROM produksi');
                                            $data = mysqli_fetch_array($query);
                                            $id = $data['id'];
                                            $id++;
                                            ?>
                                            <input type="text" id="txtId" class="form-control"
                                                placeholder="isi id produksi" name="id_produksi"
                                                value="<?= $id ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="id_pembayaran" class="form-label">Id pembayaran</label>
                                            <select name="id_pembayaran" id="id_pembayaran" class="form-select">
                                                <option value="" selected>Pilih Id Pembayaran</option>
                                                <?php
                                                $query_id = mysqli_query($koneksi, "SELECT id_pembayaran FROM pembayaran join pesanan using (id_pesanan) WHERE status_pesanan = 'lunas' AND NOT EXISTS (SELECT 1 FROM produksi WHERE pembayaran.id_pembayaran = produksi.id_pembayaran) ORDER BY id_pembayaran ASC");
                                                while ($result = mysqli_fetch_assoc($query_id)) {
                                                ?>
                                                    <option value="<?php echo $result['id_pembayaran']; ?>"><?php echo $result['id_pembayaran']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtTanggal" class="form-label">Tanggal Pembayaran Pelanggan</label>
                                            <input type="text" id="txtTanggal" class="form-control"
                                                name="tanggal" value="" readonly>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="col mb-6">
                                            <label for="txtMulai" class="form-label">Mulai Produksi</label>
                                            <input type="text" id="txtMulai" class="form-control"
                                                name="mulai" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtSelesai" class="form-label">Selesai Produksi</label>
                                            <input type="text" id="txtSelesai" class="form-control"
                                                name="selesai">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Produksi"></input>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>No</strong></th>
                            <th><strong>Id produksi</strong></th>
                            <th><strong>Id pembayaran</strong></th>
                            <th><strong>Id pesanan</strong></th>
                            <th><strong>Tanggal Pembayaran</strong></th>
                            <th><strong>Mulai Produksi</strong></th>
                            <th><strong>Selesai Produksi</strong></th>
                            <th><strong>Status produksi</strong></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        include('../../back-end/master/produksi/produksiView.php')
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


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_pembayaran').change(function() { // Jika Select Box id pembayaran dipilih
            var idBayar = $(this).val(); // Ciptakan variabel pembayaran
            $.ajax({
                type: 'post', // Metode pengiriman data menggunakan POST
                url: '../../back-end/ambilTanggal.php', // File yang akan memproses data
                data: 'id_pembayaran=' + idBayar, // Data yang akan dikirim ke file pemroses
                success: function(response) { // Jika berhasil
                    $('#txtTanggal').val(response); // Berikan hasil ke tanggal mulai
                    $('#txtMulai').val(response); // Berikan hasil ke tanggal mulai
                }
            });

        });

    });
    $(document).ready(function() {
        $('#id_pembayaran').change(function() { // Jika Select Box id pembayaran dipilih
            var idBayar = $(this).val(); // Ciptakan variabel pembayaran
            $.ajax({
                type: 'post', // Metode pengiriman data menggunakan POST
                url: '../../back-end/buatTanggal.php', // File yang akan memproses data
                data: 'id_pembayaran=' + idBayar, // Data yang akan dikirim ke file pemroses
                success: function(response) { // Jika berhasil
                    $('#txtSelesai').val(response); // Berikan hasil ke tanggal selesai
                }
            });

        });

    });
</script>
<?php

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
            echo "document.querySelector('#pesanToast').innerHTML = 'Produksi telah dimulai'; ";
            //  $_SESSION['simpan'] = 0;
        } else if ($_SESSION['simpan'] == 2) {
            echo "selectedType = 'bg-info';";
            echo "document.querySelector('#pesanToast').innerHTML = 'Data telah diupdate'; ";
            //  $_SESSION['simpan'] = 0;
        } else if ($_SESSION['simpan'] == 3) {
            echo "selectedType = 'bg-info';";
            echo "document.querySelector('#pesanToast').innerHTML = 'Data telah dihapus'; ";
            //  $_SESSION['simpan'] = 0;
        } else if ($_SESSION['simpan'] == 9) {
            echo "selectedType = 'bg-danger';";
            echo "document.querySelector('#pesanToast').innerHTML = 'Terjadi kesalahan produksi'; ";
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