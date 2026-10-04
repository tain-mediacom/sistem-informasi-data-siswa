<?php

    require_once "functions/functionStatus.php";
    $title = "Tambah Status";

    if (isset($_POST["tambah"])) {
        $status = $_POST["status"];
        $tambahStatus = tambahStatus($db, $status);
        if ($tambahStatus > 0) {
            echo "
            <script>
            alert('Status Berhasil Ditambah !');
            window.location.href = 'status.php';
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
                    <input class="px-3 w-full py-2 border border-slate-700" type="text" name="status" placeholder="Status">
                </div>
                <button type="submit" name="tambah" class="mt-2 text-white hover:bg-blue-800 cursor-pointer bg-blue-600 px-4 py-2 w-full">Tambah Status</button>
            </form>
            
        </div>
        <!-- main content end -->
    </div>
<?php include_once "templates/footer.php"; ?>