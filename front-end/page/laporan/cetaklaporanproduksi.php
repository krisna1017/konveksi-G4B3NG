<?php
include('../../../back-end/koneksi/koneksi.php');
$sql = "SELECT produksi.id_produksi, pesanan.id_pesanan, produksi.tanggal_mulai, produksi.tanggal_selesai, admin.username from produksi inner join pembayaran on produksi.id_pembayaran = pembayaran.id_pembayaran inner join pesanan on pembayaran.id_pesanan = pesanan.id_pesanan inner join admin on produksi.id_admin = admin.id_admin where produksi.status_produksi = 'berjalan';";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            overflow-y: hidden;
        }

        body {
            width: 100%;
            height: auto;
            padding-top: 50px;
        }

        .judul {
            text-align: center;
        }

        table {
            margin: 20px auto 30px auto;
            width: 95%;
            border-collapse: collapse;
        }

        table th,
        td {
            padding: 12px;
            text-align: start;
            border: 1px solid rgba(0, 0, 0, 0.5);
            font-size: 14px;
        }

        .btn-kembali {
            width: 80px;
            font-weight: bold;
            text-decoration: none;
            background-color: brown;
            border: none;
            cursor: pointer;
            color: white;
            padding: 10px;
            margin-left: 90%;
            border-radius: 2px;
            align-items: center;
        }

        @media print {
            .btn-kembali {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="judul">
        <h1>Laporan Data Produksi</h1>
        <h2>Konveksi G4B3NG<h2>
    </div>

    <button class="btn-kembali" onclick="previousPage()">Kembali</button>

    <table>
        <tr>
            <th class="text-center"><strong>No</strong></th>
            <th><strong>Id produksi</strong></th>
            <th><strong>id pesanan</strong></th>
            <th><strong>tanggal mulai</strong></th>
            <th><strong>tanggal selesai</strong></th>
            <th><strong>admin</strong></th>
        </tr>
        <?php
        $no = 1;
        while ($baris = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $baris['id_produksi'] ?></td>
                <td><?= $baris['id_pesanan'] ?></td>
                <td><?= $baris['tanggal_mulai'] ?></td>
                <td><?= $baris['tanggal_selesai'] ?></td>
                <td><?= $baris['username'] ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>

    </table>

</body>

</html>
<script>
    window.print();

    function previousPage() {
        window.history.go(-1);
    }
</script>