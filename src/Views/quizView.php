<?php
// echo '<pre>';
// print_r($quiz);
// echo '</pre>'; 
?>

<div class="quiz-area">
    <?php require_once __DIR__ . '/components/checks.php'; ?>
    <h2><?=  isset($quiz['name']) ? $quiz['name'] : ''; ?></h2>

    <div class="question-area">
        <span class="report-quiz">⚐</span>
        <p></p>
        <?php // div affichée à la fin du quiz ?>
        <div class="quiz-end">
            <h2>Fin du quiz</h2>
            <p>Votre score : <span class="final-score"></span></p>
            <p><span class="percentage"></span>% de bonnes réponses  (<span class="result-stat"></span>)</p>
            <a href="./" class="button">Accueil</a>
            <a href="<?= $quizLink; ?>" class="button">Rejouer</a>
        </div>
    </div>
    <div class="answers-area">
        <div class="line line-one">
            <div class="answer" answer-value="A" correct="0"><p></p></div>
            <div class="answer" answer-value="B" correct="0"><p></p></div>
        </div>
        <div class="line line-two">
            <div class="answer" answer-value="C" correct="0"><p></p></div>
            <div class="answer" answer-value="D" correct="0"><p></p></div>
        </div>
    </div>
</div>


<div class="overlay report-overlay">
    <div class="pop-up">
        <h3>Signalement</h3>
        <form class="report-form" action="" method="POST">
            <input type="hidden" name="quiz-id" value="<?= isset($quiz['id']) ? intval($quiz['id']) : '0'; ?>">
            <input type="hidden" name="creator-id" value="<?= isset($quiz['user_id']) ? intval($quiz['user_id']) : '0'; ?>">
            <input type="hidden" name="reporter-id" value="<?= isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : '0'; ?>">
            <input type="text" name="report-title" placeholder="Sujet" required>
            <textarea name="comment" placeholder="Décrivez le problème..." required></textarea>
            <button type="submit" class="button">Envoyer le signalement</button><span class="button">Retour au quiz</span>
        </form>
            
    </div>
</div>



<script>/* script gérant les questions et l'envoi des résultats */
    // On stocke l'identifiant utilisateur dans une variable
    const userId = <?= isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : '0'; ?>;
    
    // On initialise les variables du quiz
    const quiz = <?=  isset($quiz) ? json_encode($quiz) : 'null'; ?>;
    let currentQuestionIndex = 0;
    const nbOfQuestions = quiz.questions.length;
    let correctAnswer = '';
    let score = 0;
    let correctAnswersCount = 0;

    // On stocke les éléments du DOM dans des variables
    const question = document.querySelector('.question-area');
    const answerA = document.querySelector('.answer[answer-value="A"]');
    const answerB = document.querySelector('.answer[answer-value="B"]');
    const answerC = document.querySelector('.answer[answer-value="C"]');
    const answerD = document.querySelector('.answer[answer-value="D"]');

    const quizEnd = document.querySelector('.quiz-end');
    const finalScore = document.querySelector('.final-score');
    const percentage = document.querySelector('.percentage');
    const resultStat = document.querySelector('.result-stat');

    const answersArray = document.querySelectorAll('.answer');

    // Fonction permettant de récupérer les questions/réponses
    function getQuestion (index) {
        const q = quiz['questions'][index];

        return cQuestion = {
            Q: q['question'],
            A: q['answer_A'],
            B: q['answer_B'],
            C: q['answer_C'],
            D: q['answer_D'],
            correct: q['correct_answer']
        };
    }

    // Fonction permettant de mettre à jour la question du quiz
    function updateQuestion (q, aA, aB, aC, aD, questionArray) {

        // On réinitialise le style des divs
        [aA, aB, aC, aD].forEach(div => {
            div.setAttribute('correct', '0');
            div.style.backgroundColor = '';
            div.style.color = '';
            div.style.opacity = 1;
        });

        // On remplit le contenu avec la question actuelle
        q.querySelector('p').textContent = questionArray['Q'];
        aA.querySelector('p').textContent = questionArray['A'];
        aB.querySelector('p').textContent = questionArray['B'];
        aC.querySelector('p').textContent = questionArray['C'];
        aD.querySelector('p').textContent = questionArray['D'];

        // On préscise la bonne réponse en donnant un attribut
        if (questionArray['correct'] === 'A') { aA.setAttribute('correct', '1'); }
        else if (questionArray['correct'] === 'B') { aB.setAttribute('correct', '1'); }
        else if (questionArray['correct'] === 'C') { aC.setAttribute('correct', '1'); }
        else if (questionArray['correct'] === 'D') { aD.setAttribute('correct', '1'); }

        // On masque les réponses vides
        if (aA.querySelector('p').textContent === '') { aA.style.opacity = 0; }
        if (aB.querySelector('p').textContent === '') { aB.style.opacity = 0; }
        if (aC.querySelector('p').textContent === '') { aC.style.opacity = 0; }
        if (aD.querySelector('p').textContent === '') { aD.style.opacity = 0; }


    }

    // Fonction permettant de rendre les divs clicables
    function clickableAnswers (divs) {
        divs.forEach(elt => {
            if (elt.style.opacity !== "0") {
                elt.style.cursor = 'pointer';
            }
        });
    }

    // Fonction vérifiant la réponse et passant à la question suivante
    function checkAnswer (div) {
        if (div.getAttribute('correct') === '1') {
            div.style.backgroundColor = 'var(--good-answer)';
            div.style.color = 'var(--font-color-white)';
            score = score + 10;
            correctAnswersCount++;
        } else {
            div.style.backgroundColor = 'var(--wrong-answer)';
            div.style.color = 'var(--font-color-white)';
            document.querySelector('[correct="1"]').style.backgroundColor = 'var(--green)';
        }

        // On désactive les autres réponses
        answersArray.forEach(a => { a.style.pointerEvents = 'none'; });

        setTimeout(() => {
            // On incrémente l'index de la question
            currentQuestionIndex++;

            // Si le nombre de question est dépassé, on affiche le score
            if (currentQuestionIndex > nbOfQuestions - 1) {
                sendData();
                question.querySelector('p').innerHTML = '';
                finalScore.textContent = score + '💠';
                const percent = Math.round((correctAnswersCount / nbOfQuestions) * 100);
                percentage.textContent = percent;
                resultStat.textContent = correctAnswersCount + ' / ' + nbOfQuestions;
                quizEnd.style.display = 'block';


                answersArray.forEach(a => {
                    a.querySelector('p').textContent = '';
                    a.style.opacity = 0;
                });

            // Sinon on affiche la nouvelle question
            } else {
                let currentQuestion =  getQuestion(currentQuestionIndex);
                updateQuestion(question, answerA, answerB, answerC, answerD, currentQuestion);
                // On réactive les réponses
                clickableAnswers(answersArray);
                answersArray.forEach(a => { a.style.pointerEvents = ""; });
            }
        }, 1000);
    }

    // On initialise la première question
    let currentQuestion = getQuestion(currentQuestionIndex);
    updateQuestion(question, answerA, answerB, answerC, answerD, currentQuestion);
    clickableAnswers(answersArray);

    answersArray.forEach(div => {
        div.addEventListener('click', function () {
            if (div.style.pointerEvents !== "none") {
                checkAnswer(div);
            }
        })
    });

    // Fonction permettant d'envoyer les données au serveur
    function sendData() {
        fetch('', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user: userId,
                quiz: quiz.id,
                score: score
            })
        }).then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau lors de l\'envoi des données.');
            }
            return response.json();
        }).then(data => {
            console.log('Données envoyées avec succès :', data);
        }).catch(error => {
            console.error('Erreur lors de l\'envoi des données :', error);
        });
    }

</script>

<script> /* Script gérant l'overlay de signalement */
    const reportOverlay = document.querySelector('.report-overlay');
    const reportBtn = document.querySelector('.report-quiz');
    const callBackBtn = document.querySelector('.report-form span.button');
    let ForReportUserId = <?= isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : '0'; ?>;

    reportBtn.addEventListener('click', function() {
        if (ForReportUserId === 0) {
            alert('Vous devez être connecté pour signaler un quiz.');
            return;
        }
        reportOverlay.style.display = 'flex';
    });
    reportOverlay.addEventListener('click', function(event) {
        if (event.target === reportOverlay) {
            reportOverlay.style.display = 'none';
        }
    });
    callBackBtn.addEventListener('click', function() {
        reportOverlay.style.display = 'none';
    });
</script>