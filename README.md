▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲ <br>
WebApp proposant des quizzes <br>
▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲ <br>


les visiteurs peuvent y jouer <br>
les utilisateurs peuvent y jouer et en créer <br>
l'administrateur peut en créer et suspendre des joueurs si leurs quizzes sont problématiques (possibilité de signaler un quiz) <br>


▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲ <br>
Développé en PHP et JS <br>
▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲ <br>

<h3> Strucutre du projet : </h3>
    doc => Ensemble des fichiers de documentation de l'application
    public_html => comporte le fichier index.php, les styles, le .htaccess ainsi que les assets (images, scripts, logo...) <br>
    src (comporte le mvc) <br>
    |-- Controllers (Tous les controlleurs faisant le lien entre les vues et les modèles) <br>
    |-- models (Tous les modèles échangeant avec la base de données) <br>
    |-- views (Toutes les vues permettant l'affichage coté client) <br> 
    |-- config (contenant les variables d'environnement) <br>
    vendor (comporte les extensions utilisées et les fichiers composers nécessaires) <br>
    Le readme et une copie de l'extrait de la bdd.sql


<h3> Prérequis pour une utilisation via XAMPP</h3>
Installer Xampp et copier coller le code (dossier quiz) directement dans le dossier htdocs de xampp

commandes à executer avant de lancer le projet : 
composer require symfony/var-dumper
composer require symfony/mailer

<h3> Prérequis pour une utilisation via DOCKER</h3>
Ouvrir un terminal dans le dossier quiz.
executer la commande : docker compose build
executer la commande : docker compose up -d

commandes à executer avant de lancer le projet : 
composer require symfony/var-dumper
composer require symfony/mailer



Contact -theo.lemazurier@gmail.com