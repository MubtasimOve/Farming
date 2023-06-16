-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 11:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtechfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerlist`
--

CREATE TABLE `customerlist` (
  `c_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `expenditure` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerlist`
--

INSERT INTO `customerlist` (`c_id`, `name`, `type`, `gender`, `phone`, `email`, `dob`, `expenditure`) VALUES
('C-001', 'Sydney', 'Customer', 'Female', '016345103', 'syd@sales.com', '1992-07-24', '10000'),
('C_004', 'Nico4', 'Customer', 'Male', '101258652457', 'nico4@customer.com', '2022/08/21', '49368'),
('C_005', 'Nico5', 'Customer', 'Male', '102012250271', 'nico5@customer.com', '2022/08/21', '12939'),
('C_006', 'Nico6', 'Customer', 'Male', '109830219997', 'nico6@customer.com', '2022/08/21', '10273'),
('C_007', 'Nico7', 'Customer', 'Male', '100307462386', 'nico7@customer.com', '2022/08/21', '7747'),
('C_008', 'Nico8', 'Customer', 'Male', '101058862404', 'nico8@customer.com', '2022/08/21', '12486'),
('C_009', 'Nico9', 'Customer', 'Male', '105041770259', 'nico9@customer.com', '2022/08/21', '19553');

-- --------------------------------------------------------

--
-- Table structure for table `farmerlist`
--

CREATE TABLE `farmerlist` (
  `F_ID` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `experience` varchar(50) NOT NULL,
  `NoOfFields` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmerlist`
--

INSERT INTO `farmerlist` (`F_ID`, `name`, `type`, `gender`, `phone`, `email`, `dob`, `experience`, `NoOfFields`, `salary`) VALUES
('F_004', 'Miranda', 'Farmer', 'Female', '104886892895', 'Miranda@farmer.com', '2022-08-17', '21 years', '12', '25313'),
('F_005', 'Ross', 'Farmer', 'Male', '106578689553', 'rossgeller@farmer.com', '2022-08-17', '4 years', '10', '12168'),
('F_006', 'Regina', 'Farmer', 'Female', '101800620168', 'regina@farmer.com', '2022-08-17', '29 years', '1', '27855'),
('F_008', 'George8', 'Farmer', 'Male', '109331496770', 'george8@farmer.com', '2022-08-17', '23 years', '1', '13347'),
('F_009', 'Micheal', 'Farmer', 'Male', '107573140217', 'george9@farmer.com', '2022-08-17', '25 years', '14', '14354'),
('F_010', 'Mcman', 'Farmer', 'Male', '109637568424', 'george10@farmer.com', '2022-08-17', '30 years', '16', '14167'),
('F_011', 'Rachel', 'Farmer', 'Female', '108632833573', 'rachel@farmer.com', '2022-08-17', '1 years', '6', '13738'),
('F_012', 'George12', 'Farmer', 'Male', '104853098486', 'george12@farmer.com', '2022-08-17', '3 years', '2', '11273'),
('F_013', 'George13', 'Farmer', 'Male', '110610456300', 'george13@farmer.com', '2022-08-17', '12 years', '10', '23280');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `productId` varchar(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `unitPrice` varchar(50) NOT NULL,
  `cstatus` varchar(50) NOT NULL,
  `stock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`productId`, `cname`, `unitPrice`, `cstatus`, `stock`) VALUES
('P-001', 'Rice', '40', 'Healthy', '10000'),
('P-002', 'Maize', '20', 'Healthy', '4000'),
('P-003', 'Rice', '32', 'Healthy', '50000'),
('P-004', 'Barley', '240', 'Unhealthy', '10000'),
('P-005', 'Oat', '50', 'Healthy', '2500'),
('P-008', 'Maize', '150', 'Healthy', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `registrationtable`
--

CREATE TABLE `registrationtable` (
  `userID` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `skills` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrationtable`
--

INSERT INTO `registrationtable` (`userID`, `pass`, `name`, `email`, `phone`, `address`, `dob`, `gender`, `degree`, `experience`, `skills`) VALUES
('A-001', '222', 'Sameen Abrar', 'sameenabrar13@gmail.com', '1739274383', 'dhaka', '2022-08-03', 'Male', 'Business Management', '2', ' Inventory'),
('A-002', '123', 'Sameen Abrar', 'sameenabrar13@gmail.com', '01739274384', 'dhaka', '2022-08-09', 'Male', 'Agriculture', '4', ' Data Management Leadership'),
('A-003', '123', 'Sameen Abrar', 'sameenabrar13@gmail.com', '01739274384', 'dhaka', '2022-02-01', 'Male', 'Agriculture', '3', ' Data Inventory Management Leadership Finance'),
('monica', '1234', 'Monica Geller', 'gellerreunion@friends.com', '82634821', 'Manhatten', '1965-06-03', 'Female', 'Business Management', '32', 'Data Leadership IT');

-- --------------------------------------------------------

--
-- Table structure for table `saleslist`
--

CREATE TABLE `saleslist` (
  `s_id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `distribution` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `education` varchar(50) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saleslist`
--

INSERT INTO `saleslist` (`s_id`, `name`, `type`, `distribution`, `gender`, `phone`, `email`, `dob`, `experience`, `education`, `degree`, `salary`) VALUES
('S-001', 'Sydney', 'Salesperson', 'Noakhali', 'Female', '016345103', 'syd@sales.com', '1992-07-24', '13 years', 'Masters', 'Marketing', '30000'),
('S-003', 'Rick', 'Salesperson', 'Kurigram', 'Male', '16345103', 'syd@sales.com', '1982-04-26', '21 years', 'Masters', 'Marketing', '297834'),
('S-004', 'Sameen', 'Farmer', 'edfasf', 'Male', '2345678', 'asdfg@23435.com', '2022-08-01', '21 years', 'sdfs', 'dsv', '1234'),
('S-005', 'Richie', 'Farmer', 'Dhaka', 'Male', '0192371023', 'richie@farmer.com', '2022-02-01', '22 years', 'Bachelors', 'Sales', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `transactionlist`
--

CREATE TABLE `transactionlist` (
  `orderId` varchar(50) NOT NULL,
  `productId` varchar(50) NOT NULL,
  `cropName` varchar(50) NOT NULL,
  `unitPrice` varchar(50) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `cropStatus` varchar(50) NOT NULL,
  `amountOrdered` varchar(50) NOT NULL,
  `orderStatus` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionlist`
--

INSERT INTO `transactionlist` (`orderId`, `productId`, `cropName`, `unitPrice`, `c_id`, `cropStatus`, `amountOrdered`, `orderStatus`, `price`) VALUES
('O_001', 'P-001', 'Wheat', '40', 'C_004', 'Ready', '500', 'Approved', '20000'),
('O_002', 'P-001', 'Wheat', '40', 'C_004', 'Ready', '500', 'Pending', '20000'),
('O_003', 'P-001', 'Wheat', '40', 'C_004', 'Ready', '100', 'Approved', '4000'),
('O_004', 'P-001', 'Wheat', '40', 'C_004', 'Ready', '50', 'Approved', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `UserID` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`UserID`, `Password`, `Name`) VALUES
('A-002', '222', 'Sameen Abrar'),
('A-001', '222', 'Sameen Abrar'),
('A-003', '123', 'Sameen Abrar'),
('monica', '1234', 'Monica Geller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerlist`
--
ALTER TABLE `customerlist`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `farmerlist`
--
ALTER TABLE `farmerlist`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `registrationtable`
--
ALTER TABLE `registrationtable`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `saleslist`
--
ALTER TABLE `saleslist`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `transactionlist`
--
ALTER TABLE `transactionlist`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `FK_CID` (`c_id`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD KEY `FK_USERID` (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactionlist`
--
ALTER TABLE `transactionlist`
  ADD CONSTRAINT `FK_CID` FOREIGN KEY (`c_id`) REFERENCES `customerlist` (`c_id`),
  ADD CONSTRAINT `transactionlist_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `inventory` (`productId`);

--
-- Constraints for table `usertable`
--
ALTER TABLE `usertable`
  ADD CONSTRAINT `FK_USERID` FOREIGN KEY (`UserID`) REFERENCES `registrationtable` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
