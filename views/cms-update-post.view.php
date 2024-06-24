<?php
require_once 'functions.php';
checkUserLoggedIn();

require_once "database.php";
$pdo = dbConnection();

try {

    // Überprüfen, ob das Formular übermittelt
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $post_id = $_POST['id'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $text = $_POST['text'];
        $alt = $_POST['alt'];
        $tags = $_POST['tags'];

        // Datei-Upload verarbeiten
        if (isset($_FILES['myFile']) && $_FILES['myFile']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['myFile']['name'];
            $file_tmp = $_FILES['myFile']['tmp_name'];

            
            $upload_dir = "../uploads/";
            move_uploaded_file($file_tmp, $upload_dir . $file_name);

            $image = $file_name;
        } else {
    
            $sql = "SELECT imagepath FROM blogs WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $image = $row['imagepath'];
        }

        // SQL-Update-Statement
        $sql = "UPDATE blogs SET title = :title, subtitle = :subtitle, location = :location, date = :date, text = :text, imagepath = :imagepath, alt = :alt, tags = :tags WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Werte binden
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':subtitle', $subtitle, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindParam(':imagepath', $image, PDO::PARAM_STR);
        $stmt->bindParam(':alt', $alt, PDO::PARAM_STR);
        $stmt->bindParam(':tags', $tags, PDO::PARAM_STR);
        $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);

        // SQL-Update ausführen
        $stmt->execute();
        echo "Blod successfully updated.";
        sleep(3);
        header("Location: ../cms-blogposts");
        exit();
    } else {

        header("Location: ../cms-edit-post?id=" . $_POST['id']);
        exit();
    }
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
} finally {
    $pdo = null;
}
?>
