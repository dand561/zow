-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Mai 2016 la 21:49
-- Versiune server: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zowdatabase`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `animals`
--

CREATE TABLE `animals` (
  `ID` int(3) NOT NULL,
  `popular_name` varchar(20) NOT NULL,
  `scientific_name` varchar(20) NOT NULL,
  `family` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `origin` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `climate` varchar(100) NOT NULL,
  `habitate` varchar(350) NOT NULL,
  `dangerousness` varchar(20) NOT NULL,
  `special_prop` varchar(30) NOT NULL,
  `related_species` varchar(100) NOT NULL,
  `enemies` varchar(100) NOT NULL,
  `nourishment` varchar(20) NOT NULL,
  `breeding` varchar(20) NOT NULL,
  `fur` varchar(50) NOT NULL,
  `fur_color` varchar(50) NOT NULL,
  `training` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Salvarea datelor din tabel `animals`
--

INSERT INTO `animals` (`ID`, `popular_name`, `scientific_name`, `family`, `description`, `origin`, `status`, `climate`, `habitate`, `dangerousness`, `special_prop`, `related_species`, `enemies`, `nourishment`, `breeding`, `fur`, `fur_color`, `training`) VALUES
(11, 'Lion', 'Panthera leo', 'Felidae', 'The lion (Panthera leo) is one of the big cats. With some males exceeding 250 kg (550 lb) in weight, it is the second-largest living cat after the tiger. Wild lions currently exist in sub-Saharan Africa and in India. The lion is classified as a vulnerable species by the IUCN, having seen a major population decline in its African range of 30–50% per two decades during the second half of the twentieth century. Lion populations are untenable outside designated reserves and national parks. In the wild, males seldom live longer than 10 to 14 years, as injuries sustained from continual fighting with rival males greatly reduce their longevity. In captivity they can live more than 20 years. Lions are unusually social compared to other cats. A pride of lions consists of related females and offspring and a small number of adult males. Groups of female lions typically hunt together, preying mostly on large ungulates. Lions are apex and keystone predators, although they are also expert scavengers ', 'Africa', 'threatened', 'Dry, Tropical', 'Savanna, Grassland, Bush, Forest', '10', 'None', 'Tiger, Jagual, Leopard, Snow leopard', 'Humans', 'carnivore', 'Mating', 'yes', 'Gold, Brown', 'no'),
(12, 'Jaguar', 'Panthera onca', 'Felidae', 'The jaguar is notable, along with the tiger, as a feline that enjoys swimming. The jaguar is largely a solitary, opportunistic, stalk-and-ambush predator at the top of the food chain (an apex predator). It is a keystone species, playing an important role in stabilizing ecosystems and regulating the populations of the animals it hunts. The jaguar has an exceptionally powerful bite, even relative to the other big cats. This allows it to pierce the shells of armored reptiles and to employ an unusual killing method: it bites directly through the skull of prey between the ears to deliver a fatal bite to the brain.', 'South America', 'threatened', 'Tropical, Moderate', 'Forest, Grassland', '9', 'None', 'Tiger, Lion, Leopard', 'Humans, Anacondas', 'carnivore', 'Mating', 'yes', 'Yellow-brown with black spots', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
