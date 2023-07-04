-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 03:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lotoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `billet`
--

CREATE TABLE `billet` (
  `id` int(11) NOT NULL,
  `idTombola` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `checking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billet`
--

INSERT INTO `billet` (`id`, `idTombola`, `nom`, `address`, `telephone`, `addedBy`, `checking`) VALUES
(3, 1, 'zp', 'toliara', '5555', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `billetnum`
--

CREATE TABLE `billetnum` (
  `id` int(11) NOT NULL,
  `idBillet` int(11) NOT NULL,
  `nombillet` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `nomtombola` varchar(10) NOT NULL,
  `idTombola` int(11) NOT NULL,
  `No1` int(1) NOT NULL,
  `No2` int(1) NOT NULL,
  `No3` int(1) NOT NULL,
  `No4` int(1) NOT NULL,
  `No5` int(1) NOT NULL,
  `No6` int(1) NOT NULL,
  `No7` int(1) NOT NULL,
  `No8` int(1) NOT NULL,
  `No9` int(1) NOT NULL,
  `No10` int(1) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `checking` varchar(25) NOT NULL,
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billetnum`
--

INSERT INTO `billetnum` (`id`, `idBillet`, `nombillet`, `address`, `telephone`, `nomtombola`, `idTombola`, `No1`, `No2`, `No3`, `No4`, `No5`, `No6`, `No7`, `No8`, `No9`, `No10`, `prix`, `checking`, `addedBy`) VALUES
(1, 3, '', '', '', '', 1, 7, 7, 7, 8, 8, 5, 7, 0, 0, 0, '', '7 7 7 8 8 5 7 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tombola`
--

CREATE TABLE `tombola` (
  `id` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `lot` varchar(10) NOT NULL,
  `dateTirage` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tombola`
--

INSERT INTO `tombola` (`id`, `IdUser`, `nom`, `lot`, `dateTirage`) VALUES
(1, 1, 'best', '2000', '2023-07-06'),
(2, 1, 'bb', '5222', '2023-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT 0,
  `addedBy` int(10) DEFAULT NULL,
  `quota` int(10) NOT NULL DEFAULT 0,
  `BilletLafo` int(10) NOT NULL DEFAULT 0,
  `password` text NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `isAdmin`, `addedBy`, `quota`, `BilletLafo`, `password`, `isConfirmed`) VALUES
(1, 'test@test.com', 'ambinintsoa mananjara herizo', 1, 0, 0, 0, '$2y$10$iatyLXiyOJ.6I0YQMSbgTuO/ajJVaJNPUftOHYBsIQDnFnlQ0fyr.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_billet_tombola` (`idTombola`);

--
-- Indexes for table `billetnum`
--
ALTER TABLE `billetnum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_billetnum_tombola` (`idTombola`);

--
-- Indexes for table `tombola`
--
ALTER TABLE `tombola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billet`
--
ALTER TABLE `billet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billetnum`
--
ALTER TABLE `billetnum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tombola`
--
ALTER TABLE `tombola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `FK_billet_tombola` FOREIGN KEY (`idTombola`) REFERENCES `tombola` (`id`);

--
-- Constraints for table `billetnum`
--
ALTER TABLE `billetnum`
  ADD CONSTRAINT `FK_billetnum_tombola` FOREIGN KEY (`idTombola`) REFERENCES `tombola` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
