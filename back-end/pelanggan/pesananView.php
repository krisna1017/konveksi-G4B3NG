<?php
include('../../back-end/koneksi/koneksi.php');
$id = $_SESSION['id_pelanggan'];
$sql = "SELECT * FROM pembayaran join pesanan using (id_pesanan) join produk using (kode_produk) where id_pelanggan = '$id'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $no . "</td>";
        echo "<td>" . $row["id_pesanan"] . "</td>";
        echo "<td>" . $row["nama_produk"] . "</td>";
        echo "<td>" . $row["jumlah"] . "</td>";
        echo "<td>" . 'Rp.' . number_format($row["total_harga"], 0, ',', '.') . "</td>";
        echo "<td>" . $row["tanggal_pesanan"] . "</td>";
        echo "<td>" . $row["status_pesanan"] . "</td>";
        echo "<td>
            <button type='button' class='btn btn-success detailPesanan' attr-pesan='" . $row['id_pesanan'] . "' attr-nama='" . $row['nama_produk'] . "' attr-s='" . $row['ukuran_s'] .  "' attr-m='" . $row['ukuran_m'] .  "' attr-l='" . $row['ukuran_l'] .  "' attr-xl='" . $row['ukuran_xl'] .  "' data-bs-toggle='modal' data-bs-target='#modalDetailPesanan'>
                <span>Detail Pesanan</span>
            </button>";
        if ($row['status_pesanan'] !== 'lunas') {
            echo "
            <button type='button' class='btn btn-primary edit' attr-pembayaran='" . $row["id_pembayaran"] . "' attr-pesanan='" . $row['id_pesanan'] . "' attr-total='" . $row['total_harga'] . "' attr-tanggal='" . date("y-m-d") .  "' attr-status='" . $row["status_pesanan"] . "' data-bs-toggle='modal' data-bs-target='#modalUpdate'>
                <span>Bayar</span>
            </button>
            </td>";
        } else {
            echo "
            <button type='button' class='btn btn-warning detailPembayaran' attr-bayar='" . $row["id_pembayaran"] . "' attr-pesan='" . $row["id_pesanan"] . "' attr-tanggal='" . $row["tanggal_pembayaran"] . "' attr-jumlah='" . $row["jumlah_bayar"] . "' attr-metode='" . $row["metode_pembayaran"] . "' data-bs-toggle='modal' data-bs-target='#modalDetailPembayaran'>
                <span>Detail Pembayaran</span>
            </button>
            </td>";
        }
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr>";
    echo "<td colspan='4'>Data belum ada</td>";
    echo "</tr>";
}

mysqli_close($koneksi);
