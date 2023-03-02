-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 06:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task` mediumtext NOT NULL,
  `status` enum('0','1','2') DEFAULT '0',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task`, `status`, `created`) VALUES
(0, 'A', '1', '2023-03-02 10:10:50'),
(0, 'aa', '1', '2023-03-02 10:10:55'),
(0, 'gfghdfghd', '1', '2023-03-02 10:11:08'),
(0, 'fghfgh', '1', '2023-03-02 10:11:11'),
(0, 'as', '1', '2023-03-02 10:12:51'),
(0, 'Aman', '1', '2023-03-02 10:13:49'),
(0, 'aaa', '1', '2023-03-02 10:13:57'),
(0, 'a', '1', '2023-03-02 10:13:59'),
(0, 'a', '1', '2023-03-02 10:14:00'),
(0, 'a', '1', '2023-03-02 10:14:01'),
(0, 'fdsdfssd', '1', '2023-03-02 10:16:15'),
(0, 'ff', '1', '2023-03-02 10:21:07'),
(0, 'dfdf', '1', '2023-03-02 10:21:10'),
(0, 'dd', '1', '2023-03-02 10:21:11'),
(0, 'heello', '0', '2023-03-02 10:21:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
