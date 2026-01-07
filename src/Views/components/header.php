<nav class="navbar">
    <a href="./" class="brand-area">
        <img src="./../public/assets/images/logo.png" alt="Logo ze quiz" class="navbar-logo">
    </a>

    <!-- <button class="mobile-burger" id="mobile-burger">
        <span></span>
        <span></span>
        <span></span>
    </button> -->


    <div class="links-area" id="navbar-menu">
        <?php if ($connected): ?>
            <?php if ($admin): ?>
                    <a class="button nav-btn" href="./espace-admin">Espace admin</a>
                    <a class="button nav-btn" href="./deconnexion">Déconnexion</a>
            <?php else: ?>
                    <a class="button nav-btn" href="./mon-espace">Mon espace</a>
                    <a class="button nav-btn" href="./deconnexion">Déconnexion</a>
            <?php endif; ?>
        <?php else: ?>
                <a class="button nav-btn" href="./connexion">Connexion</a>
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