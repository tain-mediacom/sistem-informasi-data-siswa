<?php

    // koneksi db
    include_once "db.php";

    function semuaSiswa($db) {
        $stmt = $db->query("SELECT * FROM tabel_siswa");
        return $stmt->fetchAll();
    }

    function hapusSiswa($db, $id) {
        $stmt = $db->prepare("DELETE FROM tabel_siswa WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    
?>