-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 09:26 PM
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
(6, '2020-06-09', '17888.00', 3),
(7, '2020-05-11', '19777.00', 4),
(8, '2021-01-01', '97885.00', 4),
(9, '2021-02-08', '74805.00', 1),
(10, '2021-02-02', '97654.00', 4),
(11, '2022-03-01', '10000.00', 2),
(12, '2021-04-18', '90000.00', 2),
(13, '2021-02-07', '97654.00', 4),
(14, '2022-03-01', '80000.00', 4),
(15, '2021-04-02', '95000.00', 2);

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
(3, 'Marisvaldo Pinheiro'),
(4, 'Sergio Moro'),
(5, 'Lana Len'),
(6, 'Hastarorvick'),
(7, 'Mark Zuck'),
(8, 'Lorrane Alves'),
(9, 'Jackson'),
(10, 'Rufus'),
(11, 'Viviane'),
(12, 'Valentine'),
(13, 'Ricardo'),
(14, 'Caio Cersar'),
(15, 'Cesar tompson');

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
(6, 'Pepsi vs Monalisa', 7, 3, 6),
(7, 'Pepsi vs Farma Flex', 7, 15, 7),
(8, 'Coca-Cola vs Bemol', 6, 8, 8),
(9, 'Cherlock Holmes vs Monalisa', 11, 3, 9),
(10, 'Carrefour vs Leonardo Tonks', 8, 10, 10),
(11, 'AMD vs NETFLIX', 14, 13, 11),
(12, 'Google vs Santo Remedio', 13, 14, 12),
(13, 'Leandro Marfim vs Moises Limão', 9, 9, 13),
(14, 'João Silva vs Moises Limão', 1, 9, 14),
(15, 'Bandeirantes vs Bemol', 5, 8, 15);

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
(7, 'Pepsi', 'CNPJ', '18.754.570\0702-97'),
(8, 'Carrefour', 'CNPJ', '18.854.570\0002-47'),
(9, 'Leandro Marfim', 'CPF', '987.500.574-12'),
(10, 'Charles', 'CPF', '888.245.005-14'),
(11, 'Cherlock Holmes', 'CPF', '666.570.574-37'),
(12, 'Maycon Man', 'CPF', '248.321.984-47'),
(13, 'Google', 'CNPJ', '57.854.6571002-78'),
(14, 'AMD', 'CNPJ', '78.878.570\0072-22'),
(15, 'NVidia', 'CNPJ', '18.821.5704402-33');

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
(7, 'Pepsi', 'CNPJ', '18.754.570\0702-97'),
(8, 'BEMOL', 'CNPJ', '17.854.9907802-50'),
(9, 'Moises Limão', 'CPF', '124.550.574-41'),
(10, 'Leonardo Tonks', 'CPF', '587.245.048-10'),
(11, 'Marcelo Moraes', 'CPF', '114.028.874-37'),
(12, 'Junior Jr', 'CPF', '446.388.747-63'),
(13, 'NETFLIX', 'CNPJ', '12.754.8578802-27'),
(14, 'SANTO REMEDIO', 'CNPJ', '27.788.500\0001-01'),
(15, 'FARMA FLEX', 'CNPJ', '91.132.4708882-11');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `juiz`
--
ALTER TABLE `juiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `processo`
--
ALTER TABLE `processo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requerente`
--
ALTER TABLE `requerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requerido`
--
ALTER TABLE `requerido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
