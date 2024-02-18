<?php

$host = 'localhost';
$user = 'bimbelmi';
$password = 'gM7k2*lAI#0Fc0';
$database = 'bimbelmi_military_inforces';

$koneksi = mysqli_connect($host, $user, $password, $database);

// karena konsep yang saya buat bukan OOP -
// jadi saya buat $koneksi sebagai variabel global -
// agar bisa ditanggap oleh semua fungsi crud nanti.
$GLOBALS['koneksi'] = $koneksi;