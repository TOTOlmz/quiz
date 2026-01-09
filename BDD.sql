-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2026 at 06:45 PM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u589329624_zequiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `nb_of_answers` int(11) NOT NULL,
  `correct_answer` enum('A','B','C','D') NOT NULL,
  `answer_A` varchar(255) NOT NULL,
  `answer_B` varchar(255) NOT NULL,
  `answer_C` varchar(255) NOT NULL,
  `answer_D` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `nb_of_answers`, `correct_answer`, `answer_A`, `answer_B`, `answer_C`, `answer_D`) VALUES
(23, 1, 'Quelle est la capitale de l\'Australie ?', 4, 'C', 'Sydney', 'Melbourne', 'Canberra', 'Perth'),
(24, 1, 'Quelle est la capitale du Canada ?', 4, 'B', 'Toronto', 'Ottawa', 'Vancouver', 'Montréal'),
(25, 1, 'Quelle est la capitale de la Suisse ?', 3, 'C', 'Zurich', 'Genève', 'Berne', ''),
(26, 1, 'Quelle est la capitale du Brésil ?', 4, 'D', 'Rio de Janeiro', 'São Paulo', 'Salvador', 'Brasília'),
(27, 1, 'Quelle est la capitale de la Norvège ?', 3, 'A', 'Oslo', 'Bergen', 'Trondheim', ''),
(28, 2, 'Qui a remporté la Coupe du Monde 2018 ?', 4, 'A', 'France', 'Croatie', 'Belgique', 'Angleterre'),
(29, 2, 'Combien de joueurs composent une équipe sur le terrain ?', 3, 'B', '10', '11', '12', ''),
(30, 2, 'Quel joueur a remporté le plus de Ballons d\'Or ?', 4, 'C', 'Cristiano Ronaldo', 'Pelé', 'Lionel Messi', 'Zinédine Zidane'),
(31, 2, 'Quelle est la durée réglementaire d\'un match ?', 2, 'B', '80 minutes', '90 minutes', '', ''),
(32, 2, 'Dans quel club Kylian Mbappé a-t-il débuté sa carrière ?', 4, 'A', 'AS Monaco', 'PSG', 'Lyon', 'Marseille'),
(33, 3, 'Combien d\'os possède un adulte ?', 4, 'C', '186', '196', '206', '216'),
(34, 3, 'Quel est l\'organe le plus grand du corps humain ?', 3, 'A', 'La peau', 'Le foie', 'Les poumons', ''),
(35, 3, 'Combien de litres de sang un adulte possède-t-il environ ?', 4, 'B', '3 litres', '5 litres', '7 litres', '10 litres'),
(36, 3, 'Quel est le muscle le plus puissant du corps ?', 4, 'D', 'Le biceps', 'Le cœur', 'Les quadriceps', 'La mâchoire'),
(37, 3, 'Combien de chambres possède le cœur humain ?', 2, 'B', '2', '4', '', ''),
(38, 4, 'Quelle région est célèbre pour la choucroute ?', 3, 'B', 'Bretagne', 'Alsace', 'Provence', ''),
(39, 4, 'Quel fromage est utilisé dans la raclette ?', 4, 'A', 'Fromage à raclette', 'Camembert', 'Roquefort', 'Comté'),
(40, 4, 'Quel est l\'ingrédient principal de la ratatouille ?', 4, 'C', 'Pommes de terre', 'Champignons', 'Légumes d\'été', 'Viande'),
(41, 4, 'Dans quelle ville le cassoulet est-il originaire ?', 3, 'B', 'Lyon', 'Castelnaudary', 'Toulouse', ''),
(42, 4, 'Combien d\'étoiles Michelin peut obtenir un restaurant au maximum ?', 2, 'A', '3', '5', '', ''),
(43, 5, 'En quelle année a débuté la Seconde Guerre Mondiale ?', 4, 'B', '1938', '1939', '1940', '1941'),
(44, 5, 'Quel était le nom de code du débarquement en Normandie ?', 4, 'D', 'Opération Barbarossa', 'Opération Market Garden', 'Opération Torch', 'Opération Overlord'),
(45, 5, 'Qui était le Premier ministre britannique pendant la guerre ?', 3, 'A', 'Winston Churchill', 'Neville Chamberlain', 'Clement Attlee', ''),
(46, 5, 'En quelle année le mur de Berlin a-t-il été érigé ?', 4, 'C', '1945', '1949', '1961', '1989'),
(47, 5, 'Quel jour célèbre-t-on la victoire des Alliés en Europe ?', 2, 'B', '6 juin', '8 mai', '', ''),
(48, 6, 'Quel est l\'animal terrestre le plus rapide ?', 4, 'A', 'Le guépard', 'Le lion', 'Le léopard', 'L\'antilope'),
(49, 6, 'Combien de pattes possède une araignée ?', 3, 'C', '6', '10', '8', ''),
(50, 6, 'Quel est le plus grand mammifère du monde ?', 4, 'B', 'L\'éléphant', 'La baleine bleue', 'Le requin baleine', 'La girafe'),
(51, 6, 'Les chauves-souris sont des...', 2, 'A', 'Mammifères', 'Oiseaux', '', ''),
(52, 6, 'Quel animal peut dormir debout ?', 4, 'C', 'La vache', 'Le mouton', 'Le cheval', 'Le cerf'),
(53, 7, 'Qui a peint la Joconde ?', 4, 'B', 'Michel-Ange', 'Léonard de Vinci', 'Raphaël', 'Botticelli'),
(54, 7, 'Dans quel musée se trouve la Joconde ?', 3, 'A', 'Le Louvre', 'Le Prado', 'Les Offices', ''),
(55, 7, 'Qui a peint \"La Nuit étoilée\" ?', 4, 'C', 'Monet', 'Renoir', 'Van Gogh', 'Cézanne'),
(56, 7, 'Quel artiste est connu pour ses \"Nymphéas\" ?', 3, 'B', 'Manet', 'Monet', 'Degas', ''),
(57, 7, 'Qui a peint le plafond de la Chapelle Sixtine ?', 2, 'A', 'Michel-Ange', 'Léonard de Vinci', '', ''),
(58, 8, 'Qui est le roi des dieux dans la mythologie grecque ?', 4, 'A', 'Zeus', 'Hadès', 'Poséidon', 'Apollon'),
(59, 8, 'Quelle déesse est née de la tête de Zeus ?', 3, 'B', 'Aphrodite', 'Athéna', 'Artémis', ''),
(60, 8, 'Qui est le dieu de la mer ?', 4, 'C', 'Zeus', 'Hermès', 'Poséidon', 'Arès'),
(61, 8, 'Quel héros a tué la Méduse ?', 4, 'D', 'Hercule', 'Thésée', 'Achille', 'Persée'),
(62, 8, 'Combien de travaux Hercule a-t-il dû accomplir ?', 2, 'B', '10', '12', '', ''),
(63, 9, 'Quelle est la planète la plus proche du Soleil ?', 4, 'A', 'Mercure', 'Vénus', 'Mars', 'Terre'),
(64, 9, 'Combien de planètes compte notre système solaire ?', 3, 'C', '7', '9', '8', ''),
(65, 9, 'Quelle est la plus grosse planète du système solaire ?', 4, 'B', 'Saturne', 'Jupiter', 'Neptune', 'Uranus'),
(66, 9, 'Combien de temps met la lumière du Soleil pour atteindre la Terre ?', 4, 'C', '1 minute', '5 minutes', '8 minutes', '15 minutes'),
(67, 9, 'Qui a été le premier homme à marcher sur la Lune ?', 2, 'A', 'Neil Armstrong', 'Buzz Aldrin', '', ''),
(68, 10, 'Quel pays a le plus grand nombre d\'habitants ?', 4, 'B', 'Inde', 'Chine', 'USA', 'Indonésie'),
(69, 10, 'Quel est le plus grand pays du monde par superficie ?', 3, 'A', 'Russie', 'Canada', 'Chine', ''),
(70, 10, 'Quelle est la langue officielle du Brésil ?', 4, 'C', 'Espagnol', 'Anglais', 'Portugais', 'Français'),
(71, 10, 'Quel pays est surnommé \"le pays du Soleil Levant\" ?', 3, 'B', 'Chine', 'Japon', 'Corée du Sud', ''),
(72, 10, 'Combien d\'étoiles y a-t-il sur le drapeau américain ?', 2, 'A', '50', '52', '', ''),
(73, 11, 'Quelle boisson est bonne pour le corps', 4, 'A', 'Eau', 'Pastis', 'Ricard', '51'),
(74, 11, 'Quel pays est surnommé l’hexagone', 4, 'D', 'Allemagne', 'États-Unis', 'Angleterre', 'France'),
(75, 11, 'Quel contient est surnommé le vieux continent', 3, 'C', 'Oceanie', 'Asie', 'Europe', ''),
(76, 12, 'Quelle est la plus belle ville de France ?', 4, 'D', 'Marseille', 'Paris', 'Niederschaeffolsheim', 'Toucy'),
(77, 12, 'Ou se situe la puisaye ?', 4, 'D', 'en France', 'dans l\'Yonne', 'en Bourgogne', 'Autour de Toucy'),
(78, 12, 'Pourquoi Toucy n\'est pas la capitale de la France ?', 3, 'C', 'Parce que ses habitants sont humbles', 'Parce que Macron', 'Pour la tranquillité', ''),
(79, 12, 'Quelle est la maison presque natale de pythagore (the second)', 4, 'A', 'Toucy', 'Belle-île-en-mer', 'Peymeinade', 'Bourbourg !'),
(80, 12, 'Ou trouve on les meilleures tomates du jardin', 2, 'A', 'Dans le jardin de Véro', 'À Toucy', '', ''),
(81, 12, 'Joyeux enfant de la bourgogne ...', 2, 'A', 'Je n\'ai jamais eu de guignon', 'Hein quoi ?', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `color` varchar(25) NOT NULL DEFAULT '#fffffff',
  `category` enum('Culture G','Animaux','Art','Cuisine','Géographie','Histoire','Sciences','Sport','Autre') NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `played_nb` int(11) NOT NULL DEFAULT 0,
  `is_reported` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `description`, `color`, `category`, `user_id`, `created_at`, `played_nb`, `is_reported`) VALUES
(2, 'Le Football en Questions', 'Pour les passionnés de football', '#27ae60', 'Sport', 1, '2026-01-07 08:43:13', 4, 0),
(3, 'Le Corps Humain', 'Découvrez les mystères de notre anatomie', '#9b59b6', 'Sciences', 1, '2026-01-04 07:35:50', 3, 0),
(4, 'Gastronomie Française', 'Testez vos connaissances culinaires', '#e74c3c', 'Cuisine', 1, '2026-01-06 09:24:47', 4, 0),
(5, 'Seconde Guerre Mondiale', 'Les événements marquants de 1939-1945', '#95a5a6', 'Histoire', 1, '2026-01-04 07:46:04', 3, 0),
(6, 'Le Monde Animal', 'Connaissez-vous bien les animaux ?', '#f39c12', 'Animaux', 1, '2026-01-07 13:47:13', 2, 0),
(7, 'Peinture Classique', 'Les grands maîtres de la peinture', '#e67e22', 'Art', 1, '2026-01-04 21:38:09', 2, 0),
(8, 'Mythologie Grecque', 'Plongez dans l\'Olympe des dieux grecs', '#1abc9c', 'Culture G', 1, '2026-01-07 21:41:47', 1, 0),
(9, 'L\'Espace et l\'Astronomie', 'Explorez les mystères du cosmos', '#2c3e50', 'Sciences', 1, '2026-01-06 02:36:58', 1, 0),
(10, 'Pays et Drapeaux', 'Reconnaissez-vous ces pays et drapeaux ?', '#16a085', 'Géographie', 1, '2026-01-05 18:55:05', 0, 0),
(11, 'Test aleatoire', 'Quiz vraiment sympa', '#669d34', 'Autre', 6, '2026-01-08 21:18:21', 1, 0),
(12, 'Toucy', 'Quiz sur le plus belle ville du monde', '#07a91c', 'Culture G', 8, '2026-01-09 16:37:34', 0, 0),
(14, 'Les Capitales du Monde', 'Testez vos connaissances sur les capitales', '#3498db', 'Géographie', 1, '2026-01-09 18:23:16', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NOT NULL,
  `is_closed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `quiz_id`, `creator_id`, `reporter_id`, `title`, `comment`, `created_at`, `is_closed`) VALUES
(1, 1, 1, 8, 'Arnaque', 'Alerte à l&#039;arnaque !!', '2026-01-09 18:23:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `role` enum('ADMIN','USER') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `score` int(11) NOT NULL DEFAULT 0,
  `is_suspended` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `picture`, `role`, `created_at`, `score`, `is_suspended`) VALUES
(1, 'TheMaster', 'theo.lemazurier@gmail.com', '$2y$12$ZkqOHnpHmrRASsRVQqXB/uStO0wh9NdYz9EWakxxWBEMtvbJdo8Pm', 'ADMIN.png', 'ADMIN', '2026-01-09 18:04:48', 0, 0),
(6, 'EmmaBgette', 'emma0408@orange.fr', '$2y$12$zdZj3Yuz.RuKSllEzJ.TJuJW344WKbqrdkP/4X3iOVCB6euEsI1K2', 'emmabgette.jpg', 'USER', '2026-01-09 18:40:39', 70, 0),
(8, 'TheoTheGoat', 'theo.lmz@proton.me', '$2y$12$BQTvVKZgO89ecntVQ9c43eDgfjcpoRMYsEiYfr04KxF4FOEHqGXMa', 'theothegoat.webp', 'USER', '2026-01-09 18:44:23', 210, 0),
(9, 'SophieQuiz', 'sophie.martin@gmail.com', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-04 09:15:00', 45, 0),
(10, 'MaxPower', 'max.durand@yahoo.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-04 14:30:00', 30, 0),
(11, 'LucieB', 'lucie.bernard@outlook.com', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-04 18:45:00', 25, 0),
(12, 'ThomasG', 'thomas.garcia@gmail.com', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-05 08:00:00', 60, 0),
(13, 'ClaraM', 'clara.moreau@hotmail.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-05 11:20:00', 55, 0),
(14, 'JulienR', 'julien.robert@free.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-05 15:40:00', 40, 0),
(15, 'MarieL', 'marie.laurent@laposte.net', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-05 19:10:00', 35, 0),
(16, 'AlexKing', 'alex.simon@gmail.com', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-06 10:05:00', 80, 0),
(17, 'CamilleP', 'camille.petit@orange.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-06 13:25:00', 50, 0),
(18, 'NicolasD', 'nicolas.dubois@sfr.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-06 17:50:00', 65, 0),
(19, 'LauraW', 'laura.white@gmail.com', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-07 09:30:00', 90, 0),
(20, 'PierreF', 'pierre.fournier@yahoo.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-07 12:15:00', 75, 0),
(21, 'ChloéB', 'chloe.bonnet@outlook.com', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-07 16:00:00', 20, 0),
(22, 'HugoM', 'hugo.mercier@gmail.com', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-07 20:30:00', 100, 0),
(23, 'SarahJ', 'sarah.johnson@free.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-08 08:45:00', 110, 0),
(24, 'RémiC', 'remi.chevalier@laposte.net', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-08 14:20:00', 85, 0),
(25, 'LéaG', 'lea.girard@hotmail.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-08 18:00:00', 95, 0),
(26, 'KevinL', 'kevin.leroy@orange.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-09 10:10:00', 120, 0),
(27, 'ManonR', 'manon.rousseau@gmail.com', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-09 13:35:00', 70, 0),
(28, 'BaptisteDev', 'baptiste.dev@sfr.fr', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'USER', '2026-01-09 16:55:00', 105, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
