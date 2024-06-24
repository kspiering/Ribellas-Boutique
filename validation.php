<?php

class FormValidator {
    private $errors = [];

    public function validateInput($input) {
        if (empty($_POST[$input])) {
            $this->errors[] = "Please enter $input";
        }
    }

    public function validateUsername($username) {
        $usernameLength = strlen($username);
        if ($usernameLength < 4 || $usernameLength > 16) {
            $this->errors[] = "Username must have between 4 and 16 characters";
        }
        if (strpos($username, " ") !== false) {
            $this->errors[] = "Username must not contain spaces";
        }
    }

    public function validateEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $this->errors[] = "Please enter a valid E-Mail";
        }
    }

    public function validatePassword($password, $confirm_password) {
        if ($password !== $confirm_password) {
            $this->errors[] = "Passwords do not match. Please try again.";
        } else {
            if (strlen($password) < 8 || strlen($password) > 12) {
                $this->errors[] = "Password needs to have between 8 and 12 characters";
            }
            if (!preg_match("/[a-z]/", $password)) {
                $this->errors[] = "Password must contain at least one lowercase letter";
            }
            if (!preg_match("/[A-Z]/", $password)) {
                $this->errors[] = "Password must contain at least one uppercase letter";
            }
            if (!preg_match("/[0-9]/", $password)) {
                $this->errors[] = "Password must contain at least one digit";
            }
            if (!preg_match("/[^a-zA-Z0-9\s]/", $password)) {
                $this->errors[] = "Password must contain at least one special character";
            }
            if (preg_match("/\s/", $password)) {
                $this->errors[] = "Password cannot contain whitespace";
            }
        }
    }

    public function validateAgreement($agb) {
        if (!isset($agb) || empty($agb)) {
            $this->errors[] = "Please agree with our terms of use";
        }
    }

    public function getErrors() {
        return $this->errors;
    }
}


?>