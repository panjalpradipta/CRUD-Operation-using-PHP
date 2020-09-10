-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 09:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `empDept` (IN `department` VARCHAR(50))  BEGIN
select ename,dept from employee where dept=department;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `enameWithA` (OUT `enameA` INT)  BEGIN
SELECT ename FROM employee where ename like 'A%';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rangeSal` (IN `salLow` INT, IN `salHigh` INT)  BEGIN
select ename,sal from employee where sal BETWEEN salLow and salHigh;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `sal` double NOT NULL,
  `dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `ename`, `sal`, `dept`) VALUES
(1, 'Pradipta panjal', 25000, 'developer'),
(2, 'Sirshendu Dey', 27000, 'developer'),
(3, 'Ayan saha', 22000, 'testing'),
(4, 'Saranjit Sarkar', 20000, 'marketing'),
(6, 'Anamika Roy', 19600, 'Testing');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `before_employee_delete` BEFORE DELETE ON `employee` FOR EACH ROW BEGIN
INSERT INTO employee_log VALUES (old.id, old.ename, old.sal, old.dept);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_employee_update` BEFORE UPDATE ON `employee` FOR EACH ROW BEGIN
INSERT INTO employee_log VALUES (old.id, old.ename, old.sal, old.dept);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_log`
--

CREATE TABLE `employee_log` (
  `id` int(11) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `sal` double NOT NULL,
  `dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_log`
--

INSERT INTO `employee_log` (`id`, `ename`, `sal`, `dept`) VALUES
(4, 'Saranjit Sarkar', 19000, 'marketing'),
(5, 'Anamika Roy', 25600, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'regular',
  `accountCreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `contact`, `email`, `password`, `age`, `gender`, `role`, `accountCreatedAt`) VALUES
(5, 'Pradipta Panjal', '9876523456', 'panjal.pradipta@gmail.com', '*241237C019C0D4228BDD6E0206F457261EC9DE85', 26, 'Male', 'admin', '2020-09-10 07:30:18'),
(6, 'Triasha Manna', '8241255725', 'triasha178@gmail.com', '*3541E58A2C00FFA9D1ACA6261079FE2B072EC1A7', 24, 'Female', 'regular', '2020-09-10 07:31:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_log`
--
ALTER TABLE `employee_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
