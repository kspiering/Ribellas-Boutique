<?php
require_once 'functions.php';
checkUserLoggedIn();

require_once 'database.php';
$pdo = dbConnection();

require "partials/head.php";
require "partials/cms-dashboard-head.php";
require "partials/cms-nav.php";
?>

    <section class="titles">
        <h1>Dashboard</h1>
    </section>


<section class="userList">
<h2>Administrator list</h2>
    <?php 
   try {

       $sql = "SELECT id, username FROM users";
       $stmt = $pdo->prepare($sql);
       $stmt->execute();

       if ($stmt->rowCount() > 0) {

           echo '<table>';
           echo '<tr class="titel"><th class="th-id">ID</th><th class="th-titel">Username</th></tr>';

           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               echo '<tr id="row-' . strip_tags($row['id']) . '">';
               echo '<td class="post-id">' . strip_tags($row['id']) . '</td>';
               echo '<td class="post-title">' . strip_tags($row['username']) . '</td>';
               echo '<td class="post-actions">';
               echo '<form id="delete-' . strip_tags($row['id']) . '" style="display: inline-block;" method="post" action="/cms-delete-user" onsubmit="return confirm(\'Do you want to delete cms user?\');">';
               echo '<input type="hidden" name="id" value="' . strip_tags($row['id']) . '">';
               echo '<button id="cms" type="submit">Delete</button>';
               echo '</form>';
               echo '</td>';
               echo '</tr>';
           }

           echo '</table>';
       } else {
           echo '<p>No posts found</p>';
       }
   } catch(PDOException $e) {
       die("Verbindung fehlgeschlagen: " . $e->getMessage());
   } finally {
       $pdo = null;
   }
?>
</section>
</body>
</html>
