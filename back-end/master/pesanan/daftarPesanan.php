<?php
include('../../back-end/koneksi/koneksi.php');
$sql = "SELECT * FROM pesanan join pelanggan using (id_pelanggan) join produk using (kode_produk)";
$data = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($data) > 0) {
    $no = 1;
    while ($row = $data->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $no . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['id_pesanan'] . "</td>";
        echo "<td>" . $row['nama_produk'] . "</td>";
        echo "<td>" . $row['jenis_produk'] . "</td>";
        echo "<td>" . 'Rp.' . number_format($row["harga"], 0, ',', '.') . "</td>";
        echo "<td>" . $row['jumlah'] . "</td>";
        echo "<td>" . 'Rp.' . number_format($row["total_harga"], 0, ',', '.') . "</td>";
        echo "<td>" . $row['status_pesanan'] . "</td>";
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr>";
    echo "<td colspan='4'>Data belum ada</td>";
    echo "</tr>";
}

mysqli_close($koneksi);
