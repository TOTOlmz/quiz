<div class="centered-div">

    <?php require_once __DIR__ . '/components/checks.php'; ?>

    <h3>Top Quizzes</h3>
    <div class="quizzes-cards">
        <?php foreach ($popularQuizzes as $quiz): ?>
            <div class="quiz-card" style="border-color: <?= htmlspecialchars($quiz['color']) ?>; box-shadow: 5px 5px 0 <?= htmlspecialchars($quiz['color']) ?>, -5px -5px 0 <?= htmlspecialchars($quiz['color']) ?>;">
                <img src="./assets/images/users/<?= $quiz['picture'] ?>" style="border-color: <?= htmlspecialchars($quiz['color']) ?>;" alt="Créateur du quiz" class="quiz-creator-picture">
                <h4><?= $quiz['name']; ?></h4>
                <p><?=  $quiz['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <br><br><br>

    <h3>Nouveaux Quizzes</h3>
    <div class="quizzes-cards">
        <?php foreach ($recentQuizzes as $quiz): ?>
            <div class="quiz-card" style="border-color: <?= htmlspecialchars($quiz['color']) ?>; box-shadow: 5px 5px 0 <?= htmlspecialchars($quiz['color']) ?>, -5px -5px 0 <?= htmlspecialchars($quiz['color']) ?>;">
                <img src="./assets/images/users/<?= $quiz['picture'] ?>" style="border-color: <?= htmlspecialchars($quiz['color']) ?>;" alt="Créateur du quiz" class="quiz-creator-picture">
                <h4><?= $quiz['name']; ?></h4>
                <p><?=  $quiz['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <br><br><br>

    <h3>Testez vos connaissances et défiez vos amis !</h3>
    <div class="action-area">
        <div>
            <a href="./quiz?id=<?= $randomQuizId ?>" class="button">Jouer l'aléatoire</a>
        </div>
        <div>
            <a href="./quizzes-par-categories" class="button">Voir tous les quizzes</a>
        </div>
        <div>
            <a href="./inscription" class="button">Rejoindre l'aventure</a>
        </div>
    </div>
</div>
