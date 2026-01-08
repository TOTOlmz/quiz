<div class="centered-div">
    <h1>Page d'administration</h1>
    <?php require_once __DIR__ . '/components/checks.php'; ?>

    <div class="reports">
        <?php foreach($reports as $report): ?>
            <div class="report-card">
                <h3>Quiz signalé : <?= htmlspecialchars($report['name'] . ' #' . $report['id']) ?></h3>
                <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($report['description'])) ?></p>
                <p><strong>Créé par :</strong> <?= htmlspecialchars($report['pseudo']) ?> (<?= htmlspecialchars($report['email']) ?>)</p>
                <p><strong>Date de création :</strong> <?= htmlspecialchars($report['created_at']) ?></p>
                <a href="/quiz/public/quiz/<?= htmlspecialchars($report['id']) ?>" class="button">Voir le quiz</a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="stats">
        <h3>Informations sur la plateforme</h3>
        <div class="stat-card">
            <p>Nombre de quizzes : <strong><?= htmlspecialchars($nbQuizzes) ?></strong></p>
        </div>
        <div class="stat-card">
            <p>Nombre de joueurs inscrits : <strong><?= htmlspecialchars($nbPlayers) ?></strong></p>
        </div>
            
    </div>
</div>