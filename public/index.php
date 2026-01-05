<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Initialiser le PDO (charge automatiquement variables.php)
\App\Models\BaseModel::initializePdo();

// Import des contrôleurs avec namespaces
use App\Controllers\HeaderController;
use App\Controllers\HomeController;
use App\Controllers\ConnectionController;
use App\Controllers\RegistrationController;
use App\Controllers\QuizController;


// Instanciation des contrôleurs
$header = new HeaderController();
$home = new HomeController();
$connectionController = new ConnectionController();
$registrationController = new RegistrationController();
$quizController = new QuizController();


    
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = '/quiz/public/';

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
    <link rel="stylesheet" href="./assets/style.css">
    <title>Ecoride</title>
</head>
<body>
    <pre>
    <?php print_r($_SESSION); ?>
    </pre>
    <?php $header->header(); ?>

    <div class="main">
        <?php
            if ($uri == '/') { $home->homeArea(); }
            else if (strpos($uri, '/connexion') === 0) { $connectionController->connection(); }
            else if (strpos($uri, '/deconnexion') === 0) { $connectionController->logout(); }
            else if (strpos($uri, '/inscription') === 0) { $registrationController->registration(); }

            else if (strpos($uri, '/creer-un-quiz') === 0) { $quizController->quizArea(); }

            else { echo '<h1 style="margin:15px;">404 - Page non trouvée</h1>'; }
        ?>
    </div>
    <?php
        // Ajout du footer
        // require __DIR__ . '/../src/Views/components/footer.php';
    ?>
</body>
</html>
