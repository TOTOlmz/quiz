<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Configuration des variables d'environnement
    Fichier de configuration de la base de données
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */

// Configuration de la base de données
$_ENV['DB_HOST'] = 'localhost';
$_ENV['DB_NAME'] = 'quiz';
$_ENV['DB_USER'] = 'root';
$_ENV['DB_PASS'] = '';
$_ENV['DB_PORT'] = '3306';

// Options de connexion PDO (optionnel, pour les cas avancés)
$_ENV['DB_CHARSET'] = 'utf8mb4';
$_ENV['DB_TIMEZONE'] = 'Europe/Paris';

// Configuration SMTP Hostinger
$_ENV['SMTP_HOST'] = 'smtp.hostinger.com';
$_ENV['SMTP_PORT'] = '465'; //587
$_ENV['SMTP_USER'] = 'contact@zequiz.net'; 
$_ENV['SMTP_PASS'] = 'SuperMDP8!';
$_ENV['SMTP_FROM'] = 'contact@zequiz.net';