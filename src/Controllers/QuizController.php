<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur gérant la création d'un quiz
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\QuizModel;

class QuizController extends BaseController {

    protected array $errors = [];
    protected string $success = '';
    protected int $nbOfQuestions = 0;
    protected array $currentQuiz = [];

    public function quizArea() {

        // Si un id de quiz est passé dans l'URL
        if (isset($_GET['id'])) {
            $intId = intval($_GET['id']);
            // On récupère le quiz
            $getQuiz = QuizModel::getQuizById($intId);
            if (!$getQuiz) {
                $this->errors[] = 'Quiz introuvable';
            }
            
            if (empty($this->errors)) {
                // Puis on récupère les questions du quiz
                $this->currentQuiz = $getQuiz;
                $this->currentQuiz['questions'] = QuizModel::getQuestionsByQuizId($intId);
                $this->nbOfQuestions = count($this->currentQuiz['questions']);
            }

        }

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            // Traitement de la soumission du score
            $data = json_decode(file_get_contents('php://input'), true);
            $userId = isset($data['user']) ? intval($data['user']) : 0;
            $quizId = intval($data['quiz']);
            $score = intval($data['score']);

            if ($userId > 0) {
                $userScore = UserModel::updateScore($score, $userId);
                if (!$userScore) {
                    $this->errors[] = 'Erreur lors de la mise à jour du score.';
                } else {
                    $this->success = 'Score mis à jour avec succès.';
                }
            }

            $quizPlayed = QuizModel::updatePlayed($quizId);
            
            

            header('Content-Type: application/json');
            echo json_encode([
                'success' => $this->success, 
                'errors' => $this->errors
            ]);
            /* (!A FAIRE!) gérer l'erreur (non bloquante) du json invalide */
            exit;
        }


        // Appel de la vue
        $errors = $this->errors;
        $success = $this->success;
        $quiz = $this->currentQuiz;
        require_once ROOT_PATH . '/src/Views/quizView.php';
    }

}