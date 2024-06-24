<?php

// Check if user loged in
function checkUserLoggedIn() {
    session_start(); 
    
    if (!isset($_SESSION['user_id'])) {
      
        header('Location: ../cms-login');
        exit();
    }
}

function create_usersession() {
    // Starte die Session, wenn sie noch nicht gestartet ist
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Setze Session-Variablen
    $_SESSION['isloggedin'] = true; // Login-Status
    $_SESSION['userip'] = $_SERVER['REMOTE_ADDR']; // IP speichern für Prüfung
    $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT']; // User-Agent speichern für Prüfung
    $_SESSION['timestamp'] = time(); // Timestamp für Zeiteinschränkung

    // Rückgabe true, um anzuzeigen, dass die Session erfolgreich erstellt wurde
    return true;
}



?>