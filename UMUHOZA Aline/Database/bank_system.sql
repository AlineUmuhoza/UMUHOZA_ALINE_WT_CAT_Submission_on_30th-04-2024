-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 08:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccountID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `AccountType` varchar(255) DEFAULT NULL,
  `Balance` decimal(10,2) DEFAULT NULL,
  `OpenDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `CustomerID`, `AccountType`, `Balance`, `OpenDate`) VALUES
(1, 1, 'Savings', 1000.00, '2024-02-18'),
(2, 8, 'equity accaunt', 500000.00, '2024-01-11'),
(4, 3, 'bk', 7000000.00, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `BranchID` int(11) NOT NULL,
  `BranchName` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BranchID`, `BranchName`, `Location`) VALUES
(1, 'Main Branch', 'New York'),
(2, 'Downtown Branch', 'Los Angeles'),
(4, 'Nyamata', 'Nyamata'),
(5, 'nyagatare branch', 'nygtr city'),
(6, 'muhanga branch', 'muhanga district'),
(7, 'ngarama branch', 'gatsibo district'),
(8, 'nyamagabe branch', 'nyamagabe town'),
(10, 'gasabo branch', 'kigali');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `ContactNmbr` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `fname`, `lname`, `Adress`, `ContactNmbr`, `Email`, `gender`) VALUES
(2, 'Jane', 'Smith', '456 Elm St, Othertown', '987-654-3210', 'jane@example.com', 'Female'),
(3, 'Alex', 'Johnson', '789 Oak St, Another Town', '555-555-5555', 'alex@example.com', ''),
(4, 'fdfsgz', 'jystgzhn', 'sytaY', '567', 'GDFTYU', 'Male'),
(5, 'twiri', 'azana', 'karongi', '073222872', 'azatwiri@gmail.com', 'Male'),
(6, 'ishimwe', 'foibe', 'kabarore', '078455872', 'foibe@gmail.com', 'Male'),
(7, 'Chris', 'Rutishisha', 'Nyakariro', '07888877665', 'chris@gmail.com', ''),
(13, 'Louange', 'Olga', 'Kigali', '8765', 'johndo@gmail.com', NULL),
(15, 'Louange', 'Olga', 'Kigali', '8765', 'johndo@gmail.com', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `BranchID` int(11) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `FirstName`, `LastName`, `Position`, `BranchID`, `Telephone`, `Email`) VALUES
(1, 'John', 'Doe', 'Manager', 1, '123-456-7890', 'john.doe@example.com'),
(2, 'Jane', 'Smith', 'Sales Associate', 2, '987-654-3210', 'jane.smith@example.com'),
(3, 'Alex', 'Johnson', 'Customer Service Representative', 3, '555-555-5555', 'alex.johnson@example.com'),
(4, 's\\c', 'A|svzcx ', 'vjh', 3, '098765', 'tfsh'),
(5, 'yvonne', 'nana', 'secretariat', 8, '0734567890', 'yvonne@gmail.com'),
(6, 'Jacky', 'UWERA', 'Director', 2, '0788888886', 'jacky@gmail.com'),
(7, 'Jacky', 'UWERA', 'Director', 2, '0788888886', 'jacky@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `LoanType` varchar(255) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `InterestRate` decimal(5,2) DEFAULT NULL,
  `StartDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanID`, `CustomerID`, `LoanType`, `Amount`, `InterestRate`, `StartDate`) VALUES
(1, 1, 'Personal', 5000.00, 5.25, '2024-02-18'),
(2, 6, 'bursely', 500000.00, 50.00, '2023-03-02'),
(4, 2, 'long_term', 1000.00, 300.00, '2022-03-05'),
(5, 2, 'cbsag', 880000.00, 23.00, '2011-01-07'),
(6, 3, 'Long term', 700000.00, 999.99, '2024-04-09'),
(7, 1, 'hgfd', 876.00, 999.99, '2024-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(11) NOT NULL,
  `LoanID` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `LoanID`, `Amount`, `PaymentDate`) VALUES
(1, 1, 500.00, '2024-02-18'),
(2, 2, 1000.00, '2024-02-18'),
(3, 3, 750.00, '2024-02-18'),
(4, 2, 55000.00, '2023-08-04'),
(5, 4, 1000.00, '2024-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `TransactionType` varchar(255) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `TransactionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `AccountID`, `TransactionType`, `Amount`, `TransactionDate`) VALUES
(1, 1, 'Deposit', 1000.00, '2024-02-18'),
(2, 2, 'Withdrawal', 500.00, '2024-02-18'),
(3, 4, 'savings', 10000000.00, '2023-06-01'),
(4, 3, 'long term', 120000.00, '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(4, 'beula', 'uwumugisha', 'uwumugisha', 'beulauwu@gmail.com', '07222111144', '$2y$10$qt/qjklE9QpevK01J9ZheeOcoolyRbAqSxwDLhhyJbHBe8Zkqra5K', '2024-04-23 15:33:22', '544566', 0),
(6, 'Aline', 'UMUHOZA', 'Natacha', 'aline@gmail.com', '0788888888', '$2y$10$5Jdgx/7DDfT8ctnAkSO4weV2kguFgOSJTcZoPzk1j4CPSIVCrmHXW', '2024-04-23 15:44:45', '3443', 0),
(7, 'IRADUKUNDA', 'NEPO', 'IRADUKUNDANEPO69', 'iradukundajeannepomuscene5@gmail.com', '0729198022', '$2y$10$ZqeDdxazr2u8oPYAJMtCl.cA414h2YDg012CaKF33JOtVbgccyxhO', '2024-04-30 03:29:11', '3443', 0),
(8, 'Honore', 'Ntakirutimana', '22224445', 'honore@gmail.com', '07896675432', '$2y$10$AzxQFemAjJ21PgWOzA.sBuUQ4kM4YOkI8MpYMhiHJwtdFALmh6gjG', '2024-04-30 17:21:43', '12345678', 0),
(9, 'Yves', 'Ntakirutimana', 'Tickson', 'yves@gmail.com', '09877654', '$2y$10$834G7rx8Ri2jl8ASQb/RoebwvobMsyZzE.FoTWXSvcYS8//FBTiIW', '2024-04-30 18:01:56', '123445', 0),
(10, 'Elia', 'Ntakirutimana', 'Elie', 'elia@gmail.com', '0987765554', '$2y$10$z7Nh/zjrxRvtE.vvRcGuCuuHktiHhn.V15vL4oLI.rC2HvoKi.Er6', '2024-04-30 18:03:07', '1267889', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `BranchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
