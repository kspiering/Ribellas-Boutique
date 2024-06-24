<?php 
require_once 'functions.php';
checkUserLoggedIn();

require_once "database.php";
$pdo = dbConnection();

require "partials/cms-edit-post-head.php";
require "partials/head.php";
require "partials/cms-nav.php";

?>
    
    <section class="edit-post">
        <div class="titles">
            <h1>Edit Blogpost</h1>
        </div>
    
<?php

        try {

            // Überprüfen, ob ID übergeben wurde
            if (isset($_POST['id'])) {
                $post_id = strip_tags($_POST['id']);

                // Query, um den aktuellen Blogbeitrag zu laden
                $sql = "SELECT * FROM blogs WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
                $stmt->execute();

                // Überprüfen, ob ein Beitrag gefunden wurde
                if ($stmt->rowCount() == 1) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    // Formular mit den aktuellen Daten des Beitrags
                    ?>
                    <form method="post" action="/cms-update-post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo strip_tags($row['id']); ?>">
                        
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="<?php echo strip_tags($row['title']); ?>" required>
                    
                        <label for="subtitle">Subtitle:</label>
                        <input type="text" id="subtitle" name="subtitle" value="<?php echo strip_tags($row['subtitle']); ?>" required>
                    
                        <label for="location">Location:</label>
                        <input type="text" id="location" name="location" value="<?php echo strip_tags($row['location']); ?>" required>
                    
                        <label for="date">Date:</label>
                        <input type="text" id="date" name="date" value="<?php echo strip_tags($row['date']); ?>" required>
                    
                        <label for="text">Text:</label>
                        <textarea id="text" name="text"><?php echo strip_tags($row['text']); ?></textarea>
                        
                        <label for="myFile">Image:</label>
                        <?php if (!empty($row['image'])): ?>
                            <p>Aktuelles Bild: <?php echo strip_tags($row['image']); ?></p>
                        <?php endif; ?>
                        <input type="file" accept="image/jpeg,image/png,image/gif" name="myFile" id="myFile">
                        
                        <label for="alt">Alt text:</label>
                        <input type="text" name="alt" id="alt" value="<?php echo strip_tags($row['alt']); ?>" required>
                    
                        <label for="tags">Tags:</label>
                        <input type="text" id="tags" name="tags" value="<?php echo strip_tags($row['tags']); ?>" required>
                        <div class="buttons">
                        <button type="submit">Update Post</button>
                        </div>
                    </form>

<?php
       } else {
                    echo '<p>Post not found.</p>';
                }
            } else {
                echo '<p>Post ID not specified.</p>';
            }
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        } finally {
            $pdo = null;
        }
 ?>
   
</section>

</body>
</html>
