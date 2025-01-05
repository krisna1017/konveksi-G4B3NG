<?php
include('../../back-end/koneksi/koneksi.php');
$id = $_SESSION['id_admin'];
$sql = "SELECT * FROM produksi join pembayaran using (id_pembayaran) inner join pesanan on pembayaran.id_pesanan = pesanan.id_pesanan where id_admin = '$id' ORDER BY id_produksi ASC";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $no . "</td>";
        echo "<td>" . $row["id_produksi"] . "</td>";
        echo "<td>" . $row["id_pembayaran"] . "</td>";
        echo "<td>" . $row["id_pesanan"] . "</td>";
        echo "<td>" . $row["tanggal_pembayaran"] . "</td>";
        echo "<td>" . $row["tanggal_mulai"] . "</td>";
        echo "<td>" . $row["tanggal_selesai"] . "</td>";
        echo "<td>" . $row["status_produksi"] . "</td>";
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr>";
    echo "<td colspan='4'>Data belum ada</td>";
    echo "</tr>";
}

mysqli_close($koneksi);
