-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2019 at 10:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'admin', 'digital_library_system', 'admin@digital_libsystem.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `isbn_no` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `count` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `isbn_no`, `category`, `count`) VALUES
(1, 'Star wars', '120-900-89', 'Fiction', '  200'),
(2, 'Business Daily', '120-001-900', 'Business', '10'),
(4, 'Cruel Burdens', '129-009-980', 'Biography', '10'),
(5, 'Javascript Essentials', '125-900-900', 'Computer And Tech', '200'),
(6, 'Dark Matter', '126-900-156-90', 'Science Fiction', '20'),
(7, 'Spinder Man Far From Home', '120-90-980-900', 'Comics', '190'),
(8, 'Basics Of Violins', '100-89-6789-90', 'Arts | Music', '20'),
(9, 'The Rive And The Source', '999-900-99-9567-90', 'Fiction', '20');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `name`, `description`) VALUES
(2, 'Science Fiction', 'Science Fiction is a mind blowing books category.'),
(3, 'Arts | Music', 'Books that contain arts and music '),
(4, 'Business', 'Business related disciplines books'),
(5, 'Comics', 'Comics books are the ones which contains descriptions of animated story'),
(6, 'Computer | Tech', 'Books under this category contains tech based and computer based knowledge'),
(7, 'Fiction', 'Books under this catefgory contain  litretature');

-- --------------------------------------------------------

--
-- Table structure for table `book_issues`
--

CREATE TABLE `book_issues` (
  `id` int(20) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `bookname` varchar(200) NOT NULL,
  `isbn_number` varchar(200) NOT NULL,
  `date_issued` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(20) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `id_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `isbn_no` varchar(200) NOT NULL,
  `date_borrowed` varchar(12) NOT NULL,
  `book_borr_status` varchar(20) NOT NULL,
  `date_returned` varchar(200) NOT NULL,
  `book_return_status` varchar(200) NOT NULL,
  `book_lost_status` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `acc_status` varchar(200) NOT NULL,
  `dpic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `fname`, `lname`, `id_no`, `email`, `username`, `password`, `book_name`, `isbn_no`, `date_borrowed`, `book_borr_status`, `date_returned`, `book_return_status`, `book_lost_status`, `category`, `acc_status`, `dpic`) VALUES
(2, 'Tokyo', 'Drift', 'BSC-MKS-1237-17', 't_drift@gmail.com', 't_drift', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', '', '', '0000-00-00 0', 'Approved', '', 'Approved', 'Approved', '', 'Approved', '1.jpg'),
(3, 'Malcom', 'Merline', '1270001', 'mmerlin@gmail.com', 'Malcom_merlyn', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'Basics Of Violins', '100-89-6789-90', 'Jul Tue 2019', 'Approved', 'Jul Tue 2019', 'Approved', 'Approved', 'Arts | Music', 'Approved', 'm.jpg'),
(4, 'Martin', 'Mbithi', 'BSC-MKS-1237-17', 'martdevelopers254@gmail.com', 'Mart', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', '', '', '', '', '', '', '', '', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `lib_id` int(20) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `national_id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`lib_id`, `fname`, `lname`, `national_id`, `email`, `password`) VALUES
(2, 'Casper', 'Denver', '127001', 'cd@digital_lib.com', '89e495e7941cf9e40e6980d14a16bf023ccd4c91');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issues`
--
ALTER TABLE `book_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`lib_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `lib_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
