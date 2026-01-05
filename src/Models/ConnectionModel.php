<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Classe gérant les connexions utilisateurs
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Models;

use App\Models\BaseModel;

class ConnectionModel extends BaseModel {
    
    // Fonction permettant de récupérer les informations utilisateur dans la bdd
    public static function connection($email, $password) {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = self::fetchOne($sql, ['email' => $email]);
        $user = $stmt;
        // On vérifie la correspondance du mot de passe
        if ($user && password_verify($password, $user['password'])) {  
            return $user;
        }
        return false;
    }
}

?>