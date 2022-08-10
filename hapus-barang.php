<?php

session_start();

//membatasi halaman sebelum login
if(!isset($_SESSION["login"])) {
    echo   "<script>
                alert('Login Dulu Ya Bestie...');
                document.location.href = 'login.php';
            </script>";
    exit;        
}

include 'config/app.php';

//periksa id_barang yg dipilih
$id_barang = (int)$_GET['id_barang'];

if(delete_barang($id_barang) > 0) {
    echo "  <script>
                alert('Data barang berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
}else {
    echo "  <script>
                alert('Data barang gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
}