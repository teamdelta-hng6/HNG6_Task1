-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2019 at 02:55 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `useraccount`
--
CREATE DATABASE `useraccount` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `useraccount`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Fullname` varchar(40) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `UserID` int(10) NOT NULL auto_increment,
  PRIMARY KEY  (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Fullname`, `Username`, `Email`, `Password`, `UserID`) VALUES
('Oyemade Olufemi', 'pharmtex08', 'pharmtex08@yahoo.com', 'femsoft08', 1),
('Oyemade Olufemi', 'pharmtex85', 'pharmtex08@hotmail.com', 'femsoft008', 2),
('Oyemade Olufemi', 'pharmtex008', 'pharmtex08@gmail.com', 'femsoft008', 3);
