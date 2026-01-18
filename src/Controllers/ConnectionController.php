<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur gérant la connexion d'un utilisateur
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Controllers;

use App\Models\ConnectionModel;

class ConnectionController {

    protected array $errors = [];
    protected string $success = '';
    
    public function connection() {
        
        
        if (isset($_POST['login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];



            if (!$email || !$password) {
                $this->errors[] = 'Merci de renseigner tous les champs';
            }
            
            
            // Si pas d'erreurs, on connecte l'utilisateur
            if (empty($this->errors)) {
                
                $user = ConnectionModel::connection($email, $password);
                if (empty($user)) {  // Si user n'est pas trouvé :
                    $this->errors[] = 'Ces identifiants ne correspondent à aucun compte';
                }

                if (empty($this->errors)) {
                    // On démarre la session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_role'] = $user['role'];

                    // On gère la redirection
                    if ($user['role'] === 'ADMIN') {
                        header ('Location: ./espace-admin');
                        exit();
                    } else {
                        header ('Location: ./mon-espace');
                        exit();
                    }
                }
            }
        }        
    }

    // Fonction permettant la déconnexion
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: ./');
        exit();
    }

    public function connectionPage() {
        $errors = $this->errors;
        $success = $this->success;
        require_once ROOT_PATH . '/src/Views/connectionView.php';
    }
    public function registrationPage() {
        $errors = $this->errors;
        $success = $this->success;
        require_once ROOT_PATH . '/src/Views/registrationView.php';
    }

}