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

    $title = 'Ubah Barang';
    include 'layout/header.php';

    // ambil id barang dr url
    $id_barang = (int) $_GET['id_barang'];

    $barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

    // cek apakah tombol UBAH ditekan
    if (isset($_POST['ubah'])) {
        if (update_barang($_POST) > 0) {
            echo "  <script>
                        alert('Data Barang Berhasil Diubah');
                        document.location.href = 'index.php';
                    </script>";
        } else {
            echo "  <script>
                        alert('Data Barang Gagal Diubah');
                        document.location.href = 'index.php';
                    </script>";
        }
    }
?>

<form action="" method="post">
    <input type="hidden" name="id_barang" value="<?= $barang['id_barang']?>">
    <div class="container mt-5">
        <h1><i class="fas fa-list-alt"></i> Edit Data Barang</h1>
        <hr>

        <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']?>" placeholder="nama barang..." required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah']?>" placeholder="jumlah barang..." required >
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga']?>" placeholder="harga barang..." required>
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;"><i class="fas fa-edit"></i> Update</button>
        </form>
    </div>    
</form>

<?php include 'layout/footer.php';?>