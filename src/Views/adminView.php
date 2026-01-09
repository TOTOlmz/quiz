<div class="centered-div">
    <h1>Page d'administration</h1>
    <?php require_once __DIR__ . '/components/checks.php'; ?>

    <div class="admin-menu">
        <span id="players-btn" class="button">Graphique des utilisateurs</span>
        <span id="quizzes-btn" class="button">Graphique des créations</span>
        <span id="suspended-users-btn" class="button">Gestion des joueurs suspendus</span>
        <span id="reports-btn" class="button">Gestion des signalements</span>
    </div>    
</div>

<div class="overlay admin-overlay">
    <div class="pop-up suspended-users-div">
        <span class="new-suspension button">Suspendre un joueur</span>
        <form action="" method="POST" class="new-suspension-form">
            <input type="text" name="suspension-id" placeholder="ID du joueur à suspendre">
            <input type="text" id="suspension-pseudo" placeholder="Pseudo du joueur à suspendre">
            <button type="submit" name="suspend-user" class="button">Suspendre le joueur</button>
        </form>
        <h3>Liste des joueurs actuellement suspendus</h3>
        <?php if (!empty($suspendedUsers)): ?>
            <ul>
                <?php foreach($suspendedUsers as $user): ?>
                    <form action="" method="POST" class="suspended-user-form">
                        <input type="hidden" name="user-id" value="<?= htmlspecialchars($user['id']) ?>">
                        <p><?= htmlspecialchars($user['pseudo']) ?> (<?= htmlspecialchars($user['email']) ?>)</p>
                        <button type="submit" name="unsuspend-user" class="button">Lever la suspension</button>
                    </form>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun joueur n'est actuellement suspendu.</p>
        <?php endif; ?>
        <br>
        <span class="close-btn button">Fermer</span>
        
    </div>

    <div class="pop-up reports-div">
        <?php if (!empty($reports)): ?>
            <h2>Signalements en attente</h2>
            <?php foreach($reports as $report): ?>
                <div class="report-card" style="border-color: <?= htmlspecialchars($report['color']) ?>; box-shadow: 5px 5px 0 <?= htmlspecialchars($report['color']) ?>, -5px -5px 0 <?= htmlspecialchars($report['color']) ?>;">
                    <a href="/quiz/public_html/quiz?id=<?= htmlspecialchars($report['quiz_id']) ?>" class="card-link">
                        <h3>Quiz signalé : <?= htmlspecialchars($report['name'] . ' #' . $report['quiz_id']) ?></h3>
                        <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($report['description'])) ?></p>
                        <p><strong>Créé par :</strong> <?= htmlspecialchars($report['creator_pseudo']) ?> (<?= htmlspecialchars($report['creator_email']) ?>)</p>
                        <p><strong>Date de création :</strong> <?= htmlspecialchars($report['created_at']) ?></p>
                        <p><strong>Signalé par :</strong> <?= htmlspecialchars($report['reporter_pseudo']) ?> (<?= htmlspecialchars($report['reporter_email']) ?>)</p>
                        <p><strong>Titre du signalement :</strong> <?= nl2br($report['title']) ?></p>
                        <p><strong>Commentaire du signalement :</strong> <?= nl2br($report['comment']) ?></p>

                        <br>
                        <form action="" method="POST" class="report-action-form">
                            <input type="hidden" name="report-id" value="<?= htmlspecialchars($report['id']) ?>">
                            <input type="hidden" name="quiz-id" value="<?= htmlspecialchars($report['quiz_id']) ?>">
                            <button type="submit" name="undo-report" class="button">Annuler le signalement</button>
                            <button type="submit" name="delete-quiz" class="button">Supprimer le quiz</button>
                        </form>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>Aucun signalement en attente</h2>
        <?php endif; ?>
        <br>
        <span class="close-btn button">Fermer</span>
    </div>

    <div class="pop-up stats quizzes-div">
        <h3>Évolution du nombre de quizzes</h3>
        <canvas id="quizzesChart"></canvas>
        <br>
        <span class="close-btn button">Fermer</span>
    </div>
    <div class="pop-up stats players-div">
    
        <h3>Évolution du nombre de joueurs</h3>
        <canvas id="playersChart"></canvas>
        <br>
        <span class="close-btn button">Fermer</span>
    </div>
</div>

<script src="./assets/adminScript.js">/* Script gérant les overlays et les formulaires */</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script> /* Script lié aux graphiques ChartJS */


    // Préparation des variables pour le style des graphiques
    const purple = window.getComputedStyle(document.querySelector('.button')).borderColor;


    let day = Date.now();
    let labels = []; 
    for (let i = 0; i < 7; i++) {
        // On ne veut pas récupérer la date actuelle
        day = day - 86400000; // Soustraction d'un jour en ms
        labels[i] = new Date(day).toLocaleDateString('fr-FR');
    }
    labels = labels.reverse();

    // Graphique concernant les quizzes
    const quizzesData = <?php echo json_encode($nbQuizzes); ?>;
    let quizzesCount = {};
    quizzesData.forEach(quiz => {
        const date = new Date(quiz).toLocaleDateString('fr-FR');
        quizzesCount[date] = (quizzesCount[date] || 0) + 1;
    });
    
    // on convertit l'objet en tableau ordonné selon les labels
    let quizzesByDay = labels.map(label => quizzesCount[label] || 0);

    
    
    
    const ctxQuizzes = document.getElementById('quizzesChart');
    new Chart(ctxQuizzes, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre de quizzes créés sur la semaine',
                data: quizzesByDay,
                borderWidth: 1,
                borderColor: purple,
                backgroundColor: purple,
                tension: 0.1
            }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Graphique concernant les joueurs
    const playersData = <?php echo json_encode($nbPlayers); ?>;
    let playersCount = {};
    playersData.forEach(player => {
        const date = new Date(player).toLocaleDateString('fr-FR');
        playersCount[date] = (playersCount[date] || 0) + 1;
    });
    
    
    // on convertit l'objet en tableau ordonné selon les labels
    let playersByDay = labels.map(label => playersCount[label] || 0);


    const ctxPlayers = document.getElementById('playersChart');
    new Chart(ctxPlayers, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre d\'utilisateurs inscrits sur la semaine',
                data: playersByDay,
                borderWidth: 1,
                borderColor: purple,
                backgroundColor: purple,
                tension: 0.1
            }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>