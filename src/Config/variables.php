<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Configuration des variables d'environnement
    Fichier de configuration de la base de données
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */

// Configuration de la base de données
// On réaffecte les variables de docker pour garder le même format dans le code
$_ENV['DB_HOST'] = getenv('DB_HOST');
$_ENV['DB_NAME'] = getenv('DB_NAME');
$_ENV['DB_USER'] = getenv('DB_USER');
$_ENV['DB_PASS'] = getenv('DB_PASS');
$_ENV['DB_PORT'] = getenv('DB_PORT');

$_ENV['DB_CHARSET'] = getenv('DB_CHARSET');
$_ENV['DB_TIMEZONE'] = getenv('DB_TIMEZONE');

$_ENV['SMTP_HOST'] = getenv('SMTP_HOST');
$_ENV['SMTP_PORT'] = getenv('SMTP_PORT');
$_ENV['SMTP_USER'] = getenv('SMTP_USER');
$_ENV['SMTP_PASS'] = getenv('SMTP_PASS');
$_ENV['SMTP_FROM'] = getenv('SMTP_FROM');