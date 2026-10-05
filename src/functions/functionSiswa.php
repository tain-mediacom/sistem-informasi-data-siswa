<?php

    // koneksi db
    require "lib/db.php";

    function semuaSiswa($db) {
        $stmt = $db->query("SELECT * FROM tabel_siswa");
        return $stmt->fetchAll();
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

    // Cek error upload
    if ($error !== UPLOAD_ERR_OK) {
        die("Upload gagal. Error code: " . $error);
    }

    // Ekstensi file
    $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    // Ekstensi yang diperbolehkan
    $allowed = ["jpg", "jpeg", "png"];

    if (!in_array($extension, $allowed)) {
        die("Format foto tidak diperbolehkan");
    }

    // Maksimal 2 MB
    if ($size > 2 * 1024 * 1024) {
        die("Ukuran foto terlalu besar. Maksimal 2 MB");
    }

    // Nama file baru
    $newName = uniqid() . "." . $extension;

    // Path absolut berdasarkan lokasi file PHP ini
    $folder = __DIR__ . "/img/siswa/";

    // Buat folder jika belum ada
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // Pindahkan file
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