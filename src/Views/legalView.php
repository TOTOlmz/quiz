<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Controlleur gérant la vue des mentions légales
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
?>

<div class="centered-div">
    <?php require_once __DIR__ . '/components/checks.php'; ?>
    <h1> Mentions légales </h1>
    <h2>Éditeur du site</h2>
    <p>
        Nom du site : Ze Quiz<br>
        Responsable de la publication : Ze Quiz Corporation<br>
        Github : <a href="https://github.com/TOTOlmz/quiz/" target="_blank">TOTOlmz quiz repository</a><br>
    </p>
    <h2>Hébergement</h2>
    <p>
        Hébergeur : O2 switch<br>
        Adresse : 222 Boulevard Gustave Flaubert, 63000 Clermont-Ferrand<br>
        Téléphone : 04 73 31 73 00
    </p>
    <h2>Propriété intellectuelle</h2>
    <p>
        Le contenu du site (textes, images, logo, etc.) est protégé par le droit d’auteur. Toute reproduction ou utilisation sans autorisation est interdite.
    </p>
    <h2>Données personnelles</h2>
    <p>
        Les informations recueillies via les formulaires sont destinées uniquement à Ze Quiz et ne seront jamais transmises à des tiers sans consentement préalable.
    </p>
    <h2>Cookies</h2>
    <p>
        Ce site peut utiliser des cookies à des fins de statistiques ou de fonctionnement. Vous pouvez configurer votre navigateur pour les refuser.
    </p>
    <h2>Contact</h2>
    <p>
        Pour toute question, vous pouvez remplir le formulaire
    </p>
    <button class="form-calling-btn button">Contactez-nous</button>


    <div class="overlay">
        <div class="pop-up">
            <h3>Contactez-nous</h3>
            <form action="" method="POST" class="quiz-creation-form">
                <input type="text" id="name" name="name" placeholder="Votre nom" required>
                <input type="email" id="email" name="email" placeholder="Votre email" required>
                <textarea id="message" name="message" rows="4" placeholder="Votre message" required></textarea>

                <button type="submit" class="button">Envoyer</button>
            </form>
        </div>
    </div>
    <a href="./" class="button">Retour à l'accueil</a>
</div>

<script>

    // script pour faire apparaitre les quizzes dans une div overlay
    const btn = document.querySelector('.form-calling-btn');
    const overlay = document.querySelector('.overlay');
    overlay.style.display = 'none';

    
    btn.addEventListener('click', function(event) {
        event.stopPropagation();
        console.log('omg he clicked me');
        overlay.style.display = 'flex';
    });
    
    
    overlay.addEventListener('click', function(event) {
        if (event.target === overlay) {
            overlay.style.display = 'none';
        }
    });
</script>