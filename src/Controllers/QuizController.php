<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur gérant l'affichage d'un quiz
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\QuizModel;
use App\Models\ReportModel;

class QuizController extends BaseController {

    protected array $errors = [];
    protected string $success = '';
    protected int $nbOfQuestions = 0;
    protected array $currentQuiz = [];
    protected string $quizLink = '';

    public function quizArea() {

        // Si un id de quiz est passé dans l'URL
        if (isset($_GET['id'])) {
            $intId = intval($_GET['id']);
            // On récupère le quiz
            $this->quizLink = $_SERVER['REQUEST_URI'];
            $getQuiz = QuizModel::getQuizById($intId);
            if (!$getQuiz) {
                $this->errors[] = 'Quiz introuvable';
            }
            
            if (empty($this->errors)) {
                // Puis on récupère les questions du quiz
                $this->currentQuiz = $getQuiz;
                $this->currentQuiz['questions'] = QuizModel::getQuestionsByQuizId($intId);
                $this->nbOfQuestions = count($this->currentQuiz['questions']);

                
                // Pour chaque question :
                foreach ($this->currentQuiz['questions'] as &$question) {
                    // On stocke la bonne réponse dans une clef "correct_answers"
                    $question['correct_answer'] = $question['answer_A'];
                    // On mélange les réponses via la fonction shuffle
                    $answers = [ $question['answer_A'], $question['answer_B'], $question['answer_C'], $question['answer_D'] ];
                    shuffle($answers);
                    $question['answers'] = $answers;
                    unset($question['answer_A'], $question['answer_B'], $question['answer_C'], $question['answer_D']);
                }
                unset($question); // on casse la référence au dernier élément
                
            }

        }

        // Gestion du formulaire de signalement de quiz
        if (isset($_POST['report-title'])) {
            $quizId = intval($_POST['quiz-id']);
            $creatorId = intval($_POST['creator-id']);
            $reporterId = isset($_POST['reporter-id']) ? intval($_POST['reporter-id']) : 0;
            $title = htmlspecialchars(trim($_POST['report-title']));
            $comment = htmlspecialchars(trim($_POST['comment']));

            $reportParams = [
                'quiz_id' => $quizId,
                'creator_id' => $creatorId,
                'reporter_id' => $reporterId,
                'title' => $title,
                'comment' => $comment
            ];

            $reportCreated = ReportModel::createReport($reportParams);
            if (!$reportCreated) {
                $this->errors[] = 'Erreur lors de l\'envoi du signalement.';
            } else {
                $this->success = 'Signalement envoyé avec succès.';
            }

            $quizReported = QuizModel::reportQuiz($quizId);
            if (!$quizReported) {
                $this->errors[] = 'Erreur lors du signalement.';
            } else {
                $this->success = 'Signalement envoyé.';
            }
        }

        // Envoi des résultats via un fetch AJAX
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
        $quizLink = $this->quizLink;
        require_once ROOT_PATH . '/src/Views/quizView.php';
    }

}