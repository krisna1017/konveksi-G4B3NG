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
    echo "<td>" . $row["kode_produk"] . "</td>";
    echo "<td>" . $row["nama_produk"] . "</td>";
    echo "<td>" . $row["jenis_produk"] . "</td>";
    echo "<td>" . $row["jenis_bahan"] . "</td>";
    echo "<td>" . $row["warna"] . "</td>";
    echo "<td>" . 'Rp.' . number_format($row["harga"], 0, ',', '.') . "</td>";
    echo "<td>" . $row["stok"] . "</td>";
    echo "<td class='text-center'><button type='button' class='btn btn-icon btn-outline-primary edit' attr-kode='" . $row["kode_produk"] . "' attr-nama='" . $row['nama_produk'] . "'attr-jproduk='" . $row['jenis_produk'] . "'attr-jbahan='" . $row['jenis_bahan'] .  "'attr-warna='" . $row['warna'] . "'attr-harga='" . $row['harga'] . "'attr-stok='" . $row['stok'] . "' data-bs-toggle='modal' data-bs-target='#modalUpdate'>
                              <span class='tf-icons bx bx-edit-alt bx-22px'></span>
                            </button>";

    $kode = $row['kode_produk'];
    $query_delete = mysqli_query($koneksi, "SELECT kode_produk from produk inner join pesanan using(kode_produk) where kode_produk = $kode and status_pesanan = 'lunas'");
    $cek = mysqli_num_rows($query_delete);
    if ($cek == 0) {
      echo "<button type='button' class='btn btn-icon btn-outline-warning hapus' attr-kode='" . $row["kode_produk"] . "' attr-nama='" . $row['nama_produk'] . "' data-bs-toggle='modal' data-bs-target='#modalDelete'>
                              <span class='tf-icons bx bx-trash bx-22px'></span>
                            </button>";
    } else {
      echo "<button type='button' style='display:none;'>asad</button>";
    }

    echo "</td>";
    echo "</tr>";
    $no++;
  }
} else {
  echo "<tr>";
  echo "<td colspan='4'>Data belum ada</td>";
  echo "</tr>";
}

mysqli_close($koneksi);
