<?php

    require_once "functions/functionSiswa.php";
    require_once "functions/functionJurusan.php";
    $title = "Tambah Siswa";

    $jurusan = semuaJurusan($db);

    if (isset($_POST["tambah"])) {
        $siswa = tambahSiswa($db, $_POST, $_FILES);
        if ($siswa > 0) {
            echo "
            <script>
            alert('Siswa Baru Ditambahkan !');
            window.location.href = 'siswa.php';
            </script>";
            exit();
        }
    }

?>


<?php include_once "templates/header.php"; ?>
    <div class="flex h-screen">
        <!-- sidebar -->
        <?php include_once "templates/sidebar.php"; ?>
        <!-- sidebar end -->

        <!-- main content -->
        <div class="content px-6 py-2">
            <h1 class="text-xl font-semibold"><?php echo $title; ?></h1>

           
            <form class="mt-4 border-2 border-slate-500 px-2 py-2 rounded-md shadow-md shadow-slate-500" action="" method="post" enctype="multipart/form-data">
                <div class="flex justify-center gap-6">
                    <div class="w-md">
                        <p class="mb-4 text-center">--- Data Siswa ---</p>
                        <input class="block mb-2 px-3 w-full py-2 border border-slate-700" type="text" name="nama" placeholder="Nama Siswa">
                        <input class="block mb-2 px-3 w-full py-2 border border-slate-700" type="text" name="nisn" placeholder="NISN">
                        <input class="block mb-2 px-3 w-full py-2 border border-slate-700" type="text" name="tmpt_lahir" placeholder="Tempat Lahir">
                        <input class="block mb-2 px-3 w-full py-2 border border-slate-700" type="date" name="tgl_lahir">
                        <select name="kelamin" class="block mb-2 px-3 w-full py-2 border border-slate-700" required>
                            <option value="" class="text-sm text-slate-400">--- Jenis Kelamin ---</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <input class="block mb-2 px-3 w-full py-2 border border-slate-700" type="text" name="agama" placeholder="Agama">
                        <textarea name="alamat" class="block mb-2 px-3 w-full py-2 border border-slate-700" placeholder="Alamat Siswa"></textarea>
                         <select name="jurusan" class="block mb-2 px-3 w-full py-2 border border-slate-700" required>
                            <option value="" class="text-sm text-slate-400">--- Jurusan ---</option>
                            <?php foreach($jurusan as $data) : ?>
                            <option value="<?= $data["id"]; ?>"><?= $data["jurusan"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input class="block mb-2 w-full border border-slate-700 file:text-white file:bg-blue-500 file:px-4 file:py-2 file:mr-4 file:hover:bg-blue-700 file:cursor-pointer" type="file" name="foto">
                    </div>

                    <div class="w-md">
                        <p class="mb-4 text-center">--- Data Orang Tua ---</p>
                        <input class="block mb-2 px-3 w-full py-2 border border-slate-700" type="text" name="ayah" placeholder="Nama Ayah">
                        <input class="block mb-2 px-3 w-full py-2 border border-slate-700" type="text" name="ibu" placeholder="Nama Ibu">
                        <input class="block mb-2 px-3 w-full py-2 border border-slate-700" type="text" name="hp_ortu" placeholder="Nomor Hp Orang Tua">
                        <textarea name="alamat_ortu" class="block mb-2 px-3 w-full py-2 border border-slate-700" placeholder="Alamat Orang Tua"></textarea>
                        <div class="text-slate-500 text-sm mt-4">
                            <h4 class="font-bold text-lg">Catatan :</h4>
                            <ul class="list-disc ml-4">
                                <li>Size Foto Maximal 2MB</li>
                                <li>Ekstensi Hanya jpg, png, webp</li>
                                <li>Menggunakan Seragam Sekolah</li>
                                <li>Menggunakan Backgorund Merah</li>
                                <li>Resolusi 4cm x 6cm</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <button type="submit" class="w-full py-2 bg-sky-600 hover:bg-sky-700 cursor-pointer hover:font-semibold text-white border border-sky-300" name="tambah">Simpan</button>
            </form>
        </div>
        <!-- main content end -->
    </div>
<?php include_once "templates/footer.php"; ?>