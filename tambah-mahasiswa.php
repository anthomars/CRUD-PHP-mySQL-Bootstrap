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

    $title = 'Tambah Mahasiswa';
    include 'layout/header.php';

    // cek apakah tombol tambah ditekan
    if (isset($_POST['tambah'])) {
        if (create_mahasiswa($_POST) > 0) {
            echo "  <script>
                        alert('Data Mahasiswa Berhasil Ditambahkan');
                        document.location.href = 'mahasiswa.php';
                    </script>";
        } else {
            echo "  <script>
                        alert('Data Mahasiswa Gagal Ditambahkan');
                        document.location.href = 'mahasiswa.php';
                    </script>";
        }
    }
?>
    <div class="container mt-5">
        <h1>Tambah Mahasiswa</h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama mahasiswa..." required>
            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Program Studi</label>
                        <select name="prodi" id="prodi" class="form-control" required>
                            <option value="">--Pilih Prodi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-6">
                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="">--Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" placeholder="telepon..." required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email..." required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="foto..." onchange="previewImg()">

                <img src="" class="img-thumbnail img-preview mt-2" alt="" width="100px">
            </div>

            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
        </form>
    </div>    

    <!-- preview image -->
    <script>
        function previewImg() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

<?php include 'layout/footer.php';?>