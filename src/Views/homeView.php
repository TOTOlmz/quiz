<div class="centered-div">

    <?php require_once __DIR__ . '/components/checks.php'; ?>

    <h3>Top Quizzes</h3>
    <div class="quizzes-cards">
        <?php foreach ($popularQuizzes as $pQuiz): ?>
            <div class="quiz-card" style="border-color: <?= htmlspecialchars($pQuiz['color']) ?>; box-shadow: 5px 5px 0 <?= htmlspecialchars($pQuiz['color']) ?>, -5px -5px 0 <?= htmlspecialchars($pQuiz['color']) ?>;">
                <a href="./quiz?id=<?= intval($pQuiz['id']); ?>" class="card-link">
                    <img src="./assets/images/users/<?= $pQuiz['picture'] ?>" style="border-color: <?= htmlspecialchars($pQuiz['color']) ?>;" alt="Créateur du quiz" class="quiz-creator-picture">
                    <h4><?= $pQuiz['name']; ?></h4>
                    <p><?=  $pQuiz['description']; ?></p>
                    <?= $pQuiz['picture'] ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <br><br><br>

    <h3>Nouveaux Quizzes</h3>
    <div class="quizzes-cards">
        <?php foreach ($recentQuizzes as $rQuiz): ?>
            <div class="quiz-card" style="border-color: <?= htmlspecialchars($rQuiz['color']) ?>; box-shadow: 5px 5px 0 <?= htmlspecialchars($rQuiz['color']) ?>, -5px -5px 0 <?= htmlspecialchars($rQuiz['color']) ?>;">
                <a href="./quiz?id=<?= intval($rQuiz['id']); ?>" class="card-link">
                    <img src="./assets/images/users/<?= $rQuiz['picture'] ?>" style="border-color: <?= htmlspecialchars($rQuiz['color']) ?>;" alt="Créateur du quiz" class="quiz-creator-picture">
                    <h4><?= $rQuiz['name']; ?></h4>
                    <p><?=  $rQuiz['description']; ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <br><br><br>

    <h3>Testez vos connaissances et défiez vos amis !</h3>
    <div class="action-area">
            <a href="./quiz?id=<?= $randomQuizId ?>" class="button">Quiz aléatoire</a>
            <a href="./categories" class="button">Les catégories</a>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="./inscription" class="button">S'inscrire</a>
            <?php endif; ?>
    </div>
</div>