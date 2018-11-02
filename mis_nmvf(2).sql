-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 12:15 PM
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
(1, '10212', 'Narayani', 'chitwane', '2018-10-30 07:28:43', NULL),
(2, '1212', 'India', 'India', '2018-11-01 11:01:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `did` int(11) NOT NULL,
  `nameen` varchar(150) DEFAULT NULL,
  `namenp` varchar(150) NOT NULL,
  `code` varchar(50) NOT NULL,
  `district_thm` char(1) NOT NULL,
  `zoneid` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`did`, `nameen`, `namenp`, `code`, `district_thm`, `zoneid`, `created_at`, `entered_by`) VALUES
(1, 'Chitwan', 'Chitwan', '056', 'T', '1', '2018-10-31 02:32:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expert_type`
--

CREATE TABLE `expert_type` (
  `etid` int(11) NOT NULL,
  `pid` varchar(15) NOT NULL,
  `nameen` varchar(50) DEFAULT NULL,
  `namenp` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expert_type`
--

INSERT INTO `expert_type` (`etid`, `pid`, `nameen`, `namenp`, `created_at`, `entered_by`) VALUES
(1, '2', 'chitwan', 'chitwane', '2018-10-30 07:28:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `mid` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `nameen` varchar(150) DEFAULT NULL,
  `namenp` varchar(150) NOT NULL,
  `districtid` varchar(11) NOT NULL,
  `election_no` varchar(50) DEFAULT NULL,
  `approved` int(1) NOT NULL DEFAULT '1',
  `disabled` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`mid`, `code`, `nameen`, `namenp`, `districtid`, `election_no`, `approved`, `disabled`, `created_at`, `entered_by`) VALUES
(1, '10212', 'Bharatpur Municipality', 'Bharatpur Municipality', '1', NULL, 0, 0, '2018-10-31 05:49:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization_str`
--

CREATE TABLE `organization_str` (
  `orgid` int(11) NOT NULL,
  `nameen` varchar(150) NOT NULL,
  `namenp` varchar(150) NOT NULL,
  `code` varchar(50) NOT NULL,
  `orgtypeid` varchar(11) NOT NULL,
  `districtid` varchar(11) NOT NULL,
  `vdc` varchar(100) NOT NULL,
  `wardno` int(2) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `houseno` varchar(20) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `parent_orgid` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization_str`
--

INSERT INTO `organization_str` (`orgid`, `nameen`, `namenp`, `code`, `orgtypeid`, `districtid`, `vdc`, `wardno`, `street`, `houseno`, `latitude`, `longitude`, `phone`, `fax`, `email`, `website`, `parent_orgid`, `created_at`, `entered_by`) VALUES
(1, 'Saipal Technologies pvt.  ltd.', 'Saipal Technologies pvt.  ltd.', '10212', '1', '1', 'Bharatpur', 20, 'Chanauli', '512 A', '82.556744564', '26.234233234', '056-121232', '056-2433445', 'info@saipal.org', 'saipaltech.com', '0', '2018-10-31 10:48:49', NULL);

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
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `namenp` varchar(150) NOT NULL,
  `nameen` varchar(150) NOT NULL,
  `level` int(2) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '1' COMMENT 'yes -> 1; no -> 0 ;',
  `disabled` int(1) NOT NULL DEFAULT '0' COMMENT 'yes -> 1; no -> 0 ;',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `namenp`, `nameen`, `level`, `approved`, `disabled`, `created_at`, `entered_by`) VALUES
(1, 'लेखापाल', 'Accountant', 6, 1, 0, '2018-10-31 08:18:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `pcid` varchar(11) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '1',
  `disabled` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `product_name`, `description`, `pcid`, `approved`, `disabled`, `created_at`, `entered_by`) VALUES
(1, 'graha', 'Nothing to say', '2', 1, 0, '2018-10-31 05:49:25', NULL),
(2, 'Yagya', 'Nothing to say', '1', 1, 0, '2018-11-01 06:59:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pcid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `approved` int(1) NOT NULL DEFAULT '1',
  `disabled` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pcid`, `name`, `description`, `approved`, `disabled`, `created_at`, `entered_by`) VALUES
(1, 'TM', 'TMNEPAL1', 1, 0, '2018-11-01 06:08:54', NULL),
(2, 'TM', 'TMNEPAL', 1, 0, '2018-11-01 06:09:30', NULL);

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
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `staffid` int(11) NOT NULL,
  `nameen` varchar(150) NOT NULL,
  `namenp` varchar(150) NOT NULL,
  `employeeno` varchar(50) DEFAULT NULL,
  `orgid` varchar(11) NOT NULL,
  `gender` int(1) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `post` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `approved` int(1) DEFAULT '1',
  `disabled` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entered_by` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`staffid`, `nameen`, `namenp`, `employeeno`, `orgid`, `gender`, `dob`, `post`, `mobile`, `phone`, `email`, `approved`, `disabled`, `created_at`, `entered_by`) VALUES
(1, 'Saipal Technologies pvt.  ltd.', 'Saipal Technologies pvt.  ltd.', '10212', '1', 0, '20', 'Chanauli', '512 A', '056-121232', 'info@saipal.org', 1, 0, '2018-10-31 10:48:49', NULL);

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
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `expert_type`
--
ALTER TABLE `expert_type`
  ADD PRIMARY KEY (`etid`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `organization_str`
--
ALTER TABLE `organization_str`
  ADD PRIMARY KEY (`orgid`);

--
-- Indexes for table `org_type`
--
ALTER TABLE `org_type`
  ADD PRIMARY KEY (`orgtypeid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pcid`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`staffid`);

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expert_type`
--
ALTER TABLE `expert_type`
  MODIFY `etid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_str`
--
ALTER TABLE `organization_str`
  MODIFY `orgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_type`
--
ALTER TABLE `org_type`
  MODIFY `orgtypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
