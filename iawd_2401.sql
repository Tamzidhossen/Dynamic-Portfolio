-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2024 at 04:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iawd 2401`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int NOT NULL,
  `designation` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `designation`, `name`, `desp`, `image`) VALUES
(1, 'Patricia Long', 'Xena Mills', 'Quia consequatur venQuia consequatur ven', '66bf3d5252c59.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `designation`, `image`, `feedback`) VALUES
(4, 'Kyra Dale', 'Exercitationem tempo', '66c45d7b2028a.png', 'Est voluptas aliqui'),
(5, 'Ursa Harvey', 'Aliquip maiores maxi', '66c45e2bc3e4f.jpg', 'Quibusdam explicabo'),
(6, 'Acton Lott', 'Illo est non et sint', '66c45e7326e0a.jpg', 'Laboris adipisci vol');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int NOT NULL,
  `header_logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `footer_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `header_logo`, `footer_logo`) VALUES
(1, '66bcf7e1d263e.png', '66bcf7e1d36ad.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'Shelly Burnett', 'kuqapyf@mailinator.com', 'Qui ut ea ad necessi', 'Est reprehenderit q', 1, '2024-08-23 09:29:47'),
(2, 'Erin Rutledge', 'wovic@mailinator.com', 'Incididunt ratione v', 'Voluptatem ipsa in ', 1, '2024-08-23 09:31:55'),
(3, 'Lysandra Bowen', 'kypimap@mailinator.com', 'Blanditiis dolor omn', 'Ad inventore officia', 1, '2024-08-23 09:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `category`, `image`, `status`) VALUES
(2, 'Web Development', 'WORDPRESS', '66c22939d1c32.jpg', 0),
(3, 'Graphics Branding', 'WORDPRESS', '66c2298d7c563.jpg', 0),
(4, 'Graphics Branding Design', 'WORDPRESS02', '66c221b181778.jpg', 1),
(5, 'PHP Development', 'WORDPRESS5', '66c221dd3d8ff.jpg', 1),
(6, 'React Developer', 'WORDPRESS20', '66c221fa53228.jpg', 1),
(7, 'Web Developmentpart', 'WORDPRESS70', '66c226a73f057.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `desp` varchar(200) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `desp`, `status`) VALUES
(2, 'Frontend Development', 'It can change the way we feel about a company and the products & services they offer.', 1),
(3, 'Digital Content Marketing', 'It can change the way we feel about a company and the products & services they offer.', 1),
(4, 'Application devlopment', 'It can change the way we feel about a company and the products & services they offer.', 1),
(5, 'Videography Photography', 'It can change the way we feel about a company and the products & services they offer.', 1),
(6, 'Wordpress Development', 'It can change the way we feel about a company and the products & services they offer.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `percentage` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `percentage`, `status`) VALUES
(1, 'HTML', 95, 1),
(2, 'Css', 90, 0),
(3, 'Javascript', 80, 0),
(4, 'Bootstrap', 70, 0),
(5, 'Tailwind CSS', 85, 0),
(6, 'React JS', 65, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `country`, `gender`, `photo`, `role`) VALUES
(1, 'Tamzid Hossen', 'tamzidhossen366@gmail.com', '$2y$10$S8oSRzMN3fk.sbY/FeZf/eEmH.ndlJHZL8ZReebNm5uTaSJ8DrV5C', 'BAN', 'male', '66b08dadae4d6.jpg', 1),
(2, 'Desirae Hood', 'monu@mailinator.com', '$2y$10$PqIguaUVsE8B2vjorjCDJ.7FAl6k7/fIvHj9ZOGpbO5o57K11G2Y.', 'ENG', 'male', '66af0be332803.jpg', 2),
(3, 'Aurelia Simon', 'qotomypy@mailinator.com', '$2y$10$6qwOTVB8HMomewvKHwpYEO/5pefhMFa42il427L.cOfybwU3srIki', 'BAN', 'male', '66b08e1a80ef4.jpg', 3),
(4, 'Carlos Sparks', 'dumecicicu@mailinator.com', '$2y$10$ukATyvwmfwMJdq8bUDpsSOAHpLWb13ufEx.kGCG.zujnF0z.KP3wS', 'ENG', 'male', '66b08e5c63495.jpg', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
