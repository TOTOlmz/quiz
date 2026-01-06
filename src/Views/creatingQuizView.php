

<div class="centered-div">
    <?php require_once __DIR__ . '/components/checks.php'; ?>
    <div class="quiz-creation">
        <h2>Créer un nouveau quiz</h2>
        <form action="" method="POST" class="quiz-creation-form">
            <label for="name">Nom du quiz :</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description du quiz :</label>
            <textarea id="description" name="description"></textarea>

            <label for="color">Couleur du quiz :</label>
            <input type="color" id="color" name="color" value="#ffff00" required>

            <button type="submit" name="create_quiz">Créer le quiz</button>
        </form>
    </div>

    <div class="question-creation">

        <h2><?=  isset($quiz['id']) ? "Quiz sur le theme : {$quiz['name']}" : ''; ?> (<?=  isset($quiz['questions']) ? count($quiz['questions']) : ''; ?> questions)</h2>

        <form action="" method="POST" class="question-creation-form">
            <label for="question">Question :</label>
            <textarea id="question" name="question" required></textarea>
            <br>

            <label for="answer_A">Réponse A :</label>
            <input type="text" id="answer_A" name="answer_A">

            <label for="answer_B">Réponse B :</label>
            <input type="text" id="answer_B" name="answer_B">

            <label for="answer_C">Réponse C :</label>
            <input type="text" id="answer_C" name="answer_C">

            <label for="answer_D">Réponse D :</label>
            <input type="text" id="answer_D" name="answer_D">
            <br>

            <label for="correct_answer">Réponse correcte :</label>
            <select id="correct_answer" name="correct_answer" required>
                <option value="A">Réponse A</option>
                <option value="B">Réponse B</option>
                <option value="C">Réponse C</option>
                <option value="D">Réponse D</option>
            </select>

            <button type="submit" name="create_question">Créer la question</button>
        </form>
    </div>
</div>


<script>
    const quizForm = document.querySelector('.quiz-creation');
    const questionForm = document.querySelector('.question-creation');

    let quiz = <?=  isset($quiz['id']) ? json_encode($quiz['id']) : 'null'; ?>;


    function toggleForms() {
        if (quiz !== null) {
            quizForm.style.display = 'none';
            questionForm.style.display = 'block';
        } else {
            quizForm.style.display = 'block';
            questionForm.style.display = 'none';
        }
    }

    toggleForms();

</script>