<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="col-lg-12 col-md-6">
            <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
                <div>
                    <h5>Data Produk</h5>
                </div>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center"><strong>No</strong></th>
                        <th><strong>Nama produk</strong></th>
                        <th><strong>Jenis produk</strong></th>
                        <th><strong>Jenis bahan</strong></th>
                        <th><strong>Warna</strong></th>
                        <th><strong>Harga</strong></th>
                        <th class='text-center'><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    include("../../back-end/pelanggan/pilihProduk.php");
                    ?>
                </tbody>

                <!-- modal tambah pesanan -->
                <div class="modal fade" id="modalUpdate" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form id="tambahpesanan"
                                action="<?php echo '../../back-end/pelanggan/tambahPesanan.php'; ?>"
                                method="post"
                                name="autoSumForm">
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
                                    <div class="row g-6" style="display: none;">
                                        <div class="col mb-6">
                                            <label for="txtIdPesan" class="form-label">Id Pesanan</label>
                                            <?php
                                            include('../../back-end/koneksi/koneksi.php');
                                            $query = mysqli_query($koneksi, "SELECT max(id_pesanan) as id FROM pesanan");
                                            $data = mysqli_fetch_array($query);
                                            $id = $data['id'];

                                            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                            // dan diubah ke integer dengan (int)

                                            $urutan = (int) substr($id, 3, 3);

                                            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                                            $urutan++;

                                            // membentuk kode barang baru
                                            // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                                            // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                                            // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                                            $huruf = "BRG";
                                            $id_pesanan = $huruf . sprintf("%03s", $urutan);
                                            ?>
                                            <input type="text" id="txtIdPesan" class="form-control"
                                                name="id_pesanan" value="<?= $id_pesanan ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row g-6" style="display: none;">
                                        <div class="col mb-6">
                                            <label for="txtPelanggan" class="form-label">Nama Pelanggan</label>
                                            <input type="text" id="txtPelanggan" class="form-control"
                                                name="id_pelanggan">
                                            <input type="text" id="txtPelangganEdit" class="form-control"
                                                name="id_pelanggan" readonly style="display: none;">
                                        </div>
                                    </div>
                                    <div class="row g-6">
                                        <div class="col mb-6">
                                            <label for="txtNamaEdit" class="form-label">Nama produk</label>
                                            <input type="text" id="txtNamaEdit" class="form-control"
                                                name="nama_produk" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="S" class="form-label">Ukuran S</label>
                                            <input type="number" id="S" class="form-control"
                                                name="s" value="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="m" class="form-label">Ukuran M</label>
                                            <input type="number" id="m" class="form-control"
                                                name="m" value="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="l" class="form-label">Ukuran L</label>
                                            <input type="number" id="l" class="form-control"
                                                name="L" value="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="xl" class="form-label">Ukuran XL</label>
                                            <input type="number" id="xl" class="form-control"
                                                name="xl" value="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtJumlah" class="form-label">Jumlah</label>
                                            <input type="number" id="txtJumlah" class="form-control"
                                                name="jumlah" value="0" onfocus="startCalcJumlah();">
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="col mb-6">
                                            <label for="txtHargaEdit" class="form-label">Harga</label>
                                            <input type="text" id="txtHargaEdit" class="form-control"
                                                name="harga" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtUkuran" class="form-label">Total Harga</label>
                                            <input type="text" id="txtUkuranEdit" class="form-control" name="total" value="0" onfocus="startCalcTotal();">
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <div class="col mb-6">
                                            <label for="txtWarna" class="form-label">Tanggal Pesanan</label>
                                            <input type="text" id="txtTanggal" class="form-control"
                                                name="tanggal" readonly>
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <div class="col mb-6">
                                            <label for="txtWarna" class="form-label">Status Pesanan</label>
                                            <input type="text" id="txtTanggal" class="form-control"
                                                name="status">
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Tambah"></input>
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

    <script>
        function startCalcJumlah() {
            interval = setInterval("calcJumlah()", 1); //menjalankan  function calcJumlah secara berulang
        }

        function calcJumlah() {
            s = document.autoSumForm.s.value; //mengambail value input ukuran s
            m = document.autoSumForm.m.value; //mengambail value input ukuran m
            l = document.autoSumForm.l.value; //mengambail value input ukuran l
            xl = document.autoSumForm.xl.value; //mengambail value input ukuran xl
            document.autoSumForm.jumlah.value = parseInt(s) + parseInt(m) + parseInt(l) + parseInt(xl); //menggunakan parseInt agar nllai variable bisa ditambahkan
        }

        function stopCalc() {
            clearInterval(interval);
        }

        function startCalcTotal() {
            interval = setInterval("calc()", 1);
        }

        function calc() {
            harga = document.autoSumForm.harga.value; //mengambail value input harga
            jumlah = document.autoSumForm.jumlah.value; //mengambail value input jumlahj
            document.autoSumForm.total.value = harga * jumlah; //masukkan value total dengan proses perkalian harga dan jumlah
        }

        function stopCalc() {
            clearInterval(interval);
        }
    </script>

</div>

</div>

<?php
echo "<script> $(document).ready(function() {
        $('.edit').click(function(){
            $('#txtKodeEditView').val($(this).attr('attr-kode'));
            $('#txtKodeEdit').val($(this).attr('attr-kode'));
            $('#txtPelanggan').val($(this).attr('attr-pelanggan'));
            $('#txtNamaEdit').val($(this).attr('attr-nama'));
            $('#txtHargaEdit').val($(this).attr('attr-harga'));
            $('#txtTanggal').val($(this).attr('attr-tanggal'));
        });
        $('.hapus').click(function(){
            $('#txtKodeHapus').val($(this).attr('attr-kode'));
            $('#txthapusnama').html($(this).attr('attr-nama'));
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
            echo "document.querySelector('#pesanToast').innerHTML = 'Data telah diupdate'; ";
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