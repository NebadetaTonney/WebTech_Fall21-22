-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 04:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khaboi`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`) VALUES
('Employee1', 'employee@gmail.com', 'employee123', 'employee123', '1998-12-07', 'male'),
('Tonney Test', 'tonney@gmail.com', 'tonney123', 'tonney123', '1998-12-15', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`ID`, `Name`, `Price`) VALUES
(1, 'Subs Hook & Ladder Sandwich', 600),
(2, 'Pepperoni Pizza', 1200),
(3, 'Cheeseburger', 250),
(4, 'Chicken Honey Butter Biscuits', 55);

-- --------------------------------------------------------

--
-- Table structure for table `owner_info`
--

CREATE TABLE `owner_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_info`
--

INSERT INTO `owner_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`) VALUES
('Nibedita Tonney ', 'tonney@gmail.com', 'tonney1234', 'tonney1234', '1998-12-13', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`) VALUES
('Sara Test', 'sara@gmail.com', 'Saratest', 'Saratest', '1995-01-16', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Emp_User_Name` (`User_Name`),
  ADD UNIQUE KEY `Emp_Email` (`Email`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owner_info`
--
ALTER TABLE `owner_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `User_Name` (`User_Name`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `User_Name` (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
