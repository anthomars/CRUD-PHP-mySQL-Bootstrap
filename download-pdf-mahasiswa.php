<?php

require __DIR__ . '/vendor/autoload.php';
require 'config/app.php';

use Spipu\Html2Pdf\Html2Pdf;

$data_mahasiswa = select("SELECT * FROM mahasiswa");

$content .= '<style type="text/css">
    .gambar {
        width: 50px;
    }
</style>';

$content .= '
<page>
    <table border="1" align="center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Foto</th>
        </tr>';

        $no = 1;
        foreach ($data_mahasiswa as $mhs) {
            $content .='
                <tr>
                    <td>'.$no++.'</td>
                    <td>'.$mhs['nama'].'</td>
                    <td>'.$mhs['prodi'].'</td>
                    <td>'.$mhs['jk'].'</td>
                    <td>'.$mhs['telepon'].'</td>
                    <td>'.$mhs['email']. '</td>
                    <td><img src="assets/img/' . $mhs['foto'] . '" class="gambar"></td>
                </tr>
            ';
        }
        
$content .= '
    </table>
</page>';

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
ob_start();
$html2pdf->output('laporan-mahasiswa.pdf');