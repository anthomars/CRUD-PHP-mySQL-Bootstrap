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

    if($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
        echo   "<script>
                    alert('Anda Tidak Punya Hak Akses To This Page!');
                    document.location.href = 'index.php';
                </script>";
    } 

    $title = 'Daftar Mahasiswa';
    include 'layout/header.php';

    //menampilkan data mhs
    $data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<div class="container mt-5">
    <h1><i class="fas fa-users"></i> Data Mahasiswa</h1>
    <hr>

    <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>
   
    <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>

    <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download PDF</a>

    <table class="table table-striped table-bordered mt-3" id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no =1 ?>
            <?php foreach ($data_mahasiswa as $mhs): ?>
            
            <tr>
                <td><?= $no++;?></td>
                <td><?= $mhs['nama'] ;?></td>
                <td><?= $mhs['prodi'] ;?></td>
                <td><?= $mhs['jk'] ;?></td>
                <td><?= $mhs['telepon'] ;?></td>
                <td class="text-center" width="20%">
                    <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mhs['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                    <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mhs['id_mahasiswa']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                    <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mhs['id_mahasiswa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Hapus??');"><i class="fas fa-trash-alt"></i> Delete</a>
                </td>
            </tr>

            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>

<?php include 'layout/footer.php'; ?>
