
// Récupération de la div d'overlay
const adminOverlay = document.querySelector('.admin-overlay');

// Pour la gestion des utilisateurs
const usersDiv = document.querySelector('.suspended-users-div');
const usersBtn = document.getElementById('suspended-users-btn');
// Pour les signalements
const reportsDiv = document.querySelector('.reports-div');
const reportsBtn = document.getElementById('reports-btn');
// Pour les stats des quizzes
const quizzesChartDiv = document.querySelector('.quizzes-div');
const quizzesChartBtn = document.getElementById('quizzes-btn');
// Pour les stats des joueurs
const playersChartDiv = document.querySelector('.players-div');
const playersChartBtn = document.getElementById('players-btn');

usersBtn.addEventListener('click', () => {
    adminOverlay.style.display = 'flex';
    usersDiv.style.display = 'block';
});
reportsBtn.addEventListener('click', () => {
    adminOverlay.style.display = 'flex';
    reportsDiv.style.display = 'block';
});
quizzesChartBtn.addEventListener('click', () => {
    adminOverlay.style.display = 'flex';
    quizzesChartDiv.style.display = 'block';
});
playersChartBtn.addEventListener('click', () => {
    adminOverlay.style.display = 'flex';
    playersChartDiv.style.display = 'block';
});

// Pour fermer l'overlay et toutes les sections
adminOverlay.addEventListener('click', (event) => {
    if (event.target === adminOverlay) {
        adminOverlay.style.display = 'none';
        usersDiv.style.display = 'none';
        reportsDiv.style.display = 'none';
        quizzesChartDiv.style.display = 'none';
        playersChartDiv.style.display = 'none';
    }
});
const closeButtons = document.querySelectorAll('.close-btn');
closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        adminOverlay.style.display = 'none';
        usersDiv.style.display = 'none';
        reportsDiv.style.display = 'none';
        quizzesChartDiv.style.display = 'none';
        playersChartDiv.style.display = 'none';
    });
});

/* Gestion du formulaire de suspension */ 
const newSuspensionBtn = document.querySelector('.new-suspension');
const newSuspensionForm = document.querySelector('.new-suspension-form');
let formStatus = false;
newSuspensionBtn.addEventListener('click', () => {
    if (formStatus === false) {
    newSuspensionForm.style.display = 'grid';
    newSuspensionBtn.textContent = 'Retour';
    formStatus = true;
    } else {
        newSuspensionForm.style.display = 'none';
        newSuspensionBtn.textContent = 'Suspendre un joueur';
        formStatus = false;
    }
});

