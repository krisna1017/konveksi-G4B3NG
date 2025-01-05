<?php
include('../../back-end/koneksi/koneksi.php');
$sql = "SELECT * FROM pelanggan";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $no = 1;
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td class='text-center'>" . $row["id_pelanggan"] . "</td>";
    echo "<td>" . $row["nama"] . "</td>";
    echo "<td>" . $row["no_telepon"] . "</td>";
    echo "<td>" . $row["username"] . "</td>";
    echo "<td>" . $row["password"] . "</td>";
    echo "<td class='text-center'>";
    echo "<button type='button' class='btn btn-icon btn-outline-primary edit' attr-id='" . $row["id_pelanggan"] . "' attr-nama='" . $row['nama'] . "'attr-telepon='" . $row['no_telepon'] . "'attr-username='" . $row['username'] . "'attr-password='" . $row['password'] . "' data-bs-toggle='modal' data-bs-target='#modalUpdate'>
                              <span class='tf-icons bx bx-edit-alt bx-22px'></span>
                            </button>";

    $id = $row['id_pelanggan'];
    $query_delete = mysqli_query($koneksi, "SELECT id_pelanggan from pelanggan inner join pesanan using (id_pelanggan) where id_pelanggan = '$id'");
    $cek = mysqli_num_rows($query_delete);

    if ($cek == 0) {
      echo "<button type='button' class='btn btn-icon btn-outline-warning hapus' attr-id='" . $row["id_pelanggan"] . "' attr-nama='" . $row['nama'] . "' data-bs-toggle='modal' data-bs-target='#modalDelete'>
          <span class='tf-icons bx bx-trash bx-22px'></span>
        </button>";
    } else
      echo "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr>";
  echo "<td colspan='4'>Data belum ada</td>";
  echo "</tr>";
}

mysqli_close($koneksi);
