<div class="centered-div">
    
    <?php require_once __DIR__ . '/components/checks.php'; ?>


    <?php // Section permettant de lister les catégories ?>

    <h3>Catégories de Quizzes</h3>
    <div class="category-cards">
        <?php foreach ($categories as $category): ?>
            <form action="" method="POST" class="category-card">
                <h4><?= htmlspecialchars($category); ?></h4>
                <input type="hidden" name="category" value="<?= htmlspecialchars($category); ?>">
                <button type="submit" class="button">Voir les quizzes</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>


<?php // Section permettant d'afficher les quizzes d'une catégorie ?>

<?php if (!empty($quizzes)): ?>
<div class="overlay questions-overlay">
    <div class="pop-up">
        <h3>Quizzes dans la catégorie : <?= htmlspecialchars($_POST['category']); ?></h3>
        <div class="popup-quizzes-cards">
            <?php foreach ($quizzes as $quiz): ?>
            <div class="quiz-card" style="border-color: <?= htmlspecialchars($quiz['color']) ?>; box-shadow: 5px 5px 0 <?= htmlspecialchars($quiz['color']) ?>, -5px -5px 0 <?= htmlspecialchars($quiz['color']) ?>;">
                <a href="./quiz?id=<?= intval($quiz['id']); ?>" class="card-link">
                    <img src="./assets/images/users/<?= $quiz['picture'] ?>" style="border-color: <?= htmlspecialchars($quiz['color']) ?>;" alt="Créateur du quiz" class="quiz-creator-picture">
                    <h4><?= $quiz['name']; ?></h4>
                    <p><?=  $quiz['description']; ?></p>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="quiz-navigation">
            <a href="./categories" class="button">Retour aux catégories</a>
        </div>
    </div>
</div>
<?php endif; ?>


<script>
    // script pour faire apparaitre les quizzes dans une div overlay
    const quizzes = <?= json_encode($quizzes); ?>;
    console.log(quizzes);
    const questionsOverlay = document.querySelector('.questions-overlay');
    if (quizzes.length > 0) {
        questionsOverlay.style.display = 'flex';
    } else {
        questionsOverlay.style.display = 'none';
    }

    questionsOverlay.addEventListener('click', function(event) {
        if (event.target === questionsOverlay) {
            questionsOverlay.style.display = 'none';
        }
    });
    

</script>