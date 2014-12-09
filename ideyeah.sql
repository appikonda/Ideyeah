-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2011 at 12:45 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ideyeah`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(5) NOT NULL AUTO_INCREMENT,
  `idea_id` int(4) NOT NULL,
  `user_id` int(3) NOT NULL,
  `comment_content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `idea_id` (`idea_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `idea_id`, `user_id`, `comment_content`, `date`) VALUES
(1, 1, 6, 'Nice idea.', '2011-05-05 04:55:20'),
(2, 1, 6, 'I think it is saleable', '2011-05-05 05:10:20'),
(3, 1, 7, 'I am ready to sponsor!', '2011-05-05 05:45:39'),
(4, 2, 7, 'Excellent!', '2011-05-05 05:46:01'),
(5, 4, 7, 'I am part of this group!', '2011-05-05 05:46:19'),
(6, 5, 7, 'Very nice idea!', '2011-05-05 05:48:21'),
(7, 5, 6, 'Pretty kewl idea.', '2011-05-05 05:49:02'),
(8, 1, 8, 'This is probably the lamest idea ever.', '2011-05-05 06:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE IF NOT EXISTS `ideas` (
  `idea_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `idea_title` text NOT NULL,
  `idea_content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idea_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`idea_id`, `user_id`, `idea_title`, `idea_content`, `status`, `date`) VALUES
(1, 6, 'Let Me Know!', 'Crowd sourced, content driven iPhone application. Please help me brainstorming this idea.', 1, '2011-05-05 03:25:32'),
(2, 6, 'Get Well Quick', 'Smartphone application to help create a platform between the Hospitals and the Patients!', 1, '2011-05-05 03:37:04'),
(4, 6, 'My Gear', 'Ability to check how certain images look on articles, T-shirts, mugs etc', 1, '2011-05-05 03:40:05'),
(5, 7, 'iPod Watch Strap', 'Use your watch strap to hold your iPod nano', 1, '2011-05-05 05:47:12'),
(6, 8, 'IdeYeah', 'An idea can change your life. That is the motto of the project. Where there is a problem, there is a scope for a new Idea. That is the base for the IdeYeah project', 1, '2011-05-05 06:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

DROP TABLE IF EXISTS `login_info`;
CREATE TABLE IF NOT EXISTS `login_info` (
  `user_id` int(3) NOT NULL COMMENT 'FKEY from USERS',
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `activated` tinyint(1) NOT NULL COMMENT 'BOOL: 1 = yes 0 = no',
  PRIMARY KEY (`username`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`user_id`, `username`, `password`, `activated`) VALUES
(7, 'anooprao', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, 'arrowgunz', 'e10adc3949ba59abbe56e057f20f883e', 1),
(9, 'bhavani', 'e10adc3949ba59abbe56e057f20f883e', 1),
(8, 'soujanya', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `bio` text,
  `url` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `bio`, `url`) VALUES
(6, 'Mohnish', 'Thallavajhula', 'I was born Awesome!', 'http://mohni.sh'),
(7, 'Anoop Rao', 'Paidipally', 'Graduate Stud!', 'http://anooprao.com'),
(8, 'Soujanya', 'Siddavaram', 'I own Ideyeah.me', 'http://ideyeah.me'),
(9, 'Bhavani', 'Reddy', 'Student from India currently pursuing Masters in WKU.', 'http://ideyeah.me');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`idea_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_info`
--
ALTER TABLE `login_info`
  ADD CONSTRAINT `login_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
