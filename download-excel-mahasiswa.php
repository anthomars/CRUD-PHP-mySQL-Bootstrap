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

require 'config/app.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No.');
$sheet->setCellValue('B2', 'Nama');
$sheet->setCellValue('C2', 'Program Studi');
$sheet->setCellValue('D2', 'Jenis Kelamin');
$sheet->setCellValue('E2', 'Telepon');
$sheet->setCellValue('F2', 'Email');
$sheet->setCellValue('G2', 'Foto');

$data_mahasiswa = select("SELECT * FROM mahasiswa");
$no =1;
$start =3;

foreach($data_mahasiswa as $mhs) {
    $sheet->setCellValue('A' . $start, $no++)->getColumnDimension('A')->setAutoSize(true);
    $sheet->setCellValue('B' . $start, $mhs['nama'])->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('C' . $start, $mhs['prodi'])->getColumnDimension('C')->setAutoSize(true);
    $sheet->setCellValue('D' . $start, $mhs['jk'])->getColumnDimension('D')->setAutoSize(true);
    $sheet->setCellValue('E' . $start, $mhs['telepon'])->getColumnDimension('E')->setAutoSize(true);
    $sheet->setCellValue('F' . $start, $mhs['email'])->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G' . $start, 'http://localhost/crud-phpmysqlbootstrap/assets/img/'. $mhs['foto'])->getColumnDimension('G')->setAutoSize(true);

    $start++;
}

//table border
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            // 'color' => ['argb' => 'FFFF0000'],
        ],
    ],
];

$border = $start -1;
$sheet->getStyle('A2:G'.$border)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('laporanDataMhs.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
//header('Content-Length: ');
header('Content-Disposition: attachment;filename="laporanDataMhs.xlsx"');
readfile('laporanDataMhs.xlsx');
unlink('laporanDataMhs.xlsx');
exit;