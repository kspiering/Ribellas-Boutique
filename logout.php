<?php

 function performLogout() {
        if (isset($_POST['logout'])) {
          
            session_start();
            session_destroy();
            
          
            header('Location: ../cms-login');
            exit();
        }
    }

?>
