
<div class="connection">
    
    <?php require_once __DIR__ . '/components/checks.php' ?>
    
    <h2>Créer un compte</h2>
    <form class="connection-form" method="post" action="">
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
        <input type="email" id="email" name="email" placeholder="email" required>
        <input type="password" id="password" name="password" placeholder="mot de passe" required>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmation du mot de passe" required>
        <button type="submit" id="submit-button" class="button">S'inscrire</button>
        <div class="password-requirements">
            <p> Le mot de passe doit contenir au moins :</p>
            <span class="pass pass1 pass-length">8 caractères</span>
            <span class="pass pass1 pass-upper">Une majuscule</span>
            <span class="pass pass1 pass-lower">Une minuscule</span>
            <span class="pass pass1 pass-number">Un chiffre</span>
            <span id="passconf-label" class="pass">Les mots de passe ne correspondent pas.</span>
        </div>        
    </form>
    <div>
        <p> Déjà un compte ? <a href="./connexion">cliquez ici</a></p>
    </div>
</div>
<div class="form-container">
    
    

</div>

<script>
    // Validation du mot de passe côté client
    const form = document.querySelector('form');
    form.querySelector('#submit-button').style.display = 'none';
    const password = document.getElementById('password');
    const passwordConfirm = document.getElementById('confirm-password');


    document.querySelectorAll('.pass').forEach(item => {
        item.style.padding = '0.2rem 0.5rem';
        item.style.margin = '0.2rem';
        item.style.borderRadius = '5px';
        item.style.color = 'white';
        item.style.backgroundColor = '#a10000';
        item.style.display = 'inline-block';
    });
    
    document.querySelector('#passconf-label').style.display = 'none'; 

    password.addEventListener('input', checkForm);
    passwordConfirm.addEventListener('input', checkForm);

    function checkForm() {
        if (validatePassword()) {
            document.querySelector('.password-requirements .pass-length').textContent = 'Le mot de passe est robuste.';
            document.querySelector('.password-requirements .pass-upper').innerHTML = '';
            document.querySelector('.password-requirements .pass-lower').innerHTML = '';
            document.querySelector('.password-requirements .pass-number').innerHTML = '';
            document.querySelector('.password-requirements p').innerHTML = '';
            document.querySelectorAll('.password-requirements .pass1').forEach(item => item.style.display = 'none');
            document.querySelector('.password-requirements .pass-length').style.display = 'block';
            let confirmP = password.value === passwordConfirm.value;
            form.querySelector('#submit-button').style.display = confirmP ? 'block' : 'none';
            document.querySelector('#passconf-label').style.display = 'block';
            document.querySelector('#passconf-label').style.backgroundColor = confirmP ? '#196e44' : '#a10000';    
            document.querySelector('#passconf-label').textContent = confirmP ? 'Les mots de passe correspondent.' : 'Les mots de passe ne correspondent pas.'; 

        } 
    }

    function validatePassword(){
        document.querySelector('.password-requirements').style.display = 'block';
        let passValue = password.value;
        let validLength = passValue.length >= 8;
        let validUpper = passValue.toLowerCase() !== passValue;
        let validLower = passValue.toUpperCase() !== passValue;
        let validNumber = passValue.search(/[0-9]/) !== -1;
        document.querySelector('.pass-length').style.backgroundColor = validLength ? '#196e44' : '#a10000';
        document.querySelector('.pass-upper').style.backgroundColor = validUpper ? '#196e44' : '#a10000';
        document.querySelector('.pass-lower').style.backgroundColor = validLower ? '#196e44' : '#a10000';
        document.querySelector('.pass-number').style.backgroundColor = validNumber ? '#196e44' : '#a10000';
        return validLength && validUpper && validLower && validNumber;
    };
</script>

<script>
    // Script simple pour ajuster la largueur d'un bouton en fonction des inputs
    let button = document.querySelector('.connection-form button[type="submit"]');
    let input = document.querySelector('.connection-form input');
    button.style.width = input.offsetWidth - 10 + 'px';
    button.style.textAlign = 'center';
</script>