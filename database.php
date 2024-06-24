<?php
// Funktion zur Datenbankverbindung (bereits vorhanden)
function dbConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "ribellas_boutique";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}
?>
