<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="col-lg-12 col-md-6">
            <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
                <div>
                    <h5>Data Produk</h5>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">Tambah Data</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form id="tambahproduk"
                                action="<?php echo '../../back-end/master/produk/produkCreate.php?mode=tambah'; ?>"
                                method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Maintenance Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtKode" class="form-label">Kode produk</label>
                                            <?php
                                            include('../../back-end/koneksi/koneksi.php');

                                            $query = mysqli_query($koneksi, 'SELECT max(kode_produk) as id FROM produk');
                                            $data = mysqli_fetch_array($query);
                                            $id = $data['id'];
                                            $id++;
                                            ?>
                                            <input type="text" id="txtKode" class="form-control"
                                                placeholder="isi kode produk" name="kode_produk" value="<?= $id ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Nama produk</label>
                                            <input type="text" id="txtNama" class="form-control"
                                                placeholder="isi nama produk" name="nama_produk">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Jenis produk</label>
                                            <input type="text" id="txtJenisProduk" class="form-control"
                                                placeholder="isi nama produk" name="jenis_produk" value="baju" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Jenis bahan</label>
                                            <input type="text" id="txtJenisBahan" class="form-control"
                                                placeholder="isi jenis bahan" name="jenis_bahan">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtWarna" class="form-label">Warna</label>
                                            <input type="text" id="txtWarna" class="form-control"
                                                placeholder="isi warna produk" name="warna">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtHarga" class="form-label">Harga</label>
                                            <input type="text" id="txtHarga" class="form-control"
                                                placeholder="isi harga produk" name="harga">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtStok" class="form-label">Stok</label>
                                            <input type="number" id="txtStok" class="form-control"
                                                placeholder="isi stok produk" name="stok">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Simpan"></input>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center"><strong>No</strong></th>
                        <th><strong>Kode produk</strong></th>
                        <th><strong>Nama produk</strong></th>
                        <th><strong>Jenis produk</strong></th>
                        <th><strong>Jenis bahan</strong></th>
                        <th><strong>Warna</strong></th>
                        <th><strong>Harga</strong></th>
                        <th><strong>Stok</strong></th>
                        <th class='text-center'><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    include("../../back-end/master/produk/produkView.php");
                    ?>
                </tbody>


                <!-- Modal Update-->
                <div class="modal fade" id="modalUpdate" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form id="tambahproduk"
                                action="<?php echo '../../back-end/master/produk/produkUpdate.php?mode=ubah'; ?>"
                                method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Maintenance Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtKode" class="form-label">Kode produk</label>
                                            <input type="text" class="form-control" id="txtKodeEdit" name="kode_produk" style="display: none;">
                                            <input type="text" class="form-control" id="txtKodeEditView" name="kode_produk" disabled>

                                        </div>
                                    </div>
                                    <div class="row g-6">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Nama produk</label>
                                            <input type="text" id="txtNamaEdit" class="form-control"
                                                placeholder="isi nama produk" name="nama_produk">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Jenis produk</label>
                                            <input type="text" id="txtJenisProdukEdit" class="form-control"
                                                placeholder="isi jenis produk" name="jenis_produk">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Jenis bahan</label>
                                            <input type="text" id="txtJenisBahanEdit" class="form-control"
                                                placeholder="isi jenis bahan" name="jenis_bahan">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtWarna" class="form-label">Warna</label>
                                            <input type="text" id="txtWarnaEdit" class="form-control"
                                                placeholder="isi warna produk" name="warna">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtHargaEdit" class="form-label">Harga</label>
                                            <input type="text" id="txtHargaEdit" class="form-control"
                                                placeholder="isi harga produk" name="harga">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Stok</label>
                                            <input type="number" id="txtStokEdit" class="form-control"
                                                placeholder="isi stok produk" name="stok">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <input type="submit" class="btn btn-primary" name="simpan" value="Update"></input>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade" id="modalDelete" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <form id="tambahproduk"
                        action="<?php echo '../../back-end/master/produk/produkDelete.php?mode=hapus'; ?>"
                        method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Maintenance Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-6">
                                    Yakin hapus data produk dengan nama
                                    <strong><span id="txthapusnama"></span></strong>
                                    ?
                                    <input type="text" id="txtKodeHapus" name="kode_produk" style="display:none">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <input type="submit" class="btn btn-danger" value="Hapus"></input>
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

<?php
echo "<script> $(document).ready(function() {
        $('.edit').click(function(){
            $('#txtKodeEditView').val($(this).attr('attr-kode'));
            $('#txtKodeEdit').val($(this).attr('attr-kode'));
            $('#txtNamaEdit').val($(this).attr('attr-nama'));
            $('#txtJenisProdukEdit').val($(this).attr('attr-jproduk'));
            $('#txtJenisBahanEdit').val($(this).attr('attr-jbahan'));
            $('#txtUkuranEdit').val($(this).attr('attr-ukuran'));
            $('#txtWarnaEdit').val($(this).attr('attr-warna'));
            $('#txtHargaEdit').val($(this).attr('attr-harga'));
            $('#txtStokEdit').val($(this).attr('attr-stok'));
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
            echo "document.querySelector('#pesanToast').innerHTML = 'Data telah disimpan'; ";
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
            echo "document.querySelector('#pesanToast').innerHTML = 'Terjadi kesalahan penyimpanan data'; ";
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