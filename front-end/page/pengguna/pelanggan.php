<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="col-lg-12 col-md-6">
            <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
                <div>
                    <h5>Data pelanggan</h5>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">Tambah Data</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form id="tambahpelanggan"
                                action="<?php echo '../../back-end/master/pelanggan/pelangganCreate.php?mode=tambah'; ?>"
                                method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Maintenance Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtId" class="form-label">Id pelanggan</label>
                                            <?php
                                            include('../../back-end/koneksi/koneksi.php');

                                            $query = mysqli_query($koneksi, 'SELECT max(id_pelanggan) as id FROM pelanggan');
                                            $data = mysqli_fetch_array($query);
                                            $id = $data['id'];
                                            $id++;
                                            ?>
                                            <input type="text" id="txtId" class="form-control"
                                                placeholder="isi id pelanggan" name="id_pelanggan"
                                                value="<?= $id ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Nama pelanggan</label>
                                            <input type="text" id="txtNama" class="form-control"
                                                placeholder="isi nama pelanggan" name="nama_pelanggan" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtTeleponpelanggan" class="form-label">No telepon</label>
                                            <input type="tel" id="txtTeleponpelanggan" class="form-control"
                                                placeholder="isi no telepon" name="no_telepon" pattern="[0-9]{9}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtUsername" class="form-label">Username</label>
                                            <input type="text" id="txtUsername" class="form-control"
                                                placeholder="isi username" name="username" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtPassword" class="form-label">Password</label>
                                            <input type="password" id="txtPassword" class="form-control"
                                                placeholder="isi password" name="password" required>
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
                        <th class="text-center"><strong>Id pelanggan</strong></th>
                        <th><strong>Nama pelanggan</strong></th>
                        <th><strong>No Telepon</strong></th>
                        <th><strong>Username</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    include("../../back-end/master/pelanggan/pelangganView.php");
                    ?>
                </tbody>


                <!-- Modal Update-->
                <div class="modal fade" id="modalUpdate" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">
                            <form id="updatepelanggan"
                                action="<?php echo '../../back-end/master/pelanggan/pelangganUpdate.php?mode=ubah'; ?>"
                                method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Maintenance Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtId" class="form-label">Id pelanggan</label>
                                            <input type="text" class="form-control" id="txtIdEdit" name="id_pelanggan" style="display: none;">
                                            <input type="text" class="form-control" id="txtIdEditView" name="id_pelanggan" disabled>

                                        </div>
                                    </div>
                                    <div class="row g-6">
                                        <div class="col mb-6">
                                            <label for="txtNama" class="form-label">Nama pelanggan</label>
                                            <input type="text" id="txtNamaEdit" class="form-control"
                                                placeholder="isi nama pelanggan" name="nama_pelanggan" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtTeleponpelangganEdit" class="form-label">No telepon</label>
                                            <input type="tel" id="txtTeleponpelangganEdit" class="form-control"
                                                placeholder="isi no telepon" name="no_telepon" pattern="[0-9]{11}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtUsernameEdit" class="form-label">Username</label>
                                            <input type="text" id="txtUsernameEdit" class="form-control"
                                                placeholder="isi username" name="username" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="txtPasswordEdit" class="form-label">Password</label>
                                            <input type="password" id="txtPasswordEdit" class="form-control"
                                                placeholder="isi password" name="password" required>
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
                    <form id="deletepelanggan"
                        action="<?php echo '../../back-end/master/pelanggan/pelangganDelete.php?mode=hapus'; ?>"
                        method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Maintenance Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-6">
                                    Yakin hapus data pelanggan dengan nama
                                    <strong><span id="txthapusnama"></span></strong>
                                    ?
                                    <input type="text" id="txtIdHapus" name="id_pelanggan" style="display:none">

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
            $('#txtIdEditView').val($(this).attr('attr-id'));
            $('#txtIdEdit').val($(this).attr('attr-id'));
            $('#txtNamaEdit').val($(this).attr('attr-nama'));
            $('#txtTeleponpelangganEdit').val($(this).attr('attr-telepon'));
            $('#txtUsernameEdit').val($(this).attr('attr-username'));
            $('#txtPasswordEdit').val($(this).attr('attr-password'));
        });
        $('.hapus').click(function(){
            $('#txtIdHapus').val($(this).attr('attr-id'));
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