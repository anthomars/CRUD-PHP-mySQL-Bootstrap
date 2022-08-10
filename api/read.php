<?php


header('Content-Type: application/json'); //render halaman jadi json

require '../config/app.php';

$query = select("SELECT * FROM barang ORDER BY id_barang DESC");

echo json_encode(['data_barang' => $query]);
