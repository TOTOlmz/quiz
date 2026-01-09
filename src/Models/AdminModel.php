<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Classe gérant les infos de l'administrateur
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Models;

use App\Models\BaseModel;

class AdminModel extends BaseModel {

    public static function getReports(): array {
        $sql = "SELECT q.id, q.name, q.description, q.user_id, q.created_at, u.pseudo, u.email FROM quizzes q JOIN users u ON q.user_id = u.id WHERE is_reported = 1";
        $stmt = self::fetchAll($sql);
        return $stmt ?: [];
    }

    public static function getNumberOfQuizzes(): int {
        $sql = "SELECT COUNT(*) FROM quizzes";
        $stmt = self::count($sql);
        return $stmt ? (int)$stmt : 0;
    }

    public static function getNumberOfPlayers(): int {
        $sql = "SELECT COUNT(*) FROM users";
        $stmt = self::count($sql);
        return $stmt ? (int)$stmt : 0;
    }

}
    