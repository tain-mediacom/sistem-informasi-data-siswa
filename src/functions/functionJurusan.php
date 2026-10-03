<?php

    // koneksi db
    require "lib/db.php";

    function semuaJurusan($db) {
        $stmt = $db->query("SELECT * FROM tabel_jurusan");
        return $stmt->fetchAll();
    }

    function tambahJurusan($db, $jurusan) {
        $newJurusan = $jurusan;
        $stmt = $db->prepare("INSERT INTO tabel_jurusan (jurusan) VALUES (?)");
        $stmt->execute([$newJurusan]);
        return $stmt->rowCount();
    }

    function hapusJurusan($db, $id) {
        $stmt = $db->prepare("DELETE FROM tabel_jurusan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    
?>