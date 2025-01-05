<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'konveksi';

$koneksi = mysqli_connect($hostname, $username, $password, $dbname) or die('Gagal terhubung ke database');
