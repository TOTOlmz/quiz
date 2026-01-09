<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Classe gérant les infos de l'administrateur
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Models;

use App\Models\BaseModel;

class AdminModel extends BaseModel {

    // Récupération des signalements
    public static function getReports(): array {
        $sql = "SELECT r.id, r.quiz_id, r.creator_id, r.reporter_id, r.title, r.comment, r.created_at,
        c.pseudo AS creator_pseudo, c.email AS creator_email, u.pseudo AS reporter_pseudo, u.email AS reporter_email,
        q.name, q.description, q.color 
        FROM reports r JOIN quizzes q ON r.quiz_id = q.id LEFT JOIN users u ON r.reporter_id = u.id LEFT JOIN users c ON r.creator_id = c.id";
        $stmt = self::fetchAll($sql);
        return $stmt ?: [];
    }

    // Annulation d'un signalement
    public static function undoReport(int $quizId): ?int {
        $sql = "UPDATE quizzes SET is_reported = 0 WHERE id = :id LIMIT 1";
        $stmt = self::executeQuery($sql, ['id' => $quizId]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : null;
    }
    // Cloture d'un signalement
    public static function closeReport(int $quizId): ?int {
        $sql = "UPDATE quizzes SET is_closed = 1 WHERE id = :id LIMIT 1";
        $stmt = self::executeQuery($sql, ['id' => $quizId]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : null;
    }

    // Suppression d'un quiz
    public static function deleteQuiz(int $quizId): ?int {
        $sql = "DELETE FROM quizzes WHERE id = :id LIMIT 1";
        $stmt = self::executeQuery($sql, ['id' => $quizId]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : null;
    }

    // Récupération des utilisateurs suspendus
    public static function getSuspendedUsers(): array {
        $sql = "SELECT id, pseudo, email FROM users WHERE is_suspended = 1";
        $stmt = self::fetchAll($sql);
        return $stmt ?: [];
    }

    // Suspendre un utilisateur par son ID
    public static function suspendUserById(int $userId): int {
        $sql = "UPDATE users SET is_suspended = 1 WHERE id = :id LIMIT 1";
        $stmt = self::executeQuery($sql, ['id' => $userId]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : 0;
    }
    // Suspendre un utilisateur par son Pseudo
    public static function suspendUserByPseudo(string $userPseudo): int {
        $sql = "UPDATE users SET is_suspended = 1 WHERE pseudo = :pseudo LIMIT 1";
        $stmt = self::executeQuery($sql, ['pseudo' => $userPseudo]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : 0;
    }

    // Suspendre un utilisateur par son Pseudo
    public static function unsuspendUser(int $userId): int {
        $sql = "UPDATE users SET is_suspended = 0 WHERE id = :id LIMIT 1";
        $stmt = self::executeQuery($sql, ['id' => $userId]);
        return $stmt->rowCount() > 0 ? $stmt->rowCount() : 0;
    }


    // Récupère tous les quizzes par date de création
    public static function getQuizzesDate(): ?array {
        $sql = "SELECT created_at FROM quizzes";
        $stmt = self::fetchAllColumn($sql);
        return $stmt ?: [];
    }

    // Récupère tous les joueurs par date d'inscription
    public static function getPlayersDate(): ?array {
        $sql = "SELECT created_at FROM users";
        $stmt = self::fetchAllColumn($sql);
        return $stmt ?: [];
    }

}
    