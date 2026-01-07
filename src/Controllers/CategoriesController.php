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
    protected int $nbOfQuestions = 0;
    protected array $currentQuiz = [];

    public function categoriesArea() {

        // on récupère un tableau contenant les catégories présentes dans la BDD
        $categories = QuizModel::getAllCategories('quizzes', 'category');
        print_r($categories);

        // on simplifie les variables pour la vue
        $errors = $this->errors;
        $success = $this->success;
        // Appel de la vue
        require_once __DIR__ . '/../views/categoriesView.php';
    }
}
