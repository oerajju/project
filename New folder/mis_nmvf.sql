-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 12:22 PM
-- Server version: 5.7.16-log
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis_nmvf`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `cid` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `nameen` varchar(50) DEFAULT NULL,
  `namenp` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cid`, `code`, `nameen`, `namenp`, `created_at`, `entered_by`) VALUES
(1, '101', 'chitwan', 'chitwane', '2018-10-30 07:28:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_type`
--

CREATE TABLE `org_type` (
  `orgtypeid` int(11) NOT NULL,
  `nameen` varchar(100) DEFAULT NULL,
  `namenp` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '1' COMMENT 'yes = 1; no = 0 ;',
  `disabled` int(1) NOT NULL DEFAULT '0' COMMENT 'yes = 1; no = 0 ;',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `org_type`
--

INSERT INTO `org_type` (`orgtypeid`, `nameen`, `namenp`, `code`, `approved`, `disabled`, `created_at`, `entered_by`) VALUES
(1, 'aaaaaaaaaa', 'aaaaaaaaaaaaa', '101', 1, 0, '2018-10-30 09:47:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `rid` int(11) NOT NULL,
  `countryid` varchar(11) NOT NULL,
  `nameen` varchar(150) DEFAULT NULL,
  `namenp` varchar(150) NOT NULL,
  `code` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`rid`, `countryid`, `nameen`, `namenp`, `code`, `created_at`, `entered_by`) VALUES
(1, '1', 'Eastern', 'Eastern', '102', '2018-10-30 10:23:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zid` int(11) NOT NULL,
  `nameen` varchar(150) DEFAULT NULL,
  `namenp` varchar(150) NOT NULL,
  `code` varchar(50) NOT NULL,
  `regionid` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zid`, `nameen`, `namenp`, `code`, `regionid`, `created_at`, `entered_by`) VALUES
(1, 'Narayani', 'Narayani', '101', '1', '2018-10-30 10:52:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `org_type`
--
ALTER TABLE `org_type`
  ADD PRIMARY KEY (`orgtypeid`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_type`
--
ALTER TABLE `org_type`
  MODIFY `orgtypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
