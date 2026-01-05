<div>
    <?php require_once __DIR__ . '/components/checks.php'; ?>
    <form class="connection" method="POST">
        <h2>Connexion</h2>
        <label for="email">Adresse e-mail :
        <input type="email" id="email" name="email" required></label>

        <label for="password">Mot de passe :
        <input type="password" id="password" name="password" required></label>

        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="./inscription">Inscrivez-vous ici</a></p>

</div>
