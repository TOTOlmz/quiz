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
    protected array $suspendedUsers = [];    // Pour avoir un suivi des utilisateurs suspendus
    protected array $nbOfQuizzes = [];         // Pour avoir le nombre de quizzes actuellement dans la base
    protected array $nbOfPlayers = [];         // Pour avoir le nombre de joueurs inscrits

    public function adminArea() {

        // Vérification des accès
        $accessController = new AccessController();
        $accessController->checkAccess('ADMIN');

        // gestion du formulaire de suspension d'un utilisateur
        if (isset($_POST['suspend-user'])) {
            $userId = isset($_POST['suspension-id']) ? intval($_POST['suspension-id']) : 0;
            $userPseudo = isset($_POST['suspension-pseudo']) ? trim($_POST['suspension-pseudo']) : '';
            
            if (intval($userId) === 1) {
                $this->errors[] = 'Voyons mon cher, soyez raisonnable. Ne vous suspendez pas, prenez plutôt des vacances';
            }
            if (intval($userId) === 0 || strlen($userPseudo) > 0) {
                $this->errors[] = 'Merci de renseigner un champ au minimum';
            }
            
            if (empty($this->errors) && (intval($userId) !== 0 || strlen($userPseudo) > 0)) {
                if ($userId) {
                    $idResult = AdminModel::suspendUserById($userId);
                }
                if ($userPseudo) {

                    $pseudoResult = AdminModel::suspendUserByPseudo($userPseudo);
                }
                if (isset($idResult) || isset($pseudoResult)) {
                    $this->success = 'Le joueur a été suspendu avec succès.';
                } else {
                    $this->errors[] = 'Erreur lors de la suspension du joueur. Veuillez vérifier l\'ID.';
                }
            }
        }
        // gestion du formulaire d'annulation de suspension d'un utilisateur
        if (isset($_POST['unsuspend-user'])) {
            $userId = trim($_POST['user-id']);
            if (intval($userId) !== 0) {
                $result = AdminModel::unsuspendUser($userId);
                if ($result) {
                    $this->success = 'Le joueur a été réabilité avec succès.';
                } else {
                    $this->errors[] = 'Erreur lors de la réabilitation du joueur. Veuillez vérifier l\'ID.';
                }
            } else {
                $this->errors[] = 'L\'ID du joueur doit être valide.';
            }
        }

        // Gestion du formulaire d'annulation d'un signalement
        if (isset($_POST['undo-report'])) {
            $quizId = trim($_POST['quiz-id']);
            if (intval($quizId) !== 0) {
                $result = AdminModel::undoReport($quizId);
                if ($result) {
                    $this->success = 'Le signalement a été annulé avec succès.';
                } else {
                    $this->errors[] = 'Erreur lors de l\'annulation du signalement. Veuillez vérifier l\'ID.';
                }
            } else {
                $this->errors[] = 'L\'ID du quiz doit être valide.';
            }
        }
        // Gestion du formulaire de suppression d'un quiz
        if (isset($_POST['delete-quiz'])) {
            $quizId = trim($_POST['quiz-id']);
            if (intval($quizId) !== 0) {
                $result = AdminModel::deleteQuiz($quizId);
                if ($result) {
                    $this->success = 'Le quiz a été supprimé avec succès.';
                } else {
                    $this->errors[] = 'Erreur lors de la suppression du quiz. Veuillez vérifier l\'ID.';
                }
            } else {
                $this->errors[] = 'L\'ID du quiz doit être valide.';
            }
        }


        $this->currentReports = AdminModel::getReports();
        foreach ($this->currentReports as &$report) {
            $report['reporter_pseudo'] = isset($report['reporter_pseudo']) ? htmlspecialchars($report['reporter_pseudo']) : 'Utilisateur non connecté';
            $report['reporter_email'] = isset($report['reporter_email']) ? htmlspecialchars($report['reporter_email']) : 'Utilisateur non connecté';
        }
        $this->suspendedUsers = AdminModel::getSuspendedUsers();
        $this->nbOfQuizzes = AdminModel::getQuizzesDate();
        $this->nbOfPlayers = AdminModel::getPlayersDate();


        // Simplification des appels de variables pour la vue
        $reports = $this->currentReports;
        $suspendedUsers = $this->suspendedUsers;
        $nbQuizzes = $this->nbOfQuizzes;
        $nbPlayers = $this->nbOfPlayers;
        $errors = $this->errors;
        $success = $this->success;
        // Appel de la vue
        require_once __DIR__ . '/../../Views/adminView.php';
    }

}
