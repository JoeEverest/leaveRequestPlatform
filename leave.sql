-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 01:13 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Jimmy Rubicks', 'jimmy@example.com', '6eea9b7ef19179a06954edd0f6c05ceb'),
(2, 'Ambi The Guy', 'ambi@example.com', '6eea9b7ef19179a06954edd0f6c05ceb'),
(3, 'Anne', 'anne@example.com', '6eea9b7ef19179a06954edd0f6c05ceb');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Marketing'),
(2, 'Accounting'),
(3, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`) VALUES
(1, 'Joseph Everest', 'everestjoseph11@yahoo.com', '6eea9b7ef19179a06954edd0f6c05ceb'),
(2, 'Jack', 'everestjoseph11@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `position` varchar(1000) NOT NULL,
  `department_id` varchar(1000) NOT NULL,
  `employment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `name`, `email`, `position`, `department_id`, `employment_date`) VALUES
(1, 'Jack', 'everestjoseph11@gmail.com', 'Rep', '1', '2007-01-08'),
(2, 'John', 'everestjoseph11@yahoo.com', 'MANAGER', '1', '2005-02-01'),
(3, 'June', 'email@example.com', 'HR', '1', '2012-06-12'),
(4, 'Anne', 'anne@example.com', 'HR', '3', '2014-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `hr_approved_requests`
--

CREATE TABLE `hr_approved_requests` (
  `id` int(11) NOT NULL,
  `request_id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `leave_requested` varchar(1000) NOT NULL,
  `days_approved` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_approved_requests`
--

INSERT INTO `hr_approved_requests` (`id`, `request_id`, `name`, `leave_requested`, `days_approved`, `date`) VALUES
(1, 1, 'Jack', 'Sick Leave', 10, '2019-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `hr_leave_requests`
--

CREATE TABLE `hr_leave_requests` (
  `id` int(11) NOT NULL,
  `request_id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `leave_requested` varchar(1000) NOT NULL,
  `attachments` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_leave_requests`
--

INSERT INTO `hr_leave_requests` (`id`, `request_id`, `name`, `leave_requested`, `attachments`, `department`, `status`) VALUES
(1, 1, 'Jack', 'Sick Leave', 'COMP.docx', 'Marketing', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `max_length` int(100) NOT NULL,
  `leave_condition` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `title`, `max_length`, `leave_condition`) VALUES
(1, 'Sick+Leave', 126, '63+days+with+full+pay%0D%0A63+days+with+half+pay%0D%0AGranted+by+excuse+from+doctor'),
(2, 'Paternity+Leave', 3, 'Wife+gives+birth%2C+Taken+within+first+7+days+of+child+birth'),
(3, 'Compassionate+Leave', 4, 'Death+of+family+members%2C+grand+parents%2C+siblings%2C+parents+%26+children'),
(4, 'Maternity+Leave', 100, '84+days+for+a+single+child%2C+100+for+more+than+one+child.%0D%0ATaken+after+an+employee+works+for+3+years');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `name`, `email`, `password`) VALUES
(1, 'prof', 'prefessor@example.co', '6eea9b7ef19179a06954edd0f6c05ceb'),
(2, 'John', 'everestjoseph11@yahoo.com', '6eea9b7ef19179a06954edd0f6c05ceb'),
(3, 'June', 'email@example.com', '6eea9b7ef19179a06954edd0f6c05ceb');

-- --------------------------------------------------------

--
-- Table structure for table `manager_leave_requests`
--

CREATE TABLE `manager_leave_requests` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `leave_request` varchar(1000) NOT NULL,
  `attachments` varchar(1000) NOT NULL,
  `department` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager_leave_requests`
--

INSERT INTO `manager_leave_requests` (`id`, `employee_name`, `email`, `leave_request`, `attachments`, `department`, `status`) VALUES
(1, 'Jack', 'everestjoseph11@gmail.com', 'Sick Leave', 'COMP.docx', 'Marketing', 'APPROVED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_approved_requests`
--
ALTER TABLE `hr_approved_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_leave_requests`
--
ALTER TABLE `hr_leave_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager_leave_requests`
--
ALTER TABLE `manager_leave_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hr_approved_requests`
--
ALTER TABLE `hr_approved_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_leave_requests`
--
ALTER TABLE `hr_leave_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manager_leave_requests`
--
ALTER TABLE `manager_leave_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
