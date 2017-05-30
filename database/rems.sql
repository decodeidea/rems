-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 11:03 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rems`
--

-- --------------------------------------------------------

--
-- Table structure for table `dc_appearance`
--

CREATE TABLE `dc_appearance` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `logo` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_appearance`
--

INSERT INTO `dc_appearance` (`id`, `name`, `logo`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Real Estate Management System', '57e8e71225c76-original_-_Copy.png', '0000-00-00 00:00:00', '2017-05-27 19:48:57', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_area`
--

CREATE TABLE `dc_area` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `area_size` int(11) DEFAULT NULL,
  `address` text,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_area`
--

INSERT INTO `dc_area` (`id`, `name`, `area_size`, `address`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'dadas', 423432, 'lorem ipsum dolor amet', '2017-05-29 15:20:12', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_area_album`
--

CREATE TABLE `dc_area_album` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `caption` varchar(45) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_area_album`
--

INSERT INTO `dc_area_album` (`id`, `area_id`, `filename`, `caption`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 1, 'IMG_2027.jpg', 'a', '2017-05-29 15:34:13', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_customer`
--

CREATE TABLE `dc_customer` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_customer_album`
--

CREATE TABLE `dc_customer_album` (
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

CREATE TABLE `dc_default` (
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

CREATE TABLE `dc_groups` (
  `id` int(100) NOT NULL,
  `name_group` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_groups`
--

INSERT INTO `dc_groups` (`id`, `name_group`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'Super Admin', '2017-04-13 12:29:39', NULL, 1, NULL),
(5, 'Admin', '2017-04-13 15:24:27', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_icons`
--

CREATE TABLE `dc_icons` (
  `id` int(100) NOT NULL,
  `name_icons` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `id_creator` int(250) NOT NULL,
  `id_modifier` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `dc_kontrak` (
  `id` int(11) NOT NULL,
  `kontrak_type_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment_scheme_id` int(11) NOT NULL,
  `no_kontrak` varchar(45) NOT NULL,
  `price` bigint(20) NOT NULL,
  `date_end` datetime NOT NULL,
  `sisa_hutang` bigint(20) NOT NULL,
  `is_signed` tinyint(4) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_kontrak_payment_record`
--

CREATE TABLE `dc_kontrak_payment_record` (
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

CREATE TABLE `dc_kontrak_payment_schedule` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_kontrak_type`
--

CREATE TABLE `dc_kontrak_type` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `dc_kontrak_unit` (
  `id` int(11) NOT NULL,
  `kontrak_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_menu`
--

CREATE TABLE `dc_menu` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(29, 'Payment Type', '22', 'payment_type', 'none', 3, '2017-05-30 15:49:15', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_menu_accsess`
--

CREATE TABLE `dc_menu_accsess` (
  `id` int(100) NOT NULL,
  `id_menu` int(100) NOT NULL,
  `id_group` int(100) NOT NULL,
  `accsess` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(67, 29, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dc_payment_scheme`
--

CREATE TABLE `dc_payment_scheme` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `kontrak_type` int(11) NOT NULL,
  `bunga` decimal(5,2) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_payment_scheme_detail`
--

CREATE TABLE `dc_payment_scheme_detail` (
  `id` int(11) NOT NULL,
  `payment_scheme_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tenor` int(11) NOT NULL,
  `interval` int(11) NOT NULL,
  `persentase` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dc_payment_type`
--

CREATE TABLE `dc_payment_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `dc_pemasukan_record` (
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

CREATE TABLE `dc_pengajuan_harga` (
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

CREATE TABLE `dc_pengajuan_harga_unit` (
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

CREATE TABLE `dc_rekening` (
  `id` int(11) NOT NULL,
  `no_rek` varchar(45) NOT NULL,
  `bank` varchar(45) NOT NULL,
  `atas_nama` varchar(45) NOT NULL,
  `saldo` bigint(20) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `dc_unit` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_unit`
--

INSERT INTO `dc_unit` (`id`, `area_id`, `unit_type`, `name`, `luas_netto`, `luas_semigross`, `number`, `block`, `price`, `struktur`, `lantai`, `dapur`, `listrik`, `dinding`, `pintu`, `sanitasi`, `jendela`, `status`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 1, 0, 'dsjh', '99.99', '0.00', 7, NULL, 7879879, 'jkh', 'hkj', 'hhjk', 'khj', 'jkh', 'hk', 'hjk', 'hkj', NULL, '2017-05-29 20:18:12', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_unit_album`
--

CREATE TABLE `dc_unit_album` (
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

CREATE TABLE `dc_unit_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `color` varchar(200) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `id_creator` int(11) DEFAULT NULL,
  `id_modifier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_unit_type`
--

INSERT INTO `dc_unit_type` (`id`, `name`, `color`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(0, 'type 5', '#000', '2017-05-29 15:45:36', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_user`
--

CREATE TABLE `dc_user` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc_user`
--

INSERT INTO `dc_user` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `photo`, `user_group`, `date_created`, `date_modified`, `id_creator`, `id_modifier`) VALUES
(1, 'admins', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'webei', '16807164_1234243823400398_1687302977082263434_n.jpg', 1, '0000-00-00 00:00:00', '2017-04-17 00:12:22', 0, 1),
(2, 'ilhamudzakir', '81dc9bdb52d04dc20036dbd8313ed055', 'ilhamudzakir@gmail.com', 'ilham', 'mudzakir', '20161201_6435.jpg', 5, '2017-04-17 01:54:09', NULL, 1, NULL);

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
-- Indexes for table `dc_kontrak_type`
--
ALTER TABLE `dc_kontrak_type`
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
-- Indexes for table `dc_payment_type`
--
ALTER TABLE `dc_payment_type`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_area`
--
ALTER TABLE `dc_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_area_album`
--
ALTER TABLE `dc_area_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_customer`
--
ALTER TABLE `dc_customer`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dc_icons`
--
ALTER TABLE `dc_icons`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `dc_kontrak`
--
ALTER TABLE `dc_kontrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dc_kontrak_type`
--
ALTER TABLE `dc_kontrak_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dc_menu`
--
ALTER TABLE `dc_menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `dc_menu_accsess`
--
ALTER TABLE `dc_menu_accsess`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `dc_payment_type`
--
ALTER TABLE `dc_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dc_rekening`
--
ALTER TABLE `dc_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dc_unit`
--
ALTER TABLE `dc_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dc_user`
--
ALTER TABLE `dc_user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
