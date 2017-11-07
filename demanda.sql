-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2017 at 07:12 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 7.0.0RC2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demanda`
--

-- --------------------------------------------------------

--
-- Table structure for table `back_produtos`
--

CREATE TABLE IF NOT EXISTS `back_produtos` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `valor` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `back_produtos`
--

INSERT INTO `back_produtos` (`ID`, `nome`, `valor`, `descricao`, `quantidade`) VALUES
(1, 'Geladeira', '5900.00', 'Side by Side com gelo na porta', 2),
(2, 'FogÃ£o', '950.00', 'Painel automÃ¡tico e forno elÃ©trico', 5),
(3, 'Microondas', '1520.00', 'Manda SMS quando termina de esquentar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_criou` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `descricao`, `quantidade`, `data`, `usuario_criou`) VALUES
(1, 'Geladeira', '5900', 'Side by Side com gelo na porta', 2, '2017-11-06 19:01:50', 1),
(2, 'Fogão', '950', 'Painel automático e forno elétrico', 5, '2017-11-06 19:01:50', 1),
(3, 'Microondas', '1520', 'Manda SMS quando termina de esquentar', 1, '2017-11-06 19:01:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@email.com', '$2y$10$/DXOCa.9y2R3GdqbcAPFUOHj17mNKD9oYuLotdm68O4PwAbtR6RZa', 'rLlHqtaI0zjxFumPf9ZvcO1z8hdTPrLYFW0h1rTvwzxYoQOWgwSXzHIlPUI0', '2017-11-06 16:35:06', '2017-11-06 16:35:06'),
(2, 'Mrs. Beth Maggio II', 'arvel20@example.com', '$2y$10$E5G89Cqg5hBlyW/4ng/QKuFqvxp06MY7G7fn6cAYA1BARZBDPBlku', 'Eheup7BI5z', '2017-11-06 18:21:41', '2017-11-06 18:21:41'),
(3, 'Mr. Jackson Reichel I', 'jane.rempel@example.net', '$2y$10$jmJ7yLybPhFPuVocztnYz.skjf8yz.Umue2SpMmbDcvd2PR66Ok4y', '0KGSGTchN6', '2017-11-06 18:43:38', '2017-11-06 18:43:38'),
(4, 'Ivory Gerlach', 'joel.schoen@example.com', '$2y$10$2mn8uJxqMZQoejozmSY8KeARYYdHHlSeESyrScmdml2NKPi/JdLxm', 'joUviGrc2f', '2017-11-06 18:52:51', '2017-11-06 18:52:51'),
(5, 'Alva Kulas V', 'maggio.mariane@example.com', '$2y$10$JDbAP0E3bHQNyOCMgs/2AubXRhC7ZGkEMp3t26qTe4h8Qaix8KGci', 'CZpQdLDwOm', '2017-11-06 18:54:33', '2017-11-06 18:54:33'),
(6, 'Keshaun Doyle', 'laurianne.treutel@example.com', '$2y$10$NPSKoK1mU0m9EkZAU56MA.nwC4VmPrBnf1zSZs13RtSuGKuJoY962', 'aNvnxsQA0A', '2017-11-06 18:56:12', '2017-11-06 18:56:12'),
(7, 'Jonathon Muller Jr.', 'samantha.daugherty@example.net', '$2y$10$mB4RV8mLWN/yXewDD0iwVOxrYUTKxFx57rmRsiGqArfTnrWXUY35m', 'Tf604wQ1e3', '2017-11-06 18:57:44', '2017-11-06 18:57:44'),
(8, 'Lane Schmitt', 'alexis78@example.net', '$2y$10$EjE2NHE6wEzsodofZ6YF3eOudGAD0hlG.Tdefli5by6pAaYEU70/a', 'GlyC1IleRX', '2017-11-06 19:02:18', '2017-11-06 19:02:18'),
(9, 'Eloisa Roberts', 'roger.baumbach@example.net', '$2y$10$MPwhj.Ojps15rZ9SS8EFTu/mrqA0CawfWplcFJqFsD/VzhreBBRYe', '4KIBofrkt7', '2017-11-06 19:03:38', '2017-11-06 19:03:38'),
(10, 'Luna Franecki', 'mohr.aiden@example.com', '$2y$10$8SCkb7R7kCk5PBDo7yyRauDbBzqHFUeQTFbwXYarkE9N9Tl/4cccW', 'KVUdBgfCdn', '2017-11-06 19:04:32', '2017-11-06 19:04:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
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
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
