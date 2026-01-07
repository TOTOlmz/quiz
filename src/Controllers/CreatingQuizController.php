<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur gérant la création d'un quiz
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Controllers;

use App\Models\QuizModel;

class CreatingQuizController extends BaseController {

    protected array $errors = [];
    protected string $success = '';
    protected array $currentQuiz = [];
    protected int $nbOfQuestions = 0;

    public function creatingQuizArea() {

        // Si le formulaire de création de quiz est soumis
        if (isset($_POST['create_quiz'])) {
            $this->createQuiz($_POST);
        }
        // Si le formulaire de création de question est soumis
        if (isset($_POST['create_question']) && isset($_GET['id'])) {
            $_POST['quiz_id'] = $_GET['id'];
            $this->createQuestion($_POST);
        }
        // Si un identifiant de quiz est fourni en URL
        if (isset($_GET['id'])) {
            $intId = intval($_GET['id']);
            $getQuiz = QuizModel::getQuizById($intId);
    
            if ($getQuiz) {
                $this->currentQuiz = $getQuiz;
                $this->currentQuiz['questions'] = QuizModel::getQuestionsByQuizId($intId);
                $this->nbOfQuestions = count($this->currentQuiz['questions']);
            } else {
                $this->errors[] = 'Quiz introuvable';
            }
        }

        // Appel de la vue
        $errors = $this->errors;
        $success = $this->success;
        $nbOfQuestions = $this->nbOfQuestions;
        $quiz = $this->currentQuiz;
        require_once __DIR__ . '/../Views/creatingQuizView.php';
    }





    public function createQuiz($data) {
        // Logique pour créer un quiz
        if (empty($data['name'])) {
            $this->errors[] = 'Merci de renseigner un nom pour votre quiz';
        }
        if (strlen($data['description']) > 50) {
            $this->errors[] = 'La déscription ne doit pas dépasser 50 caractères';
        }
        if (empty($data['color'])) {
            $data['color'] = '#000000';
        }
        if (empty($data['category'])) {
            $data['category'] = 'Autre';
        }
        if (empty($_SESSION['user_id'])) {
            $this->errors[] = 'Seules les personnes connectées peuvent créer des quizzes';
        }

        if (empty($this->errors)) {
            $quizId = QuizModel::createQuiz([
                'name' => $data['name'],
                'description' => $data['description'] ?? '',
                'color' => $data['color'],
                'category' => $data['category'] ?? 'Autre',
                'user_id' => $_SESSION['user_id']
            ]);

            if ($quizId) {
                $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                header("Location: $path?id=$quizId");
                $this->success = 'Quiz créé avec succès';
            } else {
                $this->errors[] = 'Erreur lors de la création du quiz';
            }
        }

    }

    public function createQuestion($data) {

        $quizId = intval($data['quiz_id']);
        $question = trim($data['question']);
        $correctAnswer = $data['correct_answer'];
        $answerA = trim($data['answer_A']);
        $answerB = trim($data['answer_B']);
        $answerC = trim($data['answer_C']);
        $answerD = trim($data['answer_D']);
        $allAnswers = [$answerA, $answerB, $answerC, $answerD];


        // Logique pour créer une question
        if (empty($question)) {
            $this->errors[] = 'Merci de renseigner une question';
        }

        // On vérifie que des réponses ont été soumises
        if (empty($answerA) && empty($answerB) && empty($answerC) && empty($answerD)) {
            $this->errors[] = 'Merci de renseigner des réponses';
        }

        if (empty($this->errors)) {
            // On supprime les réponses vides

            // On filtre toutes les réponses avec une boucle foreach
            $answers = [];
            foreach ($allAnswers as $a) {
                if (!empty($a)) {
                    $answers[] = $a;
                }
            }

            // On met à jour le nombre de réponses et on s'assure d'en avoir au moins deux
            $nbOfAnswers = count($answers);
            if ($nbOfAnswers < 2) {
                $this->errors[] = 'Merci de renseigner au moins deux réponses';
            }

        }


        if (empty($this->errors)) {
            $questionId = QuizModel::createQuestion([
                'quiz_id' => $quizId,
                'question' => $question,
                'nb_of_answers' => $nbOfAnswers,
                'correct_answer' => $correctAnswer,
                'answer_A' => $answers[0],
                'answer_B' => $answers[1] ?? '',
                'answer_C' => $answers[2] ?? '',
                'answer_D' => $answers[3] ?? ''
            ]);

            if ($questionId) {
                $this->success = 'Question créée avec succès';
            } else {
                $this->errors[] = 'Erreur lors de la création de la question';
            }
        }
        
    }

}