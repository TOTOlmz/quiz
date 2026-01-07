-- ============================================
-- Fichier de seed pour peupler la base de données
-- 10 quizzes avec leurs questions
-- ============================================

-- QUIZ 1: Culture Générale - Les Capitales du Monde
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(1, 'Les Capitales du Monde', 'Testez vos connaissances sur les capitales', '#3498db', 'Géographie', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(1, 'Quelle est la capitale de l''Australie ?', 4, 'C', 'Sydney', 'Melbourne', 'Canberra', 'Perth'),
(1, 'Quelle est la capitale du Canada ?', 4, 'B', 'Toronto', 'Ottawa', 'Vancouver', 'Montréal'),
(1, 'Quelle est la capitale de la Suisse ?', 3, 'C', 'Zurich', 'Genève', 'Berne', ''),
(1, 'Quelle est la capitale du Brésil ?', 4, 'D', 'Rio de Janeiro', 'São Paulo', 'Salvador', 'Brasília'),
(1, 'Quelle est la capitale de la Norvège ?', 3, 'A', 'Oslo', 'Bergen', 'Trondheim', '');

-- QUIZ 2: Sport - Football
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(2, 'Le Football en Questions', 'Pour les passionnés de football', '#27ae60', 'Sport', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(2, 'Qui a remporté la Coupe du Monde 2018 ?', 4, 'A', 'France', 'Croatie', 'Belgique', 'Angleterre'),
(2, 'Combien de joueurs composent une équipe sur le terrain ?', 3, 'B', '10', '11', '12', ''),
(2, 'Quel joueur a remporté le plus de Ballons d''Or ?', 4, 'C', 'Cristiano Ronaldo', 'Pelé', 'Lionel Messi', 'Zinédine Zidane'),
(2, 'Quelle est la durée réglementaire d''un match ?', 2, 'B', '80 minutes', '90 minutes', '', ''),
(2, 'Dans quel club Kylian Mbappé a-t-il débuté sa carrière ?', 4, 'A', 'AS Monaco', 'PSG', 'Lyon', 'Marseille');

-- QUIZ 3: Sciences - Le Corps Humain
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(3, 'Le Corps Humain', 'Découvrez les mystères de notre anatomie', '#9b59b6', 'Sciences', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(3, 'Combien d''os possède un adulte ?', 4, 'C', '186', '196', '206', '216'),
(3, 'Quel est l''organe le plus grand du corps humain ?', 3, 'A', 'La peau', 'Le foie', 'Les poumons', ''),
(3, 'Combien de litres de sang un adulte possède-t-il environ ?', 4, 'B', '3 litres', '5 litres', '7 litres', '10 litres'),
(3, 'Quel est le muscle le plus puissant du corps ?', 4, 'D', 'Le biceps', 'Le cœur', 'Les quadriceps', 'La mâchoire'),
(3, 'Combien de chambres possède le cœur humain ?', 2, 'B', '2', '4', '', '');

-- QUIZ 4: Cuisine - Gastronomie Française
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(4, 'Gastronomie Française', 'Testez vos connaissances culinaires', '#e74c3c', 'Cuisine', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(4, 'Quelle région est célèbre pour la choucroute ?', 3, 'B', 'Bretagne', 'Alsace', 'Provence', ''),
(4, 'Quel fromage est utilisé dans la raclette ?', 4, 'A', 'Fromage à raclette', 'Camembert', 'Roquefort', 'Comté'),
(4, 'Quel est l''ingrédient principal de la ratatouille ?', 4, 'C', 'Pommes de terre', 'Champignons', 'Légumes d''été', 'Viande'),
(4, 'Dans quelle ville le cassoulet est-il originaire ?', 3, 'B', 'Lyon', 'Castelnaudary', 'Toulouse', ''),
(4, 'Combien d''étoiles Michelin peut obtenir un restaurant au maximum ?', 2, 'A', '3', '5', '', '');

-- QUIZ 5: Histoire - Seconde Guerre Mondiale
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(5, 'Seconde Guerre Mondiale', 'Les événements marquants de 1939-1945', '#95a5a6', 'Histoire', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(5, 'En quelle année a débuté la Seconde Guerre Mondiale ?', 4, 'B', '1938', '1939', '1940', '1941'),
(5, 'Quel était le nom de code du débarquement en Normandie ?', 4, 'D', 'Opération Barbarossa', 'Opération Market Garden', 'Opération Torch', 'Opération Overlord'),
(5, 'Qui était le Premier ministre britannique pendant la guerre ?', 3, 'A', 'Winston Churchill', 'Neville Chamberlain', 'Clement Attlee', ''),
(5, 'En quelle année le mur de Berlin a-t-il été érigé ?', 4, 'C', '1945', '1949', '1961', '1989'),
(5, 'Quel jour célèbre-t-on la victoire des Alliés en Europe ?', 2, 'B', '6 juin', '8 mai', '', '');

-- QUIZ 6: Animaux - Monde Animal
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(6, 'Le Monde Animal', 'Connaissez-vous bien les animaux ?', '#f39c12', 'Animaux', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(6, 'Quel est l''animal terrestre le plus rapide ?', 4, 'A', 'Le guépard', 'Le lion', 'Le léopard', 'L''antilope'),
(6, 'Combien de pattes possède une araignée ?', 3, 'C', '6', '10', '8', ''),
(6, 'Quel est le plus grand mammifère du monde ?', 4, 'B', 'L''éléphant', 'La baleine bleue', 'Le requin baleine', 'La girafe'),
(6, 'Les chauves-souris sont des...', 2, 'A', 'Mammifères', 'Oiseaux', '', ''),
(6, 'Quel animal peut dormir debout ?', 4, 'C', 'La vache', 'Le mouton', 'Le cheval', 'Le cerf');

-- QUIZ 7: Art - Peinture Classique
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(7, 'Peinture Classique', 'Les grands maîtres de la peinture', '#e67e22', 'Art', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(7, 'Qui a peint la Joconde ?', 4, 'B', 'Michel-Ange', 'Léonard de Vinci', 'Raphaël', 'Botticelli'),
(7, 'Dans quel musée se trouve la Joconde ?', 3, 'A', 'Le Louvre', 'Le Prado', 'Les Offices', ''),
(7, 'Qui a peint "La Nuit étoilée" ?', 4, 'C', 'Monet', 'Renoir', 'Van Gogh', 'Cézanne'),
(7, 'Quel artiste est connu pour ses "Nymphéas" ?', 3, 'B', 'Manet', 'Monet', 'Degas', ''),
(7, 'Qui a peint le plafond de la Chapelle Sixtine ?', 2, 'A', 'Michel-Ange', 'Léonard de Vinci', '', '');

-- QUIZ 8: Culture Générale - Mythologie Grecque
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(8, 'Mythologie Grecque', 'Plongez dans l''Olympe des dieux grecs', '#1abc9c', 'Culture G', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(8, 'Qui est le roi des dieux dans la mythologie grecque ?', 4, 'A', 'Zeus', 'Hadès', 'Poséidon', 'Apollon'),
(8, 'Quelle déesse est née de la tête de Zeus ?', 3, 'B', 'Aphrodite', 'Athéna', 'Artémis', ''),
(8, 'Qui est le dieu de la mer ?', 4, 'C', 'Zeus', 'Hermès', 'Poséidon', 'Arès'),
(8, 'Quel héros a tué la Méduse ?', 4, 'D', 'Hercule', 'Thésée', 'Achille', 'Persée'),
(8, 'Combien de travaux Hercule a-t-il dû accomplir ?', 2, 'B', '10', '12', '', '');

-- QUIZ 9: Sciences - L'Espace et l'Astronomie
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(9, 'L''Espace et l''Astronomie', 'Explorez les mystères du cosmos', '#2c3e50', 'Sciences', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(9, 'Quelle est la planète la plus proche du Soleil ?', 4, 'A', 'Mercure', 'Vénus', 'Mars', 'Terre'),
(9, 'Combien de planètes compte notre système solaire ?', 3, 'C', '7', '9', '8', ''),
(9, 'Quelle est la plus grosse planète du système solaire ?', 4, 'B', 'Saturne', 'Jupiter', 'Neptune', 'Uranus'),
(9, 'Combien de temps met la lumière du Soleil pour atteindre la Terre ?', 4, 'C', '1 minute', '5 minutes', '8 minutes', '15 minutes'),
(9, 'Qui a été le premier homme à marcher sur la Lune ?', 2, 'A', 'Neil Armstrong', 'Buzz Aldrin', '', '');

-- QUIZ 10: Géographie - Les Pays et Drapeaux
INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `played_nb`) VALUES
(10, 'Pays et Drapeaux', 'Reconnaissez-vous ces pays et drapeaux ?', '#16a085', 'Géographie', 1, 0);

INSERT INTO `questions` (`quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(10, 'Quel pays a le plus grand nombre d''habitants ?', 4, 'B', 'Inde', 'Chine', 'USA', 'Indonésie'),
(10, 'Quel est le plus grand pays du monde par superficie ?', 3, 'A', 'Russie', 'Canada', 'Chine', ''),
(10, 'Quelle est la langue officielle du Brésil ?', 4, 'C', 'Espagnol', 'Anglais', 'Portugais', 'Français'),
(10, 'Quel pays est surnommé "le pays du Soleil Levant" ?', 3, 'B', 'Chine', 'Japon', 'Corée du Sud', ''),
(10, 'Combien d''étoiles y a-t-il sur le drapeau américain ?', 2, 'A', '50', '52', '', '');

-- ============================================
-- Fin du fichier de seed
-- ============================================
