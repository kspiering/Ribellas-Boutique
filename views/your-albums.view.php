<?php 
require "partials/your-albums-head.php";
require "partials/head.php";
require "partials/nav.php";
?>

<section class="titles">
    <h1>Your Albums</h1>
</section>
<section class="album">
    <div class="album-winter">
        <img src="../assets/images/WebP/Your-albums/winter-outfit.webp" alt="Frau auf einer Treppe mit Hut">
        <p>Winter Album</p>
    </div>
    <div class="album-spring">
        <img src="../assets/images/WebP/Your-albums/spring-outfit.webp" alt="Frau mit einem roten Roller auf der Strasse">
        <p>Spring Album</p>
    </div>
    <div class="album-summer">
        <img src="../assets/images/WebP/Your-albums/summer-outfit.webp" alt="Frau in weissem Kleid in einem Feld mit roten Blumen">
        <p>Summer Album</p>
    </div>
    <div class="album-fall">
        <img src="../assets/images/WebP/Your-albums/fall-outfit.webp" alt="Frau in einem Business Outift">
        <p>Fall Album</p>
    </div>
    <div class="add">
        <span class="material-symbols-outlined">add_photo_alternate</span>
        <p>New Album</p>
    </div>
</section>
        
<?php 
     require "partials/footer.php"
?>