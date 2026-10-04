<?php

    // koneksi db
    require "lib/db.php";

    function semuaStatus($db) {
        $stmt = $db->query("SELECT * FROM tabel_status");
        return $stmt->fetchAll();
    }

     function statusById($db, $id) {
        $stmt = $db->prepare("SELECT * FROM tabel_status WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function tambahStatus($db, $status) {
        $stmt = $db->prepare("INSERT INTO tabel_status (status) VALUES (?)");
        $stmt->execute([$status]);
        return $stmt->rowCount();
    }

    function editStatus($db, $id, $status) {
        $stmt = $db->prepare("UPDATE tabel_status SET `status` = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
        return $stmt->rowCount();
    }


    function hapusStatus($db, $id) {
        $stmt = $db->prepare("DELETE FROM tabel_status WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

?>