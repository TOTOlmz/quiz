<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Classe gérant les interactions avec la table users
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Models;

use App\Models\BaseModel;

class UserModel extends BaseModel {

    // Fonction récupérant un utilisateur par son ID
    public static function getUserById(int $id): ?array {
        $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $stmt = self::fetchOne($sql, ['id' => $id]);
        return $stmt ?: null;
    }

    public static function emailExists(string $email): bool {
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
        $count = self::fetchColumn($sql, ['email' => $email]);
        return $count > 0;
    }

    public static function pseudoExists(string $pseudo): bool {
        $sql = 'SELECT COUNT(*) FROM users WHERE pseudo = :pseudo';
        $count = self::fetchColumn($sql, ['pseudo' => $pseudo]);
        return $count > 0;
    }

    public static function createUser(string $pseudo, string $email, string $password, string $role): ?int {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = 'INSERT INTO users (pseudo, email, password, role, created_at) VALUES (:pseudo, :email, :password, :role, NOW())';
        $params = [
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role
        ];
        $userId = self::lastInsert($sql, $params);
        return $userId ? (int)$userId : null;
    }
}