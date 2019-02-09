-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 07:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try`
--

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` varchar(5) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `songname` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `picture_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `artist`, `songname`, `album`, `path`, `picture_path`) VALUES
('SG002', 'BLACKPINK', 'AS IF IT`S YOUR LAST', 'Square Up', 'BLACKPINK - AS IF IT`S YOUR LAST.mp3', 'SquareUp.png'),
('SG003', 'BLACKPINK', 'DDU-DU DDU-DU', 'Square Up', 'BLACKPINK - DDU-DU DDU-DU.mp3', 'SquareUp.png'),
('SG004', 'BLACKPINK', 'FOREVER YOUNG', 'Square Up', 'BLACKPINK - FOREVER YOUNG.mp3', 'SquareUp.png'),
('SG005', 'Ed Sheeran', 'Give Me Love', 'Divide', 'Ed Sheeran - Give Me Love.mp3', 'Divide.png'),
('SG006', 'Ed Sheeran', 'Afire Love', 'Divide', 'Ed Sheeran - Afire Love.mp3', 'Divide.png'),
('SG007', 'Ed Sheeran', 'Happier', 'Divide', 'Ed Sheeran - Happier.mp3', 'Divide.png'),
('SG008', 'Ed Sheeran', 'Perfect', 'Divide', 'Ed Sheeran - Perfect.mp3', 'Divide.png'),
('SG009', 'Ed Sheeran', 'Shape of You', 'Divide', 'Ed Sheeran - Shape of You.mp3', 'Divide.png'),
('SG010', 'Ed Sheeran', 'Thinking Out Loud', 'Divide', 'Ed Sheeran - Thinking Out Loud.mp3', 'Divide.png'),
('SG011', 'JENNIE', 'SOLO', 'Solo', 'JENNIE - SOLO.mp3', ''),
('SG012', 'TWICE', 'DANCE THE NIGHT AWAY', 'Summer Nights', 'TWICE - DANCE THE NIGHT AWAY.mp3', 'Summer Nights.jpg'),
('SG013', 'TWICE', 'Heart Shaker', 'Twicetagram', 'TWICE - Heart Shaker.mp3', 'Twicetagram.png'),
('SG014', 'TWICE', 'LIKEY', 'Twicetagram', 'TWICE - LIKEY.mp3', 'Twicetagram.png'),
('SG015', 'TWICE', 'YES OR YES', 'Yes or Yes', 'TWICE - YES OR YES.mp3', 'Yes-or-Yes.jpg'),
('SG016', 'TWICE', 'What is Love', 'What is Love ?', 'TWICE What is Love.mp3', 'WhatIsLove.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` varchar(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `surename` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `username`, `surename`, `password`) VALUES
('US001', 'am', 'William', 'am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
