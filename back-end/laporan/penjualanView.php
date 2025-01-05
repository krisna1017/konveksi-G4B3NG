<?php
include('../../back-end/koneksi/koneksi.php');
$sql = "SELECT pesanan.id_pesanan, produk.kode_produk, produk.nama_produk, produk.jenis_produk, sum(jumlah) AS total_penjualan FROM pesanan INNER JOIN produk ON pesanan.kode_produk = produk.kode_produk WHERE status_pesanan = 'lunas' GROUP BY produk.kode_produk";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $no . "</td>";
        echo "<td>" . $row['nama_produk'] . "</td>";
        echo "<td>" . $row['jenis_produk'] . "</td>";
        echo "<td>" . $row['total_penjualan'] . "</td>";
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr>";
    echo "<td colspan='4'>Data belum ada</td>";
    echo "</tr>";
}

mysqli_close($koneksi);
