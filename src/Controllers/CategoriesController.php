<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur gérant l'affichage des catégories
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\QuizModel;

class CategoriesController extends BaseController {

    protected array $errors = [];
    protected string $success = '';
    protected array $categories = [];
    protected array $quizzes = [];

    public function categoriesArea() {

        // on récupère un tableau contenant les catégories présentes dans la BDD
        $this->categories = QuizModel::getAllCategories('quizzes', 'category');


        // Si une catégorie est choisie, on récupère tous ses quizzes pour les afficher
        if (isset($_POST['category'])) {
            $category = htmlspecialchars($_POST['category']);
            $this->quizzes = QuizModel::getQuizzesByCategory($category);

            if (empty($this->errors)) {
                foreach ($this->quizzes as &$quiz) {
                    $quiz['picture'] = QuizModel::getUserPictureFromQuiz((int)$quiz['id']);
                }
                unset($quiz);
            }
        }

        

        // on simplifie les variables pour la vue
        $errors = $this->errors;
        $success = $this->success;
        $categories = $this->categories;
        $quizzes = $this->quizzes;
        // Appel de la vue
        require_once ROOT_PATH . '/src/Views/categoriesView.php';
    }
}
