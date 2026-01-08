<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Contrôleur gérant l'affichage de l'accueil
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */

namespace App\Controllers;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;


class LegalController {

    protected array $errors = [];
    protected string $success = '';
    protected MailerInterface $mailer;

    // Fonction permettant d'initialiser le mailer avec la configuration SMTP
    public function __construct() {
        
        // Configuration du serveur SMTP Hostinger avec les variables d'environnement
        $dsn = sprintf(
            'smtp://%s:%s@%s:%s',
            urlencode($_ENV['SMTP_USER']),
            urlencode($_ENV['SMTP_PASS']),
            $_ENV['SMTP_HOST'],
            $_ENV['SMTP_PORT']
        );
        
        $transport = Transport::fromDsn($dsn);
        $this->mailer = new Mailer($transport);
    }

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
                $this->sendEmail($name, $email, $message);
            }
        }
        
        $errors = $this->errors;
        $success = $this->success;
        // Appel de la vue
        require_once ROOT_PATH . '/src/Views/legalView.php';
    }


    // Fonction d'envoi d'email via symfony/mailer
    protected function sendEmail($name, $email, $messageContent) {
        $emailMessage = (new Email())
            ->from($_ENV['SMTP_FROM']) // Utilise l'email configuré dans variables.php
            ->to($_ENV['SMTP_FROM'])
            ->subject('Demande de contact')
            ->text("Nom: $name\nEmail: $email\nMessage: $messageContent");

        try {
            $this->mailer->send($emailMessage);
            $this->success = 'Votre message a été envoyé avec succès !';
        } catch (\Exception $e) {
            $this->errors[] = 'Erreur lors de l\'envoi du message : ' . $e->getMessage();
        }
    }
}