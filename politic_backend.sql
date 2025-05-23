-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 23, 2025 at 08:32 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `politic_backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID_Feedback` int(11) NOT NULL,
  `Name_Pseudo` varchar(50) NOT NULL DEFAULT 'John Doe',
  `Email` text NOT NULL,
  `DoB` date NOT NULL,
  `Region` text NOT NULL,
  `Feedback_type` text NOT NULL,
  `Commentary` longtext NOT NULL,
  `Sources` longtext NOT NULL,
  `Contact` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To store feedback forms';

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID_Feedback`, `Name_Pseudo`, `Email`, `DoB`, `Region`, `Feedback_type`, `Commentary`, `Sources`, `Contact`) VALUES
(1, 'totoletoto', 'toto@gmail.com', '2025-04-03', 'IDF', 'Content', 'ayayayayayyayaya', 'toto.com', 1),
(2, 'test', 'test@gmail.com', '2010-12-28', 'Province', 'Content', 'i\'m just here to test the feedback thing', 'totototo', 0),
(3, 'test2', 'test2@mail.com', '2010-07-08', 'Overseas', 'Content', 'aaaaaa', 'bbb.com.fr.lol', 1),
(4, 'test2', 'test2@mail.com', '2010-07-08', 'Overseas', 'Content', 'aaaaaa', 'bbb.com.fr.lol', 1),
(5, 'grgfdgd', 'fdsfsdf@mail.com', '2010-08-04', 'Foreign', 'Technical', 'it sucks', 'myself', 1),
(6, 'Raphaël Lesterlin', 'tata@mail.com', '2010-12-28', 'Overseas', 'Content', 'I love your websitr xoxo', 'evian', 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ID_Image` int(11) NOT NULL,
  `Path` text NOT NULL,
  `Alt` text NOT NULL,
  `Source` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID_Image`, `Path`, `Alt`, `Source`) VALUES
(1, 'images/Hazebrouck.jfif', 'Image of Laurent Hazebrouck smiling.', 'This person does not exist'),
(2, 'images/De_Langlade.jfif', 'Image of De Langlade béchu doing a poker face.', 'This person does not exist');

-- --------------------------------------------------------

--
-- Table structure for table `politician`
--

CREATE TABLE `politician` (
  `ID_Politician` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL DEFAULT 'John',
  `Last_Name` varchar(50) NOT NULL DEFAULT 'Doe',
  `Party` varchar(50) NOT NULL DEFAULT 'IND',
  `DoB` date NOT NULL,
  `Mandates` text NOT NULL,
  `Condemnations` longtext NOT NULL,
  `Scandals` longtext NOT NULL,
  `CoI` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Les fameuses fiches';

--
-- Dumping data for table `politician`
--

INSERT INTO `politician` (`ID_Politician`, `First_Name`, `Last_Name`, `Party`, `DoB`, `Mandates`, `Condemnations`, `Scandals`, `CoI`) VALUES
(1, 'Laurent', 'Hazebrouck', 'IND', '1976-11-30', 'Mayor of Villeneuve-sur-les-Bains (2000-2011), MP for 11th constituency du Bocage (2011-ongoing)', 'Embezzlment of EU grants (2024), Collusion (2012)', 'Sexual misconduct with actress Laura Lyndon Baines Johnson.', 'Worked for Big Big Bank (1997-2005).'),
(2, 'Estrée', 'De Langlade Béchu', 'Ensemble contre la République', '1954-06-07', 'Mayor of Rczeczpolita (1986-2004), Senator for Mont-Tonnerre (2004-2024)', 'Ecocide (2019), Arson (2022)', 'Copacabana affair : with other members of parliament, used work indeminity to pay for financial services in Mexico from 1990 to 2007.', 'None at the time of writing.');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `ID_Source` int(11) NOT NULL,
  `ID_Politician` int(11) NOT NULL,
  `Link` longtext NOT NULL,
  `Source_Name` varchar(50) NOT NULL,
  `Title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='to list sources';

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`ID_Source`, `ID_Politician`, `Link`, `Source_Name`, `Title`) VALUES
(1, 1, 'https://www.lemonde.fr/societe/article/2025/04/16/attaques-de-prisons-des-actions-de-natures-tres-diverses-qui-sement-le-doute-sur-les-motivations-de-leurs-auteurs_6596643_3224.html', 'Le Monde', 'Massive Corruption Network Discovered in EU Parliament'),
(2, 2, 'https://www.lemonde.fr/politique/article/2025/04/16/congres-du-ps-philippe-brun-le-jeune-socialiste-qui-se-revait-elephant_6596638_823448.html', 'Le Monde', 'Copacabana Affair : Trials and Tribulation of High Ranking MP'),
(3, 2, 'https://www.rfi.fr/fr/science/20191214-ecocide-crime-planete-environnement-droit-justice', 'RFI', 'De Langlade Béchu, the mysterious arsonist'),
(4, 2, 'https://video.corriere.it/cronaca/incontro-con-lo-staff-del-gemelli-il-papa-ringrazia-la-rettrice-dell-ateneo-quando-comandano-le-donne-le-cose-vanno/c4f43fac-090a-4eaa-9d19-9c1a114b4xlk', 'Corriere della Sera', 'Assault charges dropped against french MP'),
(5, 2, 'https://www.theguardian.com/world/2024/jan/30/uk-perceived-as-more-corrupt-lowest-score-global-index-transparency-international', 'The Guardian', 'The Grandiose Ecocide of a French Senate Veep'),
(6, 2, 'https://www.letemps.ch/suisse/face-aux-intemperies-le-valais-se-prepare-a-une-nuit-d-incertitudes', 'Le Temps', 'De Langlade Béchu, a Chaotic Standoff'),
(8, 1, 'https://www.courrierinternational.com/article/en-estonie-l-eglise-orthodoxe-doit-couper-ses-liens-avec-moscou-sous-peine-de-proces_229961', 'Courrier International', 'Leneuve case : 30 convicted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID_Feedback`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID_Image`);

--
-- Indexes for table `politician`
--
ALTER TABLE `politician`
  ADD PRIMARY KEY (`ID_Politician`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`ID_Source`),
  ADD KEY `ID_Politician` (`ID_Politician`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID_Feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `politician`
--
ALTER TABLE `politician`
  MODIFY `ID_Politician` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `ID_Source` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sources`
--
ALTER TABLE `sources`
  ADD CONSTRAINT `fff` FOREIGN KEY (`ID_Politician`) REFERENCES `politician` (`ID_Politician`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
