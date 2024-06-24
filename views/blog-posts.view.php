<?php
require "partials/head.php";
require "partials/nav.php";
require "partials/blogpost-head.php";
require_once 'database.php';
?>

<div class="titles">
    <h1>Fashion Blog</h1>
</div>

<div class="container">
    <section class="blog">'

<?php
$pdo = dbConnection();

try {
  
    $sql = "SELECT title, subtitle, location, date, text, imagepath, tags FROM blogs";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        echo '<table>';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $title = isset($row['title']) ? strip_tags($row['title']) : '';
            $subtitle = isset($row['subtitle']) ? strip_tags($row['subtitle']) : '';
            $location = isset($row['location']) ? strip_tags($row['location']) : '';
            $date = isset($row['date']) ? strip_tags($row['date']) : '';
            $text = isset($row['text']) ? strip_tags($row['text']) : '';
            $imagepath = isset($row['imagepath']) ? strip_tags($row['imagepath']) : '';
            $tags = isset($row['tags']) ? strip_tags($row['tags']) : '';

            echo '<tr class="blogPost">';
            echo '<td class="post-title" id="titel"><h2>'. $title . '</h2></td>';
            echo '<td class="post-subtitle"><h3>' . $subtitle . '</h3></td>';
            echo '<td class="post-location" id="location">' . $location . '</td>';
            echo '<td class="post-date">' . $date . '</td>';
            echo '<td class="post-imagepath"><img id="blogImg" src="' . $imagepath . '" alt="' . $title . ' - Bild"></td>';
            echo '<td class="post-text" id="text"><p>' . $text . '</p></td>';
            echo '<td class="post-tags" id="tags">#' . $tags . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>Keine Blog-Posts gefunden</p>';
    }


} catch (PDOException $e) {
    die("Verbindung fehlgeschlagen: " . $e->getMessage());
} finally {
    $pdo = null;
} 
?>

</section>
</div>

<?php
require "partials/footer.php";
?>
