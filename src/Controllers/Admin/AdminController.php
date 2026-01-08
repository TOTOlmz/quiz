<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur gérant la page d'administration
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\AccessController;
use App\Models\AdminModel;

class AdminController extends BaseController {

    protected array $errors = [];
    protected string $success = '';

    protected array $currentReports = [];   // Pour avoir un suivi des signalements
    protected int $nbOfQuizzes = 0;         // Pour avoir le nombre de quizzes actuellement dans la base
    protected int $nbOfPlayers = 0;         // Pour avoir le nombre de joueurs inscrits

    public function adminArea() {

        // Vérification des accès
        $accessController = new AccessController();
        $accessController->checkAccess('ADMIN');

        $this->currentReports = AdminModel::getReports();
        $this->nbOfQuizzes = AdminModel::getNumberOfQuizzes();
        $this->nbOfPlayers = AdminModel::getNumberOfPlayers();


        // Simplification des appels de variables pour la vue
        $reports = $this->currentReports;
        $nbQuizzes = $this->nbOfQuizzes;
        $nbPlayers = $this->nbOfPlayers;
        // Appel de la vue
        require_once __DIR__ . '/../../Views/adminView.php';
    }

}
