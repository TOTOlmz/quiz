<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Classe gérant les quizzes
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Models;

use App\Models\BaseModel;

class QuizModel extends BaseModel {

    public static function getQuizById(int $id): ?array {
        /*$sql = "SELECT id, name, description, created_at FROM quizzes WHERE id = :id";*/
        $sql = "SELECT q.id, q.name, q.description, q.created_at, u.id AS user_id, u.pseudo 
                FROM quizzes q JOIN users u ON q.user_id = u.id 
                WHERE q.id = :id";
        $stmt = self::fetchOne($sql, ['id' => $id]);
        return $stmt ?: null;
    }

    public static function getQuizByUserId(int $id): ?array {
        $sql = "SELECT * FROM quizzes WHERE user_id = :id";
        $stmt = self::fetchAll($sql, ['id' => $id]);
        return $stmt ?: null;
    }

    public static function getAllQuizzes(): ?array {
        $sql = "SELECT * FROM quizzes";
        $stmt = self::fetchAll($sql);
        return $stmt ?: null;
    }

    public static function getUserPictureFromQuiz(int $quizId): ?string {
        $sql = "SELECT picture FROM users WHERE id = (SELECT user_id FROM quizzes WHERE id = :quizId)";
        $stmt = self::fetchOne($sql, ['quizId' => $quizId]);
        return $stmt['picture'] ?? null;
    }

    public static function getQuizzesByCategory(string $category): ?array {
        $sql = "SELECT * FROM quizzes WHERE category = :category";
        $stmt = self::fetchAll($sql, ['category' => $category]);
        return $stmt ?: null;
    }

    public static function getAllCategories(): ?array {
        $sql = "SELECT DISTINCT category FROM quizzes WHERE category IS NOT NULL ORDER BY category";
        $stmt = self::fetchAllColumn($sql);
        return $stmt ?: null;
    }

    public static function createQuiz(array $params): ?int {
        $sql = "INSERT INTO quizzes (name, description, color, category, user_id, created_at) VALUES (:name, :description, :color, :category, :user_id, NOW())";
        $stmt = self::lastInsert($sql, $params);
        return $stmt ?: null;
    }

    public static function getQuestionsByQuizId(int $quizId): array {
        $sql = "SELECT * FROM questions WHERE quiz_id = :quiz_id";
        $stmt = self::fetchAll($sql, ['quiz_id' => $quizId]);
        return $stmt;
    }

    
    public static function createQuestion(array $params): ?int {
        $sql = "INSERT INTO questions (quiz_id, question, nb_of_answers, correct_answer, answer_A, answer_B, answer_C, answer_D) 
                VALUES (:quiz_id, :question, :nb_of_answers, :correct_answer, :answer_A, :answer_B, :answer_C, :answer_D)";
        $stmt = self::lastInsert($sql, $params);
        return $stmt ?: null;
    }

    public static function updatePlayed($quizId): ?int {
        $sql = "UPDATE quizzes SET played_nb = played_nb + 1 WHERE id = :id LIMIT 1";
        $stmt = self::executeQuery($sql, ['id' => $quizId]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : null;
    }

    public static function reportQuiz($quizId): ?int {
        $sql = "UPDATE quizzes SET is_reported = 1 WHERE id = :id LIMIT 1";
        $stmt = self::executeQuery($sql, ['id' => $quizId]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : null;
    }
}