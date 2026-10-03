<?php

    // koneksi db
    require "lib/db.php";

    function semuaJurusan($db) {
        $stmt = $db->query("SELECT * FROM tabel_jurusan");
        return $stmt->fetchAll();
    }

?>