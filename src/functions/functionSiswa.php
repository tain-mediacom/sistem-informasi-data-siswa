<?php

    // koneksi db
    require "lib/db.php";

    function semuaSiswa($db) {
        $stmt = $db->query("SELECT siswa.*, jurusan.jurusan FROM tabel_siswa AS siswa JOIN tabel_jurusan AS jurusan on siswa.jurusan_id = jurusan.id");
        return $stmt->fetchAll();
    }

    function siswaById($db, $id) {
        $stmt = $db->prepare("SELECT siswa.*, jurusan.jurusan FROM tabel_siswa AS siswa JOIN tabel_jurusan AS jurusan on siswa.jurusan_id = jurusan.id WHERE siswa.id = ?");
        $stmt->execute([$id]);            
        return $stmt->fetch();
    }

    function tambahSiswa($db, $data) {
       $nama = $_POST["nama"];
       $nisn = $_POST["nisn"];
       $tmpt_lahir = $_POST["tmpt_lahir"];
       $tgl_lahir = $_POST["tgl_lahir"];
       $kelamin = $_POST["kelamin"];
       $agama = $_POST["agama"];
       $alamat = $_POST["alamat"];
       $ayah = $_POST["ayah"];
       $ibu = $_POST["ibu"];
       $hp_ortu = $_POST["hp_ortu"];
       $alamat_ortu = $_POST["alamat_ortu"];
       $jurusan = $_POST["jurusan"];

       $foto = uploadFoto();

       $stmt = $db->prepare("INSERT INTO tabel_siswa (nama, nisn, tmpt_lahir, tgl_lahir, kelamin, agama, alamat, ayah, ibu, hp_ortu, alamat_ortu, jurusan_id, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

       $stmt->execute([$nama, $nisn, $tmpt_lahir, $tgl_lahir, $kelamin, $agama, $alamat, $ayah, $ibu, $hp_ortu, $alamat_ortu, $jurusan, $foto]);

       return $stmt->rowCount();

    }

    function uploadFoto() {
        if (!isset($_FILES["foto"])) {
            die("File foto tidak ditemukan di \$_FILES");
        }

        $name = $_FILES["foto"]["name"];
        $size = $_FILES["foto"]["size"];
        $temp_name = $_FILES["foto"]["tmp_name"];
        $error = $_FILES["foto"]["error"];

        if ($error !== UPLOAD_ERR_OK) {
            die("Upload gagal. Error code: " . $error);
        }

        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        $allowed = ["jpg", "jpeg", "png"];

        if (!in_array($extension, $allowed)) {
            die("Format foto tidak diperbolehkan");
        }

        if ($size > 2 * 1024 * 1024) {
            die("Ukuran foto terlalu besar. Maksimal 2 MB");
        }

        $newName = uniqid() . "." . $extension;

        $folder = __DIR__ . "/../img/siswa/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        if (!move_uploaded_file($temp_name, $folder . $newName)) {
            die("Foto gagal dipindahkan ke folder: " . $folder);
        }

        return $newName;
    }

    function hapusSiswa($db, $id) {
        $stmt = $db->prepare("DELETE FROM tabel_siswa WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    
?>