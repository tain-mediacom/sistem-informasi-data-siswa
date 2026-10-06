<?php

    require_once "functions/functionSiswa.php";
    require_once "functions/functionJurusan.php";
    $title = "Detail Siswa";

    $id = $_GET["id"];
    $data = siswaById($db, $id);

?>


<?php include_once "templates/header.php"; ?>
    <div class="flex h-screen">
        <!-- sidebar -->
        <?php include_once "templates/sidebar.php"; ?>
        <!-- sidebar end -->

        <!-- main content -->
        <div class="content px-6 py-2">
            <h1 class="text-xl font-semibold"><?php echo $title; ?></h1>

            <ul>
                <li><img class="h-96" src="img/siswa/<?= $data["foto"]; ?>" alt="siswa"></li>
                <li>Nama : <?= $data["nama"]; ?></li>
                <li>NISN : <?= $data["nisn"]; ?></li>
                <li>Tempat, Tanggal Lahir : <?= $data["tmpt_lahir"]; ?>, <?= $data["tgl_lahir"]; ?></li>
            </ul>
            
        </div>
        <!-- main content end -->
    </div>
<?php include_once "templates/footer.php"; ?>