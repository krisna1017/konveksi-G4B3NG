<?php
include('../../back-end/koneksi/koneksi.php');
$sql = "SELECT produksi.id_produksi, pesanan.id_pesanan, produksi.tanggal_mulai, produksi.tanggal_selesai, admin.username from produksi inner join pembayaran on produksi.id_pembayaran = pembayaran.id_pembayaran inner join pesanan on pembayaran.id_pesanan = pesanan.id_pesanan inner join admin on produksi.id_admin = admin.id_admin where produksi.status_produksi = 'berjalan';";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $no . "</td>";
        echo "<td>" . $row['id_produksi'] . "</td>";
        echo "<td>" . $row['id_pesanan'] . "</td>";
        echo "<td>" . $row['tanggal_mulai'] . "</td>";
        echo "<td>" . $row['tanggal_selesai'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr>";
    echo "<td colspan='4'>Data belum ada</td>";
    echo "</tr>";
}

mysqli_close($koneksi);
