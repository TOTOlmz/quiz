<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Contrôleur gérant l'affichage de l'accueil
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */

namespace App\Controllers;

class HomeController {
    public function homeArea() {
        require_once __DIR__ . '/../views/homeView.php';
    }
}