<div class="quiz-creation">
    <h1>Créer un nouveau quiz</h1>
    <form action="" method="POST" class="quiz-creation-form">
        <label for="name">Nom du quiz :</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description du quiz :</label>
        <textarea id="description" name="description"></textarea>

        <button type="submit" name="create_quiz">Créer le quiz</button>
    </form>
</div>

<div class="question-creation">
    <h2>Créer une nouvelle question</h2>
    <form action="" method="POST" class="question-creation-form">
        <label for="question">Question :</label>
        <textarea id="question" name="question" required></textarea>

        <label for="answer_A">Réponse A :</label>
        <input type="text" id="answer_A" name="answer_A">

        <label for="answer_B">Réponse B :</label>
        <input type="text" id="answer_B" name="answer_B">

        <label for="answer_C">Réponse C :</label>
        <input type="text" id="answer_C" name="answer_C">

        <label for="answer_D">Réponse D :</label>
        <input type="text" id="answer_D" name="answer_D">

        <button type="submit" name="create_question">Créer la question</button>
    </form>
</div>


<script>
    const quizForm = document.querySelector('.quiz-creation-form');
    const questionForm = document.querySelector('.question-creation-form');
</script>