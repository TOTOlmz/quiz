<nav class="navbar">
    <a href="./" class="brand-area">
        <img src="./assets/images/logo.webp" alt="Logo" class="navbar-logo">
        <p>Ze Quiz</p>
    </a>

    <!-- <button class="mobile-burger" id="mobile-burger">
        <span></span>
        <span></span>
        <span></span>
    </button> -->


    <div class="links-area" id="navbar-menu">
        <?php if ($connected): ?>
            <?php if ($admin): ?>
                <a class="nav-btn" href="./creer-un-quiz">Ajouter un quiz</a>
                <a class="nav-btn" href="./quizzes-signales">Quizzes signalés</a>
                <a class="nav-btn" href="./deconnexion">Déconnexion</a>
            <?php else: ?>
                <a class="nav-btn" href="./creer-un-quiz">Créer un quiz</a>
                <a class="nav-btn" href="./mes-quizzes">Mes quizzes</a>
                <a class="nav-btn" href="./deconnexion">Déconnexion</a>
            <?php endif; ?>
        <?php else: ?>
            <a class="nav-btn" href="./creer-un-quiz">Quiz aléatoire</a>
            <a class="nav-btn" href="./quizzes-par-categories">Quizzes par catégories</a>
            <a class="nav-btn" href="./connexion">Connexion</a>
        <?php endif; ?>
    </div>
</nav>

<script>
    /*
document.addEventListener('DOMContentLoaded', function() {
    const mobileBurger = document.getElementById('mobile-burger');
    const navbarMenu = document.getElementById('navbar-menu');
    
    if (mobileBurger && navbarMenu) {
        mobileBurger.addEventListener('click', function() {
            // Toggle du menu
            navbarMenu.classList.toggle('active');
            // Toggle de l'animation du hamburger
            mobileBurger.classList.toggle('active');
        });
        
        // Fermer le menu quand on clique sur un lien
        const navLinks = navbarMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navbarMenu.classList.remove('active');
                mobileBurger.classList.remove('active');
            });
        });
        
        // Fermer le menu si on clique ailleurs
        document.addEventListener('click', function(e) {
            if (!mobileBurger.contains(e.target) && !navbarMenu.contains(e.target)) {
                navbarMenu.classList.remove('active');
                mobileBurger.classList.remove('active');
            }
        });
    }
});
*/
</script>