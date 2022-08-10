<?php


header('Content-Type: application/json'); //render halaman jadi json

require '../config/app.php';

parse_str(file_get_contents('php://input'), $delete); //menerima request put/delete

//menerim input id data yang akan dihapus
$id_barang  = $dlete['id_barang'];

//query hapus data
$query = "DELETE FROM barang WHERE id_barang = $id_barang";
mysqli_query($db, $query);


if ($query) {
    echo json_encode(['pesan' => 'Data Barang Berhasil Dihapus']);
} else {
    echo json_encode(['pesan' => 'Data Barang Gagal Dihapus']);
}

