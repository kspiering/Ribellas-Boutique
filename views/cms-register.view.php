<?php
require_once 'functions.php';
checkUserLoggedIn();

require_once 'database.php';
$pdo = dbConnection();

require_once 'validation.php';
$validator = new FormValidator();

$errorMessage = [];
$successMessage = "";

if (isset($_POST['submit'])) {
    $validator->validateInput('username');
    $validator->validateInput('country');
    $validator->validateInput('firstname');
    $validator->validateInput('lastname');
    $validator->validateInput('email');
    $validator->validateInput('password');
    $validator->validateInput('confirm-password');
    $validator->validateInput('agb');

    $validator->validateUsername($_POST['username']);
    $validator->validateEmail($_POST['email']);
    $validator->validatePassword($_POST['password'], $_POST['confirm-password']);
    $validator->validateAgreement($_POST['agb']);

    $errors = $validator->getErrors();

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Bereinigen der Werte
        $country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8');
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
        $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash das Passwort
        $agb = isset($_POST['agb']) ? 1 : 0;

        try {
            $stmt = $pdo->prepare('INSERT INTO `users` (`country`, `firstname`, `lastname`, `username`, `email`, `password`, `agb`) 
                                   VALUES (:country, :firstname, :lastname, :username, :email, :password, :agb)');

            // Werte binden
            $stmt->bindValue(':country', $country);
            $stmt->bindValue(':firstname', $firstname);
            $stmt->bindValue(':lastname', $lastname);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':agb', $agb);

            $stmt->execute();

            // Erfolgsmeldung
            $successMessage = 'Registration successful and sent to database';
            echo $successMessage;
            header("Location: /cms-dashboard");
            exit;
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }
}

?>

<?php require "partials/head.php"; ?>
<?php require "partials/cms-register-head.php"; ?>
<?php require "partials/cms-nav.php"; ?>

<section class="titles">
    <h1>Sign up a new admin</h1>
</section>

<section class="register">
    <form action="" method="POST">
        <div class="country">
            <label for="countryOption">Your country*</label>
            <select id="countryOption" name="country">
                <option value="">Choose country</option>
                <option value="usa">USA</option>
                <option value="switzerland">Switzerland</option>
                <option value="germany">Germany</option>
                <option value="england">England</option>
            </select>
        </div>
        <br>
        <div class="firstname">
            <label for="firstname">Firstname*</label>
            <input type="text" name="firstname" id="firstname" placeholder="Firstname">
        </div>
        <br>
        <div class="lastname">
            <label for="lastname">Lastname*</label>
            <input type="text" name="lastname" id="lastname" placeholder="Lastname">
        </div>
        <br>
        <div class="username">
            <label for="username">Username*</label>
            <input type="text" name="username" id="username" placeholder="Username">
        </div>
        <br>
        <div class="gender">
        <label for="gender">Gender*</label>
        <br>
        <div class="male">
            <input type="radio" id="option1" name="gender" value="male">
            <label for="option1">male</label>
        </div>
        <div class="female">
            <input type="radio" id="option2" name="gender" value="female">
            <label for="option2">female</label>
        </div>
        <div class="other">
            <input type="radio" id="option3" name="gender" value="other">
            <label for="option3">other</label>
        </div>
        </div>
        <br>
        <div class="email">
            <label for="email">Email Address*</label>
            <input type="email" id="email" name="email" placeholder="E-mail">
        </div>
        <br>
        <div class="password">
            <label for="password">Password*</label>
            <input type="password" id="password" name="password" placeholder="Password">
        </div>
        <br>
        <div class="confirm-password">
            <label for="confirm-password">Confirm Password*</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
        </div>
        <br>
        <div class="agreement">
            <label for="agb">I agree to the <a href="../datenschutz">terms of use</a>:</label>
            <input type="checkbox" id="agb" name="agb">
        </div>
        <br>
        <div class="button">
            <button type="submit" name="submit" id="submit">Register</button>
        </div>
    </form>
</section>

</body>
</html>
       


        
