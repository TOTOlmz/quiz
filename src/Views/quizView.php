<div class="quiz-area">
    <?php require_once __DIR__ . '/components/checks.php'; ?>
    <h2><?=  isset($quiz['name']) ? $quiz['name'] : ''; ?></h2>
    <p><?=  isset($quiz['description']) ? $quiz['description'] : ''; ?></p>

    <div class="question-area">
        <p></p>
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


<script>
    // On stocke l'identifiant utilisateur dans une variable
    const userId = <?= isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : '0'; ?>;
    
    // On initialise les variables du quiz
    const quiz = <?=  isset($quiz) ? json_encode($quiz) : 'null'; ?>;
    let currentQuestionIndex = 0;
    const nbOfQuestions = quiz.questions.length;
    let correctAnswer = '';
    let score = 0;

    // On stocke les éléments du DOM dans des variables
    let question = document.querySelector('.question-area');
    let answerA = document.querySelector('.answer[answer-value="A"]');
    let answerB = document.querySelector('.answer[answer-value="B"]');
    let answerC = document.querySelector('.answer[answer-value="C"]');
    let answerD = document.querySelector('.answer[answer-value="D"]');

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
        } else {
            div.style.backgroundColor = 'var(--wrong-answer)';
            div.style.color = 'var(--font-color-white)';
        }

        // On désactive les autres réponses
        answersArray.forEach(a => { a.style.pointerEvents = 'none'; });

        setTimeout(() => {
            // On incrémente l'index de la question
            currentQuestionIndex++;

            // Si le nombre de question est dépassé, on affiche le score
            if (currentQuestionIndex > nbOfQuestions - 1) {
                sendData();
                question.querySelector('p').innerHTML = 'Quiz terminé ! <br> Votre score : ' + score + '💠';
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