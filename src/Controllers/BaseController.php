<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur de base (gestion des mails)
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Controllers;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;


class BaseController {

    //(!A FAIRE!) corriger le fichier legalcontroller.php pour virer le mailer

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