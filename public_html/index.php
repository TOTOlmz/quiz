<?php

declare(strict_types=1);

define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH . '/vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Initialiser le PDO (charge automatiquement variables.php)
\App\Models\BaseModel::initializePdo();

// Import des contrôleurs avec namespaces
use App\Controllers\HeaderController;
use App\Controllers\HomeController;
use App\Controllers\LegalController;
use App\Controllers\ConnectionController;
use App\Controllers\RegistrationController;

use App\Controllers\CreatingQuizController;
use App\Controllers\QuizController;
use App\Controllers\CategoriesController;

use App\Controllers\Admin\AdminController;
use App\Controllers\Users\UserSpaceController;


// Instanciation des contrôleurs
$header = new HeaderController();
$home = new HomeController();
$legalController = new LegalController();

$connectionController = new ConnectionController();

$registrationController = new RegistrationController();
$creatingQuizController = new CreatingQuizController();
$quizController = new QuizController();
$categoriesController = new CategoriesController();

$adminController = new AdminController();
$userSpaceController = new UserSpaceController();

    
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/quiz/public_html'; // ajuster selon le dossier d'installation

if (stripos($path, $base) === 0) {
    $uri = substr($path, strlen($base));
} else {
    $uri = $path;
}


$uri = '/'.ltrim($uri, '/'); // garantit un slash initial
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/logo.png">
    
    <link rel="stylesheet" href="./assets/mainStyle.css">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/quizzesStyle.css">
    <link rel="stylesheet" href="./assets/popupStyle.css">
    <title>Ze Quiz</title>
</head>
<body>
    <?php $header->header(); ?>

    <div class="main">
        <?php
            if ($uri == '/') { $home->homeArea(); }
            else if (strpos($uri, '/connexion') === 0) { $connectionController->connection(); }
            else if (strpos($uri, '/deconnexion') === 0) { $connectionController->logout(); }
            else if (strpos($uri, '/inscription') === 0) { $registrationController->registration(); }


            else if (strpos($uri, '/espace-admin') === 0) { $adminController->adminArea(); }
            else if (strpos($uri, '/mon-espace') === 0) { $userSpaceController->userSpace(); }

            else if (strpos($uri, '/creer-un-quiz') === 0) { $creatingQuizController->creatingQuizArea(); }
            else if (strpos($uri, '/quiz') === 0) { $quizController->quizArea(); }
            else if (strpos($uri, '/categories') === 0) { $categoriesController->categoriesArea(); }


            else if (strpos($uri, '/legal') === 0) { $legalController->legalArea(); }

            else { echo '<h1 style="margin:15px;">404 - Page non trouvée</h1>'; }
        ?>
    </div>

    <?php
        // Ajout du footer
        require_once ROOT_PATH . '/src/Views/components/footer.php';
    ?>
</body>
</html>
