-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 12:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doucovani`
--

-- --------------------------------------------------------

--
-- Table structure for table `doucuje`
--

CREATE TABLE `doucuje` (
  `doucuje_ID` int(11) NOT NULL,
  `doucuvatel` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `predmet_ID` int(11) NOT NULL,
  `datum_od` date NOT NULL,
  `datum_do` date NOT NULL,
  `cena_hod` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `douc_pred`
--

CREATE TABLE `douc_pred` (
  `pred_ID` int(11) NOT NULL,
  `douc_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `douc_pred`
--

INSERT INTO `douc_pred` (`pred_ID`, `douc_ID`) VALUES
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lekce`
--

CREATE TABLE `lekce` (
  `lekce_ID` int(11) NOT NULL,
  `doucovatel_ID` int(11) NOT NULL,
  `datum_cas_od` datetime NOT NULL,
  `datum_cas_do` datetime NOT NULL,
  `popis_lekce` varchar(150) NOT NULL,
  `probehlo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `predmety`
--

CREATE TABLE `predmety` (
  `predID` int(11) NOT NULL,
  `nazev` varchar(20) NOT NULL,
  `popis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `predmety`
--

INSERT INTO `predmety` (`predID`, `nazev`, `popis`) VALUES
(1, 'test', 'trtrtr'),
(2, 'test2', 'trtrtr'),
(3, '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertab`
--

CREATE TABLE `usertab` (
  `ID` int(11) NOT NULL,
  `Jmeno` varchar(35) NOT NULL,
  `Prijmeni` varchar(40) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Heslo` varchar(15) NOT NULL,
  `Tel` varchar(15) NOT NULL,
  `Adresa` varchar(50) NOT NULL,
  `typuzi` varchar(2) NOT NULL,
  `rodicEma` varchar(30) NOT NULL,
  `rodicTel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertab`
--

INSERT INTO `usertab` (`ID`, `Jmeno`, `Prijmeni`, `Email`, `Heslo`, `Tel`, `Adresa`, `typuzi`, `rodicEma`, `rodicTel`) VALUES
(2, 'ad', 'dada', 'da@d', 'da', 'ad', 'dae', 'd', '1515', 'flex'),
(3, 'ad', 'da', 'bla@bla.blfancy', 'ad', 'da', 'dae', 'a', '1515', 'flex'),
(4, 'bla', 'da', 'bla2@bla.blfancy', 'ad', 'da', 'rerer', 's', '1515', 'flex');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doucuje`
--
ALTER TABLE `doucuje`
  ADD PRIMARY KEY (`doucuje_ID`);

--
-- Indexes for table `douc_pred`
--
ALTER TABLE `douc_pred`
  ADD PRIMARY KEY (`pred_ID`,`douc_ID`);

--
-- Indexes for table `predmety`
--
ALTER TABLE `predmety`
  ADD PRIMARY KEY (`predID`);

--
-- Indexes for table `usertab`
--
ALTER TABLE `usertab`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doucuje`
--
ALTER TABLE `doucuje`
  MODIFY `doucuje_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `predmety`
--
ALTER TABLE `predmety`
  MODIFY `predID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertab`
--
ALTER TABLE `usertab`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
