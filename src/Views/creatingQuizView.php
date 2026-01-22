

<div class="quiz-creation">    
    <?php require_once ROOT_PATH . '/src/Views/components/checks.php'; ?>
    <h2>Créer un nouveau quiz</h2>
    <form action="" method="POST" class="question-creation-form">

        <label for="name">Nom du quiz :</label>
        <input type="text" id="name" name="name" required>     
        <br>
        <label for="description">Description du quiz :</label>
        <textarea id="description" name="description"></textarea>
        <br>
        <label for="color">Couleur du quiz :</label>
        <input type="color" id="color" name="color" value="#ffff00" required>
        <br>
        <label for="category">Categorie :</label>
        <select id="category" name="category" required>
            <option value="Culture G">Culture G</option>
            <option value="Animaux">Animaux</option>
            <option value="Art">Art</option>
            <option value="Cuisine">Cuisine</option>
            <option value="Géographie">Géographie</option>
            <option value="Histoire">Histoire</option>
            <option value="Sciences">Sciences</option>
            <option value="Sport">Sport</option>
            <option value="Autre">Autre</option>
        </select>

        <button type="submit" name="create_quiz" class="button">Créer le quiz</button>
    </form>
</div>

    <div class="question-creation">

        <h2><?=  isset($quiz['id']) ? "Quiz sur le theme : {$quiz['name']}" : ''; ?> (<?=  isset($quiz['questions']) ? count($quiz['questions']) : ''; ?> questions)</h2>

        <form action="" method="POST" class="question-creation-form">
            
            <textarea id="question" name="question" placeholder="question" required></textarea>
            <br>
            <input type="text" id="answer_A" class="correct" name="answer_A" placeholder="Réponse correcte" required>
            <input type="text" id="answer_B" name="answer_B" placeholder="Autre réponse">
            <input type="text" id="answer_C" name="answer_C" placeholder="Autre réponse">
            <input type="text" id="answer_D" name="answer_D" placeholder="Autre réponse">

            <button type="submit" name="create_question" class="button">Créer la question</button>
        </form>
    </div>
</div>


<script>
    // Script permettant de cacher les questions si le quiz n'est pas envoyé
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

<script> /* ajustement des largeurs des inputs */
    let select = document.getElementById('category');
    let color = document.getElementById('color');
    let button = document.querySelector('form button[type="submit"][name="create_quiz"]');
    let input = document.querySelector('form input');
    button.style.width = input.offsetWidth - 10 + 'px';
    color.style.width = input.offsetWidth + 'px';
    select.style.width = input.offsetWidth + 'px';
    button.style.textAlign = 'center';
</script>