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

//periksa id_akun yg dipilih
$id_akun = (int)$_GET['id_akun'];

if(delete_akun($id_akun) > 0) {
    echo "  <script>
                alert('Data Akun berhasil dihapus!');
                document.location.href = 'crud-modal.php';
            </script>";
}else {
    echo "  <script>
                alert('Data Akun gagal dihapus!');
                document.location.href = 'crud-modal.php';
            </script>";
}