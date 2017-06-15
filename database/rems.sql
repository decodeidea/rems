-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 05:57 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rems`
--

-- --------------------------------------------------------

--
-- Table structure for table `dc_appearance`
--

CREATE TABLE IF NOT EXISTS `dc_appearance` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `logo` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_appearance`
--

INSERT INTO `dc_appearance` (`id`, `name`, `logo`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Real Estate Management System', '57e8e71225c76-original_-_Copy.png', '0000-00-00 00:00:00', '2017-05-27 19:48:57', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_area`
--

CREATE TABLE IF NOT EXISTS `dc_area` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `area_size` int(11) DEFAULT NULL,
  `address` text,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_area`
--

INSERT INTO `dc_area` (`id`, `name`, `area_size`, `address`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'dadas', 423432, 'lorem ipsum dolor amet', '2017-05-29 15:20:12', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_area_album`
--

CREATE TABLE IF NOT EXISTS `dc_area_album` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `caption` varchar(45) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_area_album`
--

INSERT INTO `dc_area_album` (`id`, `area_id`, `filename`, `caption`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 1, 'IMG_2027.jpg', 'a', '2017-05-29 15:34:13', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_customer`
--

CREATE TABLE IF NOT EXISTS `dc_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `no_ktp` varchar(45) NOT NULL,
  `no_npwp` varchar(45) NOT NULL,
  `pekerjaan` varchar(45) NOT NULL,
  `nama_kantor` varchar(45) NOT NULL,
  `alamat_kantor` text NOT NULL,
  `photo` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_modifier` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_customer`
--

INSERT INTO `dc_customer` (`id`, `name`, `gender`, `date_of_birth`, `address`, `phone`, `email`, `no_ktp`, `no_npwp`, `pekerjaan`, `nama_kantor`, `alamat_kantor`, `photo`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Ilham Mudzakir', 'Male', '2017-06-15 00:00:00', 'gfgd', '543534', 'ilhamudzakir@gmail.com', '065114430', '37289', 'dada', 'hdask', 'gfdgfd', 'IMG_0056.JPG', '2017-06-15 17:06:54', '2017-06-15 17:06:54', 1, 1),
(2, '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '2017-06-15 22:48:35', '2017-06-15 22:48:35', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_customer_album`
--

CREATE TABLE IF NOT EXISTS `dc_customer_album` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `caption` varchar(200) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_default`
--

CREATE TABLE IF NOT EXISTS `dc_default` (
  `id` int(100) NOT NULL,
  `name_group` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_groups`
--

CREATE TABLE IF NOT EXISTS `dc_groups` (
  `id` int(100) NOT NULL,
  `name_group` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_groups`
--

INSERT INTO `dc_groups` (`id`, `name_group`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Super Admin', '2017-04-13 12:29:39', NULL, 1, NULL),
(5, 'Admin', '2017-04-13 15:24:27', NULL, 1, NULL),
(6, 'Sales', '2017-06-15 14:06:58', NULL, 1, NULL),
(7, 'Atasan', '2017-06-15 14:07:06', NULL, 1, NULL),
(8, 'Chasier', '2017-06-15 14:07:16', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_icons`
--

CREATE TABLE IF NOT EXISTS `dc_icons` (
  `id` int(100) NOT NULL,
  `name_icons` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_icons`
--

INSERT INTO `dc_icons` (`id`, `name_icons`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'fa fa-file-text', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 'icon-custom-home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 'icon-custom-thumb', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(4, 'icon-custom-settings', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(5, 'fa fa-adjust', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 'fa fa-anchor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(7, 'fa fa-archive', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 'fa fa-arrows', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(9, 'fa fa-arrows-h', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(10, 'fa fa-arrows-v', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(11, 'fa fa-asterisk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(12, 'fa fa-ban', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(13, 'fa fa-bar-chart-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(14, 'fa fa-barcode', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(15, 'fa fa-bars', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(16, 'fa fa-beer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(17, 'fa fa-bell', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(18, 'fa fa-bell-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(19, 'fa fa-bolt', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(20, 'fa fa-book', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(21, 'fa fa-bookmark', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(22, 'fa fa-bookmark-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(23, 'fa fa-briefcase', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(24, 'fa fa-bug', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(25, 'fa fa-building-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(26, 'fa fa-bullhorn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(27, 'fa fa-bullseye', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(28, 'fa fa-calendar', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(29, 'fa fa-calendar-o', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(30, 'fa fa-camera', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(31, 'fa fa-envelope', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dc_kontrak`
--

CREATE TABLE IF NOT EXISTS `dc_kontrak` (
  `id` int(11) NOT NULL,
  `kontrak_type_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment_scheme_id` int(11) NOT NULL,
  `no_kontrak` varchar(45) NOT NULL,
  `price` bigint(20) NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `sisa_hutang` bigint(20) NOT NULL,
  `is_signed` tinyint(4) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_kontrak`
--

INSERT INTO `dc_kontrak` (`id`, `kontrak_type_id`, `customer_id`, `sales_id`, `payment_scheme_id`, `no_kontrak`, `price`, `date_end`, `sisa_hutang`, `is_signed`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(13, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 0, '2017-06-15 17:48:18', '2017-06-15 17:48:18', 1, 1),
(14, 1, 1, 3, 1, '00000014', 7879879, NULL, 7878559, 0, '2017-06-15 17:49:58', '2017-06-15 17:49:58', 1, 1),
(15, 1, 1, 3, 1, '00000015', 7879879, NULL, 7878879, 0, '2017-06-15 17:52:02', '2017-06-15 17:52:02', 1, 1),
(16, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 0, NULL, '2017-06-15 22:34:19', NULL, 1),
(17, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 0, NULL, '2017-06-15 22:34:52', NULL, 1),
(18, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 0, NULL, '2017-06-15 22:36:09', NULL, 1),
(19, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 0, NULL, '2017-06-15 22:36:51', NULL, 1),
(20, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 1, NULL, '2017-06-15 22:37:52', NULL, 1),
(21, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 1, NULL, '2017-06-15 22:37:54', NULL, 1),
(22, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 1, NULL, '2017-06-15 22:37:54', NULL, 1),
(23, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 1, NULL, '2017-06-15 22:37:55', NULL, 1),
(24, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 1, NULL, '2017-06-15 22:38:10', NULL, 1),
(25, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 1, NULL, '2017-06-15 22:38:12', NULL, 1),
(26, 1, 1, 3, 1, '00000013', 7879879, NULL, 6879879, 1, NULL, '2017-06-15 22:42:30', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_kontrak_payment_record`
--

CREATE TABLE IF NOT EXISTS `dc_kontrak_payment_record` (
  `id` int(11) NOT NULL,
  `kontrak_payment_schedule_id` int(11) NOT NULL,
  `no_invoice` char(9) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_kontrak_payment_schedule`
--

CREATE TABLE IF NOT EXISTS `dc_kontrak_payment_schedule` (
  `id` int(11) NOT NULL,
  `kontrak_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `jatuh_tempo` datetime NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `nominal_paid` bigint(20) NOT NULL,
  `date_payment` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_kontrak_payment_schedule`
--

INSERT INTO `dc_kontrak_payment_schedule` (`id`, `kontrak_id`, `payment_type`, `title`, `jatuh_tempo`, `nominal`, `nominal_paid`, `date_payment`, `status`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 15, 1, 'Booking Fee', '2017-06-15 17:52:02', 1000, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:02', NULL, 1, NULL),
(2, 15, 2, 'DP - 1', '2017-07-15 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(3, 15, 2, 'DP - 2', '2017-08-14 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(4, 15, 2, 'DP - 3', '2017-09-13 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(5, 15, 2, 'DP - 4', '2017-10-13 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(6, 15, 2, 'DP - 5', '2017-11-12 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(7, 15, 2, 'DP - 6', '2017-12-12 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(8, 15, 2, 'DP - 7', '2018-01-11 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(9, 15, 2, 'DP - 8', '2018-02-10 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(10, 15, 2, 'DP - 9', '2018-03-12 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(11, 15, 2, 'DP - 10', '2018-04-11 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(12, 15, 2, 'DP - 11', '2018-05-11 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(13, 15, 2, 'DP - 12', '2018-06-10 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(14, 15, 2, 'DP - 13', '2018-07-10 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(15, 15, 2, 'DP - 14', '2018-08-09 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(16, 15, 2, 'DP - 15', '2018-09-08 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(17, 15, 2, 'DP - 16', '2018-10-08 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(18, 15, 2, 'DP - 17', '2018-11-07 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(19, 15, 2, 'DP - 18', '2018-12-07 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(20, 15, 2, 'DP - 19', '2019-01-06 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(21, 15, 2, 'DP - 20', '2019-02-05 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(22, 15, 2, 'DP - 21', '2019-03-07 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(23, 15, 2, 'DP - 22', '2019-04-06 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(24, 15, 2, 'DP - 23', '2019-05-06 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(25, 15, 2, 'DP - 24', '2019-06-05 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(26, 15, 2, 'DP - 25', '2019-07-05 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(27, 15, 2, 'DP - 26', '2019-08-04 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(28, 15, 2, 'DP - 27', '2019-09-03 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(29, 15, 2, 'DP - 28', '2019-10-03 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(30, 15, 2, 'DP - 29', '2019-11-02 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(31, 15, 2, 'DP - 30', '2019-12-02 00:00:00', 1365842, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:03', NULL, 1, NULL),
(32, 15, 3, 'Cicilan pertama - 1', '2020-01-01 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(33, 15, 3, 'Cicilan pertama - 2', '2020-01-31 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(34, 15, 3, 'Cicilan pertama - 3', '2020-03-01 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(35, 15, 3, 'Cicilan pertama - 4', '2020-03-31 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(36, 15, 3, 'Cicilan pertama - 5', '2020-04-30 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(37, 15, 3, 'Cicilan pertama - 6', '2020-05-30 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(38, 15, 3, 'Cicilan pertama - 7', '2020-06-29 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(39, 15, 3, 'Cicilan pertama - 8', '2020-07-29 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(40, 15, 3, 'Cicilan pertama - 9', '2020-08-28 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(41, 15, 3, 'Cicilan pertama - 10', '2020-09-27 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(42, 15, 3, 'Cicilan pertama - 11', '2020-10-27 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(43, 15, 3, 'Cicilan pertama - 12', '2020-11-26 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(44, 15, 3, 'Cicilan pertama - 13', '2020-12-26 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(45, 15, 3, 'Cicilan pertama - 14', '2021-01-25 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(46, 15, 3, 'Cicilan pertama - 15', '2021-02-24 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(47, 15, 3, 'Cicilan pertama - 16', '2021-03-26 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(48, 15, 3, 'Cicilan pertama - 17', '2021-04-25 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(49, 15, 3, 'Cicilan pertama - 18', '2021-05-25 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(50, 15, 3, 'Cicilan pertama - 19', '2021-06-24 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(51, 15, 3, 'Cicilan pertama - 20', '2021-07-24 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(52, 15, 3, 'Cicilan pertama - 21', '2021-08-23 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(53, 15, 3, 'Cicilan pertama - 22', '2021-09-22 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(54, 15, 3, 'Cicilan pertama - 23', '2021-10-22 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(55, 15, 3, 'Cicilan pertama - 24', '2021-11-21 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(56, 15, 3, 'Cicilan pertama - 25', '2021-12-21 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(57, 15, 3, 'Cicilan pertama - 26', '2022-01-20 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(58, 15, 3, 'Cicilan pertama - 27', '2022-02-19 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(59, 15, 3, 'Cicilan pertama - 28', '2022-03-21 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(60, 15, 3, 'Cicilan pertama - 29', '2022-04-20 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(61, 15, 3, 'Cicilan pertama - 30', '2022-05-20 00:00:00', 1470894, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:04', NULL, 1, NULL),
(62, 15, 3, 'cicilan kedua - 1', '2022-06-19 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(63, 15, 3, 'cicilan kedua - 2', '2022-07-19 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(64, 15, 3, 'cicilan kedua - 3', '2022-08-18 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(65, 15, 3, 'cicilan kedua - 4', '2022-09-17 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(66, 15, 3, 'cicilan kedua - 5', '2022-10-17 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(67, 15, 3, 'cicilan kedua - 6', '2022-11-16 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(68, 15, 3, 'cicilan kedua - 7', '2022-12-16 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(69, 15, 3, 'cicilan kedua - 8', '2023-01-15 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(70, 15, 3, 'cicilan kedua - 9', '2023-02-14 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(71, 15, 3, 'cicilan kedua - 10', '2023-03-16 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(72, 15, 3, 'cicilan kedua - 11', '2023-04-15 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(73, 15, 3, 'cicilan kedua - 12', '2023-05-15 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(74, 15, 3, 'cicilan kedua - 13', '2023-06-14 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(75, 15, 3, 'cicilan kedua - 14', '2023-07-14 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(76, 15, 3, 'cicilan kedua - 15', '2023-08-13 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(77, 15, 3, 'cicilan kedua - 16', '2023-09-12 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(78, 15, 3, 'cicilan kedua - 17', '2023-10-12 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(79, 15, 3, 'cicilan kedua - 18', '2023-11-11 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(80, 15, 3, 'cicilan kedua - 19', '2023-12-11 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(81, 15, 3, 'cicilan kedua - 20', '2024-01-10 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(82, 15, 3, 'cicilan kedua - 21', '2024-02-09 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(83, 15, 3, 'cicilan kedua - 22', '2024-03-10 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(84, 15, 3, 'cicilan kedua - 23', '2024-04-09 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(85, 15, 3, 'cicilan kedua - 24', '2024-05-09 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(86, 15, 3, 'cicilan kedua - 25', '2024-06-08 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(87, 15, 3, 'cicilan kedua - 26', '2024-07-08 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(88, 15, 3, 'cicilan kedua - 27', '2024-08-07 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(89, 15, 3, 'cicilan kedua - 28', '2024-09-06 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(90, 15, 3, 'cicilan kedua - 29', '2024-10-06 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL),
(91, 15, 3, 'cicilan kedua - 30', '2024-11-05 00:00:00', 1444631, 0, '0000-00-00 00:00:00', 0, '2017-06-15 17:52:05', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_kontrak_type`
--

CREATE TABLE IF NOT EXISTS `dc_kontrak_type` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_kontrak_type`
--

INSERT INTO `dc_kontrak_type` (`id`, `name`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Cicilan', '2017-05-30 15:06:49', NULL, 1, NULL),
(2, 'KPA', '2017-05-30 15:06:57', NULL, 1, NULL),
(3, 'Cash Keras', '2017-05-30 15:07:04', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_kontrak_unit`
--

CREATE TABLE IF NOT EXISTS `dc_kontrak_unit` (
  `id` int(11) NOT NULL,
  `kontrak_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_kontrak_unit`
--

INSERT INTO `dc_kontrak_unit` (`id`, `kontrak_id`, `unit_id`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(16, 13, 1, NULL, NULL, NULL, NULL),
(19, 15, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_menu`
--

CREATE TABLE IF NOT EXISTS `dc_menu` (
  `id` int(100) NOT NULL,
  `name_menu` varchar(1000) NOT NULL,
  `sub_menu` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `position` int(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_menu`
--

INSERT INTO `dc_menu` (`id`, `name_menu`, `sub_menu`, `target`, `icon`, `position`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Content', '0', 'admin_content', 'icon-custom-thumb', 1, '0000-00-00 00:00:00', '2017-04-13 11:13:46', 0, 1),
(2, 'Static Page', '1', 'static_page', '', 1, '2017-04-06 10:24:25', '2017-04-06 12:29:26', 1, 1),
(3, 'Settings System', '0', 'setting_system', 'icon-custom-settings', 3, '2017-04-13 00:00:00', '0000-00-00 00:00:00', 1, 0),
(4, 'Menu', '3', 'menu', '', 1, '2017-04-13 00:00:00', '2017-04-13 00:00:00', 1, 0),
(6, 'User Accsess', '3', 'user_accsess', 'fa fa-bars', 3, '0000-00-00 00:00:00', '2017-04-13 11:15:14', 0, 1),
(7, 'User Groups', '3', 'user_groups', 'none', 4, '2017-04-13 11:15:03', NULL, 1, NULL),
(8, 'User', '3', 'user', 'none', 2, '2017-04-16 18:04:14', NULL, 1, NULL),
(9, 'News', '1', 'news', 'none', 2, '2017-04-17 13:23:58', NULL, 1, NULL),
(10, 'appearance', '3', 'appearance', 'none', 5, '2017-04-17 14:31:03', NULL, 1, NULL),
(11, 'Message', '0', 'message', 'fa fa-envelope', 2, '0000-00-00 00:00:00', '2017-04-17 15:58:18', 0, 1),
(12, 'Inbox', '11', 'inbox', 'none', 1, '2017-04-17 16:05:07', NULL, 1, NULL),
(13, 'Compose', '11', 'compose', 'none', 2, '2017-04-17 16:05:40', NULL, 1, NULL),
(14, 'Banner', '1', 'banner', 'none', 3, '2017-04-22 16:51:32', NULL, 1, NULL),
(15, 'Atasan', '0', 'atasan', 'fa fa-envelope', 0, '2017-05-27 20:25:59', NULL, 1, NULL),
(16, 'Pengajuan Harga Approve', '15', 'pengajuan_harga_approve', 'none', 1, '2017-05-27 20:28:02', NULL, 1, NULL),
(17, 'Chasier', '0', 'chasier', 'fa fa-bell-o', 0, '2017-05-27 20:30:29', NULL, 1, NULL),
(18, 'Payment', '17', 'payment', 'none', 1, '2017-05-27 20:30:48', NULL, 1, NULL),
(19, 'Kontrak', '17', 'kontrak', 'none', 2, '2017-05-27 20:31:07', NULL, 1, NULL),
(20, 'Customer', '0', 'customer', 'fa fa-adjust', 0, '0000-00-00 00:00:00', '2017-05-27 20:34:54', 0, 1),
(21, 'List Customer', '20', 'customer', 'none', 1, '2017-05-27 20:35:46', NULL, 1, NULL),
(22, 'Finance', '0', 'finance', 'icon-custom-settings', 1, '0000-00-00 00:00:00', '2017-05-27 20:38:04', 0, 1),
(23, 'Unit', '0', 'unit', 'fa fa-arrows', 0, '2017-05-28 20:11:07', NULL, 1, NULL),
(24, 'List Unit', '23', 'list_unit', 'none', 1, '2017-05-29 14:19:13', NULL, 1, NULL),
(25, 'Area', '23', 'area', 'none', 2, '2017-05-29 14:51:00', NULL, 1, NULL),
(26, 'Unit Type', '23', 'unit_type', 'none', 3, '2017-05-29 14:51:19', NULL, 1, NULL),
(27, 'Rekening', '22', 'list_rekening', 'none', 1, '0000-00-00 00:00:00', '2017-05-30 13:23:40', 0, 1),
(28, 'Contract Type', '22', 'contract_type', 'none', 2, '0000-00-00 00:00:00', '2017-05-30 14:50:12', 0, 1),
(29, 'Payment Type', '22', 'payment_type', 'none', 3, '2017-05-30 15:49:15', NULL, 1, NULL),
(30, 'Denah', '23', 'denah', 'none', 1, '2017-06-14 23:56:08', NULL, 1, NULL),
(31, 'Sales', '0', 'sales', 'fa fa-building-o', 0, '2017-06-15 00:02:34', NULL, 1, NULL),
(32, 'Denah', '31', 'denah', 'none', 1, '2017-06-15 00:04:25', NULL, 1, NULL),
(33, 'Payment Scheme', '22', 'payment_scheme', 'none', 3, '2017-06-15 17:07:43', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_menu_accsess`
--

CREATE TABLE IF NOT EXISTS `dc_menu_accsess` (
  `id` int(100) NOT NULL,
  `id_menu` int(100) NOT NULL,
  `id_group` int(100) NOT NULL,
  `accsess` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_menu_accsess`
--

INSERT INTO `dc_menu_accsess` (`id`, `id_menu`, `id_group`, `accsess`) VALUES
(12, 1, 0, 0),
(13, 2, 0, 1),
(14, 3, 0, 0),
(15, 4, 0, 0),
(16, 6, 0, 0),
(17, 7, 0, 0),
(18, 1, 1, 1),
(19, 2, 1, 1),
(20, 3, 1, 1),
(21, 4, 1, 1),
(22, 6, 1, 1),
(23, 7, 1, 1),
(24, 1, 5, 0),
(25, 2, 5, 0),
(26, 3, 5, 0),
(27, 4, 5, 0),
(28, 6, 5, 0),
(29, 7, 5, 0),
(30, 8, 1, 1),
(31, 9, 1, 1),
(32, 9, 5, 0),
(33, 8, 5, 0),
(34, 10, 1, 1),
(35, 11, 1, 1),
(36, 12, 1, 1),
(37, 13, 1, 1),
(38, 14, 1, 1),
(39, 14, 5, 0),
(40, 10, 5, 0),
(41, 11, 5, 0),
(42, 12, 5, 0),
(43, 13, 5, 0),
(44, 15, 1, 1),
(45, 16, 1, 1),
(46, 17, 1, 1),
(47, 18, 1, 1),
(48, 19, 1, 1),
(49, 20, 1, 1),
(50, 15, 5, 0),
(51, 16, 5, 0),
(52, 17, 5, 0),
(53, 18, 5, 0),
(54, 19, 5, 0),
(55, 20, 5, 0),
(56, 21, 1, 1),
(57, 21, 5, 1),
(58, 22, 1, 1),
(59, 23, 1, 1),
(60, 22, 5, 0),
(61, 23, 5, 0),
(62, 24, 1, 1),
(63, 25, 1, 1),
(64, 26, 1, 1),
(65, 27, 1, 1),
(66, 28, 1, 1),
(67, 29, 1, 1),
(68, 30, 1, 1),
(69, 31, 1, 1),
(70, 32, 1, 1),
(71, 33, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_payment_scheme`
--

CREATE TABLE IF NOT EXISTS `dc_payment_scheme` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `kontrak_type` int(11) NOT NULL,
  `bunga` decimal(5,2) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_payment_scheme`
--

INSERT INTO `dc_payment_scheme` (`id`, `title`, `kontrak_type`, `bunga`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Cicilan 2 thn', 1, '17.00', '2017-06-15 17:09:09', '2017-06-15 17:09:09', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_payment_scheme_detail`
--

CREATE TABLE IF NOT EXISTS `dc_payment_scheme_detail` (
  `id` int(11) NOT NULL,
  `payment_scheme_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tenor` int(11) NOT NULL,
  `interval` int(11) NOT NULL,
  `persentase` decimal(9,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_payment_scheme_detail`
--

INSERT INTO `dc_payment_scheme_detail` (`id`, `payment_scheme_id`, `payment_type_id`, `title`, `tenor`, `interval`, `persentase`) VALUES
(1, 1, 2, 'DP', 30, 30, '10.00'),
(2, 1, 3, 'Cicilan pertama', 30, 30, '50.00'),
(3, 1, 3, 'cicilan kedua', 30, 30, '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `dc_payment_type`
--

CREATE TABLE IF NOT EXISTS `dc_payment_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_payment_type`
--

INSERT INTO `dc_payment_type` (`id`, `title`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Booking Fee', '2017-05-30 16:01:29', NULL, 1, NULL),
(2, 'DP', NULL, '2017-05-30 16:02:32', NULL, 1),
(3, 'Cicilan', NULL, '2017-05-30 16:02:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_pemasukan_record`
--

CREATE TABLE IF NOT EXISTS `dc_pemasukan_record` (
  `id` int(11) NOT NULL,
  `no_invoice` char(9) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `kontrak_payment_record_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_pengajuan_harga`
--

CREATE TABLE IF NOT EXISTS `dc_pengajuan_harga` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_atasan` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `tlp` varchar(45) NOT NULL,
  `instansi` varchar(200) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `approved_nominal` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_pengajuan_harga_unit`
--

CREATE TABLE IF NOT EXISTS `dc_pengajuan_harga_unit` (
  `id` int(11) NOT NULL,
  `pengajuan_harga_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_rekening`
--

CREATE TABLE IF NOT EXISTS `dc_rekening` (
  `id` int(11) NOT NULL,
  `no_rek` varchar(45) NOT NULL,
  `bank` varchar(45) NOT NULL,
  `atas_nama` varchar(45) NOT NULL,
  `saldo` bigint(20) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_rekening`
--

INSERT INTO `dc_rekening` (`id`, `no_rek`, `bank`, `atas_nama`, `saldo`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, '1050063888899', 'Mandiri Medan Cab. Taman Setiabudi', 'PT. Decodeidea', 0, '2017-05-30 14:18:08', NULL, 1, NULL),
(2, '301300888889', 'BTN Medan Cab. Pemuda', 'PT. Decodeidea', 0, NULL, '2017-05-30 14:37:41', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_unit`
--

CREATE TABLE IF NOT EXISTS `dc_unit` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `unit_type` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `luas_netto` decimal(4,2) DEFAULT NULL,
  `luas_semigross` decimal(4,2) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `block` varchar(45) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `struktur` varchar(45) DEFAULT NULL,
  `lantai` varchar(45) DEFAULT NULL,
  `dapur` varchar(45) DEFAULT NULL,
  `listrik` varchar(45) DEFAULT NULL,
  `dinding` varchar(45) DEFAULT NULL,
  `pintu` varchar(45) DEFAULT NULL,
  `sanitasi` varchar(45) DEFAULT NULL,
  `jendela` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_unit`
--

INSERT INTO `dc_unit` (`id`, `area_id`, `unit_type`, `name`, `luas_netto`, `luas_semigross`, `number`, `block`, `price`, `struktur`, `lantai`, `dapur`, `listrik`, `dinding`, `pintu`, `sanitasi`, `jendela`, `status`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 1, 1, 'dsjh', '99.99', '0.00', 7, NULL, 7879879, 'jkh', 'hkj', 'hhjk', 'khj', 'jkh', 'hk', 'hjk', 'hkj', NULL, '2017-05-29 20:18:12', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_unit_album`
--

CREATE TABLE IF NOT EXISTS `dc_unit_album` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `caption` varchar(45) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_unit_type`
--

CREATE TABLE IF NOT EXISTS `dc_unit_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `color` varchar(200) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_unit_type`
--

INSERT INTO `dc_unit_type` (`id`, `name`, `color`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'type 5', '#000', '2017-05-29 15:45:36', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_user`
--

CREATE TABLE IF NOT EXISTS `dc_user` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `photo` text NOT NULL,
  `user_group` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(10) NOT NULL,
  `id_modifier` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_user`
--

INSERT INTO `dc_user` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `photo`, `user_group`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'admins', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'webei', '16807164_1234243823400398_1687302977082263434_n.jpg', 1, '0000-00-00 00:00:00', '2017-04-17 00:12:22', 0, 1),
(2, 'ilhamudzakir', '81dc9bdb52d04dc20036dbd8313ed055', 'ilhamudzakir@gmail.com', 'ilham', 'mudzakir', '20161201_6435.jpg', 5, '2017-04-17 01:54:09', NULL, 1, NULL),
(3, 'sales', '9ed083b1436e5f40ef984b28255eef18', 'sales@sales.com', 'Sales', 'Coba', 'traxex-drow-ranger-dota-2-hd-wallpaper--busya_sama-1366x768.jpg', 6, '2017-06-15 17:11:17', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dc_appearance`
--
ALTER TABLE `dc_appearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_area`
--
ALTER TABLE `dc_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_area_album`
--
ALTER TABLE `dc_area_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_customer`
--
ALTER TABLE `dc_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_customer_album`
--
ALTER TABLE `dc_customer_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_default`
--
ALTER TABLE `dc_default`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_groups`
--
ALTER TABLE `dc_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_icons`
--
ALTER TABLE `dc_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_kontrak`
--
ALTER TABLE `dc_kontrak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_kontrak_payment_record`
--
ALTER TABLE `dc_kontrak_payment_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_kontrak_payment_schedule`
--
ALTER TABLE `dc_kontrak_payment_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_kontrak_type`
--
ALTER TABLE `dc_kontrak_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_kontrak_unit`
--
ALTER TABLE `dc_kontrak_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_menu`
--
ALTER TABLE `dc_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_menu_accsess`
--
ALTER TABLE `dc_menu_accsess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_payment_scheme`
--
ALTER TABLE `dc_payment_scheme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_payment_scheme_detail`
--
ALTER TABLE `dc_payment_scheme_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_payment_type`
--
ALTER TABLE `dc_payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_pemasukan_record`
--
ALTER TABLE `dc_pemasukan_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_pengajuan_harga`
--
ALTER TABLE `dc_pengajuan_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_pengajuan_harga_unit`
--
ALTER TABLE `dc_pengajuan_harga_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_rekening`
--
ALTER TABLE `dc_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_unit`
--
ALTER TABLE `dc_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_unit_album`
--
ALTER TABLE `dc_unit_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_unit_type`
--
ALTER TABLE `dc_unit_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc_user`
--
ALTER TABLE `dc_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dc_appearance`
--
ALTER TABLE `dc_appearance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_area`
--
ALTER TABLE `dc_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_area_album`
--
ALTER TABLE `dc_area_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_customer`
--
ALTER TABLE `dc_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dc_customer_album`
--
ALTER TABLE `dc_customer_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_default`
--
ALTER TABLE `dc_default`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_groups`
--
ALTER TABLE `dc_groups`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dc_icons`
--
ALTER TABLE `dc_icons`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `dc_kontrak`
--
ALTER TABLE `dc_kontrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `dc_kontrak_payment_record`
--
ALTER TABLE `dc_kontrak_payment_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_kontrak_payment_schedule`
--
ALTER TABLE `dc_kontrak_payment_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `dc_kontrak_type`
--
ALTER TABLE `dc_kontrak_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dc_kontrak_unit`
--
ALTER TABLE `dc_kontrak_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `dc_menu`
--
ALTER TABLE `dc_menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `dc_menu_accsess`
--
ALTER TABLE `dc_menu_accsess`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `dc_payment_scheme`
--
ALTER TABLE `dc_payment_scheme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_payment_scheme_detail`
--
ALTER TABLE `dc_payment_scheme_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dc_payment_type`
--
ALTER TABLE `dc_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dc_pemasukan_record`
--
ALTER TABLE `dc_pemasukan_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_pengajuan_harga`
--
ALTER TABLE `dc_pengajuan_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_pengajuan_harga_unit`
--
ALTER TABLE `dc_pengajuan_harga_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_rekening`
--
ALTER TABLE `dc_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dc_unit`
--
ALTER TABLE `dc_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_unit_album`
--
ALTER TABLE `dc_unit_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_unit_type`
--
ALTER TABLE `dc_unit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_user`
--
ALTER TABLE `dc_user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
