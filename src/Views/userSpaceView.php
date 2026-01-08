<div class="centered-div">

    <?php require_once __DIR__ . '/components/checks.php'; ?>

    <h2>Mon profil</h2>
    <div class="userspace-section profile-section">
        
        <form action="" method="POST" class="picture-form" enctype="multipart/form-data">
            <img src="./assets/images/users/<?= htmlspecialchars($user['picture']) ?>" id="user-picture" alt="Photo de profil">
            
            <input type="file" id="picture-input" name="picture" accept="image/*">
            <span id="picture-label">✎</span>
        </form>

        <div class="user-infos">
            <p><?= htmlspecialchars($user['pseudo']) ?></p>
            <p>Score : <?= htmlspecialchars($user['score']) ?>💠</p>
        </div>
    </div>

    <h2>Mes quizzes <a href="./creer-un-quiz" class="button">Créer un quiz</a></h2>
    <div class="userspace-section quizzes-section">
        
        
        <div class="quiz-list">
            <?php if (!empty($quizzes)): ?>
                <?php foreach ($quizzes as $quiz): ?>
                    <a href="./quiz?id=<?= htmlspecialchars($quiz['id']) ?>" class ="quiz-a">
                        <div class="quiz-div" style="border-color: <?= htmlspecialchars($quiz['color']) ?>; box-shadow: 5px 5px 0 <?= htmlspecialchars($quiz['color']) ?>, -5px -5px 0 <?= htmlspecialchars($quiz['color']) ?>;">
                            <p><?= htmlspecialchars($quiz['name']) ?></p>
                            <p>Créé le <?= htmlspecialchars(date('d/m/Y', strtotime($quiz['created_at']))) ?></p>
                            <p>Joué <?= htmlspecialchars($quiz['played_nb']) ?> fois</p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun quiz créé.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
const userPicture = document.getElementById('user-picture');
const pictureLabel = document.getElementById('picture-label');
const pictureInput = document.getElementById('picture-input');

userPicture.addEventListener('mouseenter', () => {
    pictureLabel.style.opacity = 0.5;
});
userPicture.addEventListener('mouseleave', () => {
    pictureLabel.style.opacity = 0;
});
pictureInput.addEventListener('mouseenter', () => {
    pictureLabel.style.opacity = 0.5;
});
pictureInput.addEventListener('mouseleave', () => {
    pictureLabel.style.opacity = 0;
});

// Si l'input contient un fichier, on soumet le formulaire
pictureInput.addEventListener('change', function() {
    if (pictureInput.files.length > 0) {
        pictureInput.form.submit();
    }
});
</script>