<?php

    // koneksi db
    require "lib/db.php";

    function semuaJurusan($db) {
        $stmt = $db->query("SELECT * FROM tabel_jurusan");
        return $stmt->fetchAll();
    }

    function jurusanById($db, $id) {
        $stmt = $db->prepare("SELECT * FROM tabel_jurusan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function tambahJurusan($db, $jurusan) {
        $stmt = $db->prepare("INSERT INTO tabel_jurusan (jurusan) VALUES (?)");
        $stmt->execute([$jurusan]);
        return $stmt->rowCount();
    }

    function editJurusan($db, $id, $jurusan) {
        $stmt = $db->prepare("UPDATE tabel_jurusan SET jurusan = ? WHERE id = ?");
        $stmt->execute([$jurusan, $id]);
        return $stmt->rowCount();
    }

    function hapusJurusan($db, $id) {
        $stmt = $db->prepare("DELETE FROM tabel_jurusan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    
?>