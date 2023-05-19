-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2022 at 09:21 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library_db`
--
CREATE DATABASE `library_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_mst`
--

CREATE TABLE IF NOT EXISTS `admin_mst` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(25) NOT NULL,
  `department` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_mst`
--

INSERT INTO `admin_mst` (`id`, `admin_name`, `department`, `username`, `password`) VALUES
(1, 'Madan Mistry', 'BCA', 'madan876', '123456'),
(2, 'Vikash Panchal ', 'BBA', 'vikash123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook_mst`
--

CREATE TABLE IF NOT EXISTS `issuebook_mst` (
  `collage_id` varchar(8) NOT NULL,
  `book1_id` int(6) NOT NULL,
  `book2_id` int(6) NOT NULL,
  `book3_id` int(6) NOT NULL,
  `book4_id` int(6) NOT NULL,
  `book5_id` int(6) NOT NULL,
  `issue_date` date NOT NULL,
  `recieve_date` date NOT NULL,
  `book_status` text NOT NULL,
  `dept` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuebook_mst`
--

INSERT INTO `issuebook_mst` (`collage_id`, `book1_id`, `book2_id`, `book3_id`, `book4_id`, `book5_id`, `issue_date`, `recieve_date`, `book_status`, `dept`) VALUES
('20bca44', 123, 124, 125, 126, 127, '2022-09-13', '2022-09-24', 'Book Recieved', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `lib_register_mst`
--

CREATE TABLE IF NOT EXISTS `lib_register_mst` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `collage_id` varchar(8) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `department` varchar(10) NOT NULL,
  `cell_number` bigint(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `collage_id` (`collage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lib_register_mst`
--

INSERT INTO `lib_register_mst` (`id`, `collage_id`, `student_name`, `department`, `cell_number`, `email`, `username`, `password`) VALUES
(2, '20bca44', 'Madan G Mistry', 'BCA', 7567406673, '20bca44@gmail.com', 'madan999', '202cb962ac59075b964b07152d234b70'),
(3, '20bca45', 'Ricken Mistry', 'BBA', 8573892212, '20bca45@vtcbb.edu.in', 'rickenM11', '202cb962ac59075b964b07152d234b70'),
(4, '20bca140', 'ASHUTOSH UMALE', 'BCA', 1518515519, '20bca140@gmail.com', 'aashutosh', '202cb962ac59075b964b07152d234b70');
