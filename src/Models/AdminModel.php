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

    public static function undoReport(int $quizId): ?int {
        $sql = "UPDATE quizzes SET is_reported = 0 WHERE id = :id LIMIT 1";
        $stmt = self::executeQuery($sql, ['id' => $quizId]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : null;
    }

    public static function getQuizziesDate(): array {
        $sql = "SELECT created_at FROM users";
        $stmt = self::fetchAll($sql);
        return $stmt ?: [];
    }

    public static function getPlayersDate(): array {
        $sql = "SELECT created_at FROM users";
        $stmt = self::fetchAll($sql);
        return $stmt ?: [];
    }

}
    