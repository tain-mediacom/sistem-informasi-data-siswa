<?php

    require_once "functions/functionJurusan.php";
    $title = "Jurusan";
    $dataJurusan = semuaJurusan($db);

     if (isset($_POST["hapus"])) {
        $id = $_POST["id"];
        $hapus = hapusJurusan($db, $id);
        if ($hapus > 0) {
            echo "
            <script>
            alert('Jurusan dihapus !');
            window.location.href = 'jurusan.php';
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

            <a href="tambahJurusan.php" class="px-6 py-2 bg-cyan-600 mt-4 inline-block text-slate-50 font-semibold rounded-md border border-cyan-300 shadow-md shadow-cyan-200 hover:bg-cyan-800 hover:shadow-none">Tambah Jurusan</a>

            <table class="mt-4">
                <thead>
                    <tr>
                        <th class="border border-cyan-200 bg-blue-900 text-white py-2 px-3">No</th>
                        <th class="border border-cyan-200 bg-blue-900 text-white py-2 px-6">Jurusan</th>
                        <th class="border border-cyan-200 bg-blue-900 text-white py-2 px-6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x=1; foreach($dataJurusan as $jurusan) : ?>
                    <tr>
                        <td class="border border-cyan-200 text-slate-700 py-1 px-3"><?php echo $x++; ?></td>
                        <td class="border border-cyan-200 text-slate-700 py-1 px-6"><?php echo $jurusan["jurusan"]; ?></td>
                        <td class="border flex items-center gap-2 border-cyan-200 text-slate-700 py-1 px-6">
                            <form action="" method="post" onclick="return confirm('Yakin hapus jurusan !')">
                                <input type="hidden" name="id" value="<?php echo $jurusan["id"]; ?>">
                                <button type="submit" name="hapus" class="bg-red text-white py-0.5 px-2 rounded-md border border-red-300 bg-red-700">Hapus</button>
                            </form>
                            <a href="" class="bg-blue-700 py-0.5 px-4 rounded-md border border-cyan-300 block text-white">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- main content end -->
    </div>
<?php include_once "templates/footer.php"; ?>