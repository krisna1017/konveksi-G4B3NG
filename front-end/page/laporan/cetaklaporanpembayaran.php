<?php
include('../../../back-end/koneksi/koneksi.php');
$sql = "SELECT pelanggan.username, pesanan.id_pesanan, pembayaran.id_pembayaran, pembayaran.tanggal_pembayaran, pembayaran.jumlah_bayar FROM pembayaran INNER JOIN pesanan ON pembayaran.id_pesanan = pesanan.id_pesanan INNER JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE pesanan.status_pesanan = 'lunas'";
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
        <h1>Laporan Data Pembayaran</h1>
        <h2>Konveksi G4B3NG<h2>
    </div>

    <button class="btn-kembali" onclick="previousPage()">Kembali</button>

    <table>
        <tr>
            <th class="text-center"><strong>No</strong></th>
            <th><strong>nama pelanggan</strong></th>
            <th><strong>id pesanan</strong></th>
            <th><strong>id pembayaran</strong></th>
            <th><strong>tanggal pembayaran</strong></th>
            <th><strong>jumlah bayar</strong></th>
        </tr>
        <?php
        $no = 1;
        while ($baris = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $baris['username'] ?></td>
                <td><?= $baris['id_pesanan'] ?></td>
                <td><?= $baris['id_pembayaran'] ?></td>
                <td><?= $baris['tanggal_pembayaran'] ?></td>
                <td><?= 'Rp.' . number_format($baris["jumlah_bayar"], 0, ',', '.') ?></td>
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