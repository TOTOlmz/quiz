<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Contrôleur gérant l'affichage de l'entête
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */

namespace App\Controllers;

class HeaderController {
    
    public function header() {
        $connected = false;
        $admin = false;

        // On vérifie si une session est en cours
        if (isset($_SESSION['user_id'])) {
            $connected = true;
            // On vérifie si l'utilisateur est l'administrateur'
            if ($_SESSION['user_role'] === 'ADMIN') {
                $admin = true;
            }
        }

        // On charge la vue
        require __DIR__ . '/../Views/components/header.php';
    }
}