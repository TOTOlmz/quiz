<nav class="navbar">
    <a href="./" class="brand-area">
        <img src="./../public/assets/images/logo.svg" alt="Logo ze quiz" class="navbar-logo">
    </a>


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
    const logo = document.querySelector('.navbar-logo');



</script>