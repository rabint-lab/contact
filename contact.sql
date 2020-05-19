-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2016 at 05:29 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ara20`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'نام',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ایمیل',
  `phone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'شماره تماس',
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'موضوع',
  `text` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'پیام',
  `created_at` int(11) DEFAULT NULL COMMENT 'تاریخ ایجاد',
  `ip` varchar(48) CHARACTER SET ascii DEFAULT NULL COMMENT 'ip ایجاد کننده',
  `user_id` int(11) DEFAULT NULL COMMENT 'شناسه کاربر',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
