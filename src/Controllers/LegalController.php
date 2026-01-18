<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Contrôleur gérant l'affichage des mentions légales
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */

namespace App\Controllers;

class LegalController extends BaseController {

    protected array $errors = [];
    protected string $success = '';

    public function legalArea() {

    

        if (isset($_POST['name'])) {

            $name = trim(htmlspecialchars($_POST['name']));
            if (empty($name)) {
                $this->errors[] = 'Nom manquant.';
            }

            if (isset($_POST['email'])) {
                $email = trim(htmlspecialchars($_POST['email']));
            } else {
                $this->errors[] = 'Email manquant.';
            }

            if (isset($_POST['message'])) {
                $message = trim(htmlspecialchars($_POST['message']));
            } else {
                $this->errors[] = 'Message manquant.';
            }


            // Si tous les champs sont renseignés, on envoie le mail via symfony/mailer
            if (empty($this->errors)) {
                $this->mailZequiz($name, $email, $message);
            }
        }
        
        $errors = $this->errors;
        $success = $this->success;
        // Appel de la vue
        require_once ROOT_PATH . '/src/Views/legalView.php';
    }
}