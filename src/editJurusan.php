<?php

    require_once "functions/functionJurusan.php";
    $title = "Update Jurusan";

    $id = $_GET["id"];
    $data = jurusanById($db, $id);
    

    if (isset($_POST["edit"])) {
        $jurusan = $_POST["jurusan"];
        $editJurusan = editJurusan($db, $id, $jurusan);
        if ($editJurusan > 0) {
            echo "
            <script>
            alert('Jurusan Berhasil di edit !');
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

            <form class="mt-4 border-2 border-slate-500 px-2 py-2 rounded-md shadow-md shadow-slate-500" action="" method="post">
                <div class="">
                    <input class="px-6 w-full py-2 border border-slate-700" type="text" name="jurusan" placeholder="Nama Jurusan" value="<?= $data["jurusan"] ?>">
                </div>
                <button type="submit" name="edit" class="mt-2 text-white hover:bg-blue-800 cursor-pointer bg-blue-600 px-4 py-2 w-full">Edit Jurusan</button>
            </form>
            
        </div>
        <!-- main content end -->
    </div>
<?php include_once "templates/footer.php"; ?>