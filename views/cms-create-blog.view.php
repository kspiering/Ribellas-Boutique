<?php
require_once 'functions.php';
checkUserLoggedIn();

require_once 'database.php';
$pdo = dbConnection();

require_once 'file-upload.php';
$fileUpload = new FileUpload();


// Formularverarbeitung
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitBlog'])) {
   
    $title = strip_tags($_POST['title']);
    $subtitle = strip_tags($_POST['subtitle']);
    $location = strip_tags($_POST['location']);
    $date = strip_tags($_POST['date']);
    $text = strip_tags($_POST['text']);
    $alt = strip_tags($_POST['alt']);
    $tags = strip_tags($_POST['tags']);

    // File Upload
    if (isset($_FILES['myFile'])) {
        $fileUpload = new FileUpload();
        $altText = strip_tags($alt); 

        $file = $_FILES['myFile'];

        if (is_array($file) && $file['error'] == 0) {
            $uploadResult = $fileUpload->uploadFile($file, $altText);

            if ($uploadResult['success']) {
                $imagePath = $uploadResult['path']; 

                try {
                    // SQL-Abfrage für Blog
                    $stmt = $pdo->prepare("INSERT INTO blogs (title, subtitle, location, date, text, imagepath, alt, tags) 
                    VALUES (:title, :subtitle, :location, :date, :text, :imagepath, :alt, :tags)");
                   
                   $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':subtitle', $subtitle);
                    $stmt->bindParam(':location', $location);
                    $stmt->bindParam(':date', $date);
                    $stmt->bindParam(':text', $text);
                    $stmt->bindParam(':tags', $tags);
                    $stmt->bindParam(':imagepath', $imagePath);
                    $stmt->bindParam(':alt', $alt);

                    $stmt->execute();

                    sleep(2);
                    $successMessage = 'Blog successfully created and sent to databank';
                    echo $successMessage;

                    header('Location: ../cms-create-blog');
                    exit;

                } catch (PDOException $e) {
                    echo 'Blog could not be uploaded: ' . $e->getMessage();
                }
            } else {
                echo $uploadResult['message'];
            }
        } else {
            echo 'invalid dataupload';
        }
    } else {
        echo 'image is missing';
    }
}
?>


    <?php require "partials/head.php"; ?>
    <?php require "partials/cms-create-blog-head.php"; ?>
    <?php require "partials/cms-nav.php"; ?>

    <section class="titles">
        <h1>Create new blog</h1>
    </section>

    <form method="POST" action="" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    
        <label for="subtitle">Subtitle:</label>
        <input type="text" id="subtitle" name="subtitle" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
    
        <label for="date">Date:</label>
        <input type="text" id="date" name="date" required>
    
        <label for="text">Text:</label>
        <textarea id="text" name="text"></textarea>
        
        <label for="myFile">Image:</label>
        <input type="file" accept="image/jpeg,image/png,image/gif" name="myFile" id="myFile" required>
        
        <label for="alt">Alt text</label>
        <input type="text" name="alt" id="alt" required>

        <label for="tags">Tags:</label>
        <input type="text" id="tags" name="tags" required>

        <div class="buttons">
            <button type="submit" name="submitBlog">Upload Blog</button>
        </div>
    </form>

</body>
</html>
