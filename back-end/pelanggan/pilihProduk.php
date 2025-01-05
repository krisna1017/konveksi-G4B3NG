<?php
include('../../back-end/koneksi/koneksi.php');
$sql = "SELECT * FROM produk";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $no . "</td>";
        echo "<td>" . $row["nama_produk"] . "</td>";
        echo "<td>" . $row["jenis_produk"] . "</td>";
        echo "<td>" . $row["jenis_bahan"] . "</td>";
        echo "<td>" . $row["warna"] . "</td>";
        echo "<td>" . 'Rp.' . number_format($row["harga"], 0, ',', '.') . "</td>";
        echo "<td class='text-center'>
        <button type='button' class='btn btn-primary edit' attr-kode='" . $row["kode_produk"] . "' attr-pelanggan='" . $_SESSION['username'] . "' attr-nama='" . $row['nama_produk'] . "'attr-harga='" . $row['harga'] . "'attr-tanggal='" . date("y-m-d") .  "' data-bs-toggle='modal' data-bs-target='#modalUpdate'>
            <span>Order</span>
        </button>
        </td>";
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr>";
    echo "<td colspan='4'>Data belum ada</td>";
    echo "</tr>";
}

mysqli_close($koneksi);
