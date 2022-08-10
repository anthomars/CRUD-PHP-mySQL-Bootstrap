<?php


header('Content-Type: application/json'); //render halaman jadi json

require '../config/app.php';

parse_str(file_get_contents('php://input'), $put);
//menerima input
$id_barang  = $put['id_barang'];
$nama       = $put['nama'];
$jumlah     = $put['jumlah'];
$harga      = $put['harga'];

//validasi data
if ($nama == null) {
    echo json_encode(['pesan' => 'Tidak Boleh Kosong']);
    exit;
}

//query update data
$query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = '$id_barang'";
mysqli_query($db, $query);


if ($query) {
    echo json_encode(['pesan' => 'Data Barang Berhasil Diubah']);
} else {
    echo json_encode(['pesan' => 'Data Barang Gagal Diubah']);
}

