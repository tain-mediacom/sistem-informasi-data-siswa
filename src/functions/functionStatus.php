<?php

    // koneksi db
    require "lib/db.php";

    function semuaStatus($db) {
        $stmt = $db->query("SELECT * FROM tabel_status");
        return $stmt->fetchAll();
    }

?>