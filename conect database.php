<?php
function connect() {
    $host = "127.0.0.1";
    $port = "5432";
    $dbname = "Crypto";
    $user = "postgres";
    $password = "";

    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return "Connection to the database was successful.";
        //redirect vers youtube

    } catch (PDOException $e) {
        return "Connection failed: " . $e->getMessage();
    }
}

echo connect();
