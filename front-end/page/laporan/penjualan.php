<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="col-lg-12 col-md-6">
            <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-4">
                <div>
                    <h5>Laporan Penjualan</h5>
                </div>
                <div>
                    <a class="btn btn-primary" href="laporan/cetaklaporanpenjualan.php">Cetak</a>
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
                        <th><strong>Jumlah penjualan</strong></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    include("../../back-end/laporan/penjualanView.php");
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