<?php
require_once "functions.php";
require_once "database.php";
$pdo = dbConnection();
session_start();

$errorMessage = '';
$successMessage = '';


if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
    
        // Bereinigen der Werte
        $username = strip_tags($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $statement = $pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $statement->execute(['username' => $_POST['username']]);
        $userdaten = $statement->fetch();


        if ($userdaten !== false && password_verify($_POST['password'], $userdaten['password'])) {
 
            $_SESSION['user_id'] = $userdaten['id'];
            header("Location: /cms-dashboard");
            exit; 
        } else {
        
            $errorMessage = "Username or password incorrect";
        }
    }
}
?>

<?php
if (!empty($errorMessage)) {
echo $errorMessage;
};

require "partials/cms-login-head.php";
?>

<section class="titles">
    <h1>Login</h1>
    <h2>Please fill out form to login to your CMS account</h2>
</section>

<section class="login">
    <form action="" method="POST">
        <br>
        <div class="username">
            <label for="username">Username*</label>
            <input type="text" name="username" id="username" placeholder="Username" required autocomplete="username">
        </div>
        <br>
        <div class="password">
            <label for="password">Password*</label>
            <input type="password" id="password" name="password" placeholder="Password" required autocomplete="current-password">
        </div>
        <br>
        <div class="buttons">
            <button type="submit" name="submit" id="submit">Login</button>
        </div>

        <p id="bye"> Done working? Explore <a href="/">Homepage</a></p>
    </form>
    
</section>

</body>
</html>
