<?php
include('../../back-end/koneksi/koneksi.php');
$sql = "SELECT pelanggan.username, pesanan.id_pesanan, pembayaran.id_pembayaran, pembayaran.tanggal_pembayaran, pembayaran.jumlah_bayar FROM pembayaran INNER JOIN pesanan ON pembayaran.id_pesanan = pesanan.id_pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE pesanan.status_pesanan = 'lunas'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $no . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['id_pesanan'] . "</td>";
        echo "<td>" . $row['id_pembayaran'] . "</td>";
        echo "<td>" . $row['tanggal_pembayaran'] . "</td>";
        echo "<td>" . 'Rp.' . number_format($row["jumlah_bayar"], 0, ',', '.') . "</td>";
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr>";
    echo "<td colspan='4'>Data belum ada</td>";
    echo "</tr>";
}

mysqli_close($koneksi);
