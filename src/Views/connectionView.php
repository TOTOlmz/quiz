<div>
    

    <div class="connection">
        <?php require_once ROOT_PATH . '/src/Views/components/checks.php'; ?>
        <form class="connection-form" action="" method="POST">
            <h2>Connexion</h2>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>

            <button type="submit" name="login" class="button">Se connecter</button>
        </form>
        <p>Pas encore de compte ? <a href="./inscription">Inscrivez-vous ici</a></p>
    </div>

</div>

<script>
    let button = document.querySelector('.connection-form button[type="submit"]');
    let input = document.querySelector('.connection-form input');
    button.style.width = input.offsetWidth - 10 + 'px';
    button.style.textAlign = 'center';
</script>