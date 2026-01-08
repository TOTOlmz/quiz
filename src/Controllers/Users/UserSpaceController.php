<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur gérant l'espace utilisateur
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Controllers\AccessController;
use App\Models\UserModel;
use App\Models\QuizModel;

class UserSpaceController extends BaseController {

    protected array $errors = [];
    protected string $success = '';

    protected array $user = [];
    protected string $picturePath = ROOT_PATH . '/public_html/assets/images/users/';
    protected ?array $quizzes = [];

    public function userSpace() {

        // Vérification des accès
        $accessController = new AccessController();
        $accessController->checkAccess('USER');

        // Récupération des infos de l'utilisateur
        $userId = intval($_SESSION['user_id'] ?? 0);
        if ($userId == 0) {
            $this->errors[] = 'Identifiant utilisateur invalide.';
        }

        // Si le formulaire est soumis, on appelle la fonction d'upload
        if (isset($_FILES['picture']) && $userId != 0) {
            
            $picture = $_FILES['picture'];
            $result = $this->updatePicture($userId, $picture);
            if ($result['errors']) {
                $this->errors = array_merge($this->errors, $result['errors']);
            }
            if ($result['success']) {
                $this->success = 'Photo de profil mise à jour avec succès.';
            }
        }

        // Si tout s'est bien passé on récupère les infos de l'utilisateur
        if (empty($this->errors)) {
            $this->user = UserModel::getUserById($userId);
        }
        if (!$this->user) {
            $this->errors[] = 'Utilisateur non trouvé.';
        }

        // Si tout s'est bien passé on récupère les infos de l'utilisateur
        if (empty($this->errors)) {
            $this->quizzes = QuizModel::getQuizByUserId($userId);
        }
        if (!$this->quizzes) {
            $this->errors[] = 'Aucun quiz trouvé.';
        }

        // Simplification de l'appel des variables 
        $errors = $this->errors;
        $success = $this->success;

        $user = $this->user;
        $quizzes = $this->quizzes;
        // Appel de la vue
        require_once __DIR__ . '/../../Views/userSpaceView.php';
    }

    // Fonction mettant à jour la photo de profil
    protected function updatePicture($userId, $picture): ?array {

        $errors = [];

        // Si on a un fichier uploadé correctement, on lance la mise à jour de la photo
        if ($picture['error'] !== UPLOAD_ERR_OK) {

            $errors[] = 'Erreur lors de l\'upload du fichier.';
            return ['errors' => $errors, 'success' => false];

        } else {


            // On récupère le pseudo de l'utilisateur
            $user = UserModel::getUserById($userId);
            $userPseudo = $user['pseudo'];

            $uploadDir = $this->picturePath;     // On définit le dossier de destination
            $tmpName = $picture['tmp_name'];                   // évite le problème de mise en cache
            $pictureName = basename($picture['name']);            // On récupère le nom du fichier, puis l'extension
            $pictureExt = strtolower(pathinfo($pictureName, PATHINFO_EXTENSION));
            $success = false;

            // On vérifie que c’est bien une image
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            if (!in_array($pictureExt, $allowed)) {
                $errors[] = 'Format de fichier non autorisé.';
            }

            // On renomme le fichier et le chemin de stockage
            $newName = strtolower($userPseudo . '.' . $pictureExt);
            $destination = $uploadDir . $newName;

            // On essaye de déposer le fichier dans le dossier
            $pictureUpload = move_uploaded_file($tmpName, $destination);

            // Si ca réussit :
            if ($pictureUpload) {
                // Et si le nom est toujours "default.png"
                if ($user['picture'] !== $newName) {
                    // On met à jour le nom du fichier dans la BDD
                    $updateStatus = UserModel::setUserPicture($userId, $newName);

                    if ($updateStatus) {
                        $success = true;
                    } else {
                        $errors[] = 'Erreur lors de la mise à jour en base de données.';
                    }

                } else {
                    $success = true; // Pas besoin de mettre à jour le nom du fichier en BDD
                }

            } else {
                $errors[] = 'Erreur lors du dépôt du fichier.';
                $success = false;
            }

            return ['errors' => $errors, 'success' => $success];

        }
    }
}

