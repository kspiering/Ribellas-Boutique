<?php
require_once 'functions.php';
checkUserLoggedIn();

require_once "database.php";
$pdo = dbConnection();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    try {

        $id = strip_tags($_POST['id']);

        $sql = "DELETE FROM blogs WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        echo "Blog successfully updated.";
        sleep(1);
        header("Location: ../cms-blogposts");
        exit();
    } catch(PDOException $e) {
        die("Verbindung fehlgeschlagen: " . $e->getMessage());
    } finally {
        $pdo = null;
    }
} else {
  
    header("Location: ../cms-blogposts");
    exit();
}
?>
