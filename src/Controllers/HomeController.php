<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Contrôleur gérant l'affichage de l'accueil
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */

namespace App\Controllers;

use App\Models\QuizModel;


class HomeController {

    protected array $errors = [];
    protected string $success = '';
    protected array $quizzes = [];
    protected int $randomQuizId = 0;


    public function homeArea() {
        

        // on récupère l'ensemble des quizzes présents dans la BDD
        $this->quizzes = QuizModel::getAllQuizzes();

        if (! $this->quizzes) {
            $this->errors[] = 'Aucun quiz disponible pour le moment.';
        }

        if (empty($this->errors)) {
            foreach ($this->quizzes as &$quiz) {
                $quiz['picture'] = QuizModel::getUserPictureFromQuiz((int)$quiz['id']);
            }
        }


        // On trie les quizzes du plus récent au plus ancien
        $recentQuizzes = $this->quizzes;
        usort($recentQuizzes, function($a, $b) { return strtotime($b['created_at']) - strtotime($a['created_at']); });
        array_splice($recentQuizzes, 5);
        // On trie les quizzes par popularité (nombre de fois joués)
        $popularQuizzes = $this->quizzes;
        usort($popularQuizzes, function($a, $b) { return $b['played_nb'] - $a['played_nb']; });
        array_splice($popularQuizzes, 5);

        // On récupère un nombre aléatoir parmi les quizzes pour le bouton de lancement aléatoire
        if (!empty($this->quizzes)) {
            $randomQuiz = $this->quizzes[array_rand($this->quizzes, 1)];
            $this->randomQuizId = $randomQuiz['id'];
        }
        
        $errors = $this->errors;
        $success = $this->success;
        $randomQuizId = $this->randomQuizId;

        // Appel de la vue
        require_once __DIR__ . '/../views/homeView.php';
    }
}