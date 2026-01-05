<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Classe gérant les quizzes
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Models;

use App\Models\BaseModel;

class QuizModel extends BaseModel {

    public static function getQuizById(int $id): ?array {
        /*$sql = "SELECT id, name, description, created_at FROM quizzes WHERE id = :id";*/
        $sql = "SELECT q.id, q.name, q.description, q.created_at, u.pseudo 
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



    public static function createQuiz(array $params): ?int {
        $sql = "INSERT INTO quizzes (name, description, user_id, created_at) VALUES (:name, :description, :user_id, NOW())";
        $stmt = self::lastInsert($sql, $params);
        return $stmt ?: null;
    }

    public static function getQuestionsByQuizId(int $quizId): array {
        $sql = "SELECT * FROM questions WHERE quiz_id = :quiz_id";
        $stmt = self::fetchAll($sql, ['quiz_id' => $quizId]);
        return $stmt;
    }

    
    public static function createQuestion(array $params): ?int {
        $sql = "INSERT INTO questions (quiz_id, question, nb_of_answers, answer_A, answer_B, answer_C, answer_D) 
                VALUES (:quiz_id, :question, :nb_of_answers, :answer_A, :answer_B, :answer_C, :answer_D)";
        $stmt = self::lastInsert($sql, $params);
        return $stmt ?: null;
    }
}