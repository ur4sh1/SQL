-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 08:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tribunal`
--

-- --------------------------------------------------------

--
-- Table structure for table `audiencia`
--

CREATE TABLE `audiencia` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `valor` decimal(8,2) DEFAULT NULL,
  `juiz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audiencia`
--

INSERT INTO `audiencia` (`id`, `data`, `valor`, `juiz`) VALUES
(1, '2020-01-12', '15000.00', 1),
(2, '2020-02-13', '97000.00', 1),
(3, '2020-03-14', '99220.00', 2),
(4, '2020-05-10', '19880.00', 2),
(5, '2020-06-09', '18877.00', 2),
(6, '2020-06-09', '17888.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `juiz`
--

CREATE TABLE `juiz` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `juiz`
--

INSERT INTO `juiz` (`id`, `nome`) VALUES
(1, 'Josmar Oliveira'),
(2, 'Lana Len'),
(3, 'Marisvaldo Pinheiro');

-- --------------------------------------------------------

--
-- Table structure for table `processo`
--

CREATE TABLE `processo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `requerente` int(11) DEFAULT NULL,
  `requerido` int(11) DEFAULT NULL,
  `id_audiencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `processo`
--

INSERT INTO `processo` (`id`, `nome`, `requerente`, `requerido`, `id_audiencia`) VALUES
(1, 'Coca-Cola vs Pepsi', 6, 7, 1),
(2, 'Bandeirantes vs Monalisa', 5, 3, 2),
(3, 'João Silva vs Ricardo', 1, 2, 3),
(4, 'Andre Zack vs Bandeirantes', 4, 5, 4),
(5, 'Bandeirantes vs Pepsi', 5, 7, 5),
(6, 'Pepsi vs Monalisa', 7, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `requerente`
--

CREATE TABLE `requerente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tipo` varchar(4) DEFAULT NULL,
  `num` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requerente`
--

INSERT INTO `requerente` (`id`, `nome`, `tipo`, `num`) VALUES
(1, 'João Silva', 'CPF', '654.245.685-15'),
(2, 'Ricardo Moira', 'CPF', '559.478.147-19'),
(3, 'Monalisa Costa', 'CPF', '872.245.685-35'),
(4, 'Andre Zack', 'CPF', '485.247.147-78'),
(5, 'Bandeirantes', 'CNPJ', '14.238.570\0001-29'),
(6, 'Coca-COla', 'CNPJ', '15.654.570\0002-35'),
(7, 'Pepsi', 'CNPJ', '18.754.570\0702-97');

-- --------------------------------------------------------

--
-- Table structure for table `requerido`
--

CREATE TABLE `requerido` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tipo` varchar(4) DEFAULT NULL,
  `num` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requerido`
--

INSERT INTO `requerido` (`id`, `nome`, `tipo`, `num`) VALUES
(1, 'João Silva', 'CPF', '654.245.685-15'),
(2, 'Ricardo Moira', 'CPF', '559.478.147-19'),
(3, 'Monalisa Costa', 'CPF', '872.245.685-35'),
(4, 'Andre Zack', 'CPF', '485.247.147-78'),
(5, 'Bandeirantes', 'CNPJ', '14.238.570\0001-29'),
(6, 'Coca-COla', 'CNPJ', '15.654.570\0002-35'),
(7, 'Pepsi', 'CNPJ', '18.754.570\0702-97');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audiencia`
--
ALTER TABLE `audiencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juiz`
--
ALTER TABLE `juiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requerente`
--
ALTER TABLE `requerente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requerido`
--
ALTER TABLE `requerido`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audiencia`
--
ALTER TABLE `audiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `juiz`
--
ALTER TABLE `juiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `processo`
--
ALTER TABLE `processo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requerente`
--
ALTER TABLE `requerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requerido`
--
ALTER TABLE `requerido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
