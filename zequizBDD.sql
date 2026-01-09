-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 09:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
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
(1, 1, 'comment s\'appelle marseille (surnom)', 3, 'A', 'La cité phocéenne', 'le trou noir', 'l\'OM', ''),
(2, 1, 'comment s\'appelle marseille (surnom)', 3, 'A', 'La cité phocéenne', 'le trou noir', 'l\'OM', ''),
(3, 1, 'paris on', 3, 'A', 't\'encule', '', 't\'aime', 't\'encourage'),
(4, 1, 'l\'om c\'est', 2, 'A', 'l\'olympique de marseille', 'l\'omonier mitoyen', '', ''),
(5, 2, 'comment s\'appelle la ville', 3, 'A', 'marseille', 'paris', 'quimper', ''),
(6, 2, 'marseille est elle une jolie ville', 2, 'A', 'oui', 'non', '', ''),
(7, 2, 'suis-je bo', 2, 'A', 'oui', 'ouui', '', ''),
(8, 3, 'ou c\'est', 2, 'A', 'je ne sais pas', 'quelle question', '', ''),
(9, 3, 'quelle est la spé culinaire', 2, 'A', 'aucune', 'plein', '', ''),
(10, 3, 'qui suis-je', 2, 'A', 'un fou', 'furieux', '', ''),
(11, 3, 'et la ?', 4, 'A', 'A', 'B', 'C', 'Théo mendes'),
(12, 3, 'Tire sur mon doigt', 4, 'A', 'Prout', 'Caca', 'Pipi', 'Vomi'),
(13, 4, 'prout', 2, 'A', 'oui', 'non', '', ''),
(14, 4, 'opejf', 4, 'A', 'sdnf', 'sodifn', 'ofn', 'efon'),
(15, 3, 'sdgfds', 4, 'C', 'dfgsrgr', 'dsfgrgd', 'ergxdger', 'dfgrstyjdts'),
(16, 6, 'quel drapeau est Bleu->blanc->rouge', 4, 'A', 'france', 'ouganda', 'madagascar', 'Russie'),
(17, 6, 'Quel drapeau est vert, blanc, orange', 3, 'B', 'itale', 'irlande', 'botswana', ''),
(18, 6, 'quel drapeau est vert avec un cerle rouge', 3, 'C', 'shanghai', 'laos', 'bangladesh', ''),
(19, 8, 'Pourquoi', 3, 'A', 'Parce que', 'Paar cette queue', 'Parser queue', ''),
(20, 8, 'autant', 4, 'B', 'pour moi', 'en emporte le vent', 'abattre le chien', 'pour moi (2)'),
(21, 8, 'qui a du ca', 4, 'B', 'ramel', 'ca kaki', 'caractère, coeur de moeule', 'rdashian'),
(22, 8, 'Kirikou est', 3, 'D', 'noir', 'petit', 'blond au yeux bleux', '');

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
(2, 'Marseille', 'Quizz sur marseille BB', '#ff0000', 'Culture G', 5, '2026-01-05 12:10:52', 6, 0),
(3, 'Bilbao', 'Je ne suis pas sur de l\'orthographe', '#0000ff', 'Culture G', 5, '2026-01-02 06:10:52', 1, 0),
(4, 'bilbaao', '2 eme quiz sur bilbalo\r\n', '#fd25f8', 'Culture G', 5, '2026-01-03 21:10:52', 0, 0),
(5, 'cool', 'sdfs', '#1be425', 'Culture G', 5, '2026-01-06 16:51:22', 0, 0),
(6, 'vieuxQuiz', 'Lorem ipsum dolor sit amet. Id incidunt galisum eu', '#1c2be3', 'Géographie', 5, '2025-12-01 12:33:44', 1, 0),
(7, 'NewQuiz', 'un nouveau quiz', '#261ba1', 'Sciences', 5, '2025-12-15 06:42:24', 10, 0),
(8, 'Ah ok my bad', 'Je vais donc faire une description plus courte', '#37c0c8', 'Sciences', 5, '2026-01-07 18:25:48', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `creator_email` varchar(100) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `reporter_email` varchar(100) NOT NULL,
  `object` varchar(50) NOT NULL,
  `comment` longtext NOT NULL,
  `report_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
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
(1, 'TheMaster', 'theo.lmz@proton.me', '$2y$12$RXXEIlV3UUvsj/dXXaT7s.T3p8d5Vn44Er52pC9uyYMApGyaUUytK', 'default.png', 'ADMIN', '2026-01-05 20:07:36', 0, 0),
(5, 'JohnDoe', 'John@doe.fr', '$2y$12$I2/ATw3Jtu6dGo/39qvgiuEWVnOr.hD3ubcYb60PxXu3UOcADUeRu', 'johndoe.png', 'USER', '2026-01-07 18:19:00', 280, 0),
(6, 'emma', 'emma0408@orange.fr', '$2y$12$OKJjDJZPEiB.oM1XJBkuJOuDXN4.f9mBBOVqDNcgu9cD.j4IADshe', 'emma.png', 'USER', '2026-01-08 09:24:19', 40, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
