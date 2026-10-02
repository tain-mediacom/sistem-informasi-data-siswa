<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sids";
    $dns = "mysql:host=$host;dbname=$dbname";
    
    // koneksi
    $db = new PDO($dns, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>