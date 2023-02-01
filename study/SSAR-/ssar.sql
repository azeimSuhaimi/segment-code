-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 08:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssar`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `id_user` int(12) NOT NULL,
  `dates` int(255) NOT NULL,
  `timess` time NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `id_user`, `dates`, `timess`, `activity`) VALUES
(2, 1, 1618547663, '06:34:23', 'log in'),
(3, 1, 1618547789, '12:36:29', 'log in'),
(4, 1, 1618547958, '12:39:18', 'log out'),
(5, 1, 1618548146, '12:42:26', 'log in'),
(6, 1, 1618719711, '12:21:51', 'log in'),
(7, 1, 1618749367, '20:36:07', 'log in'),
(8, 1, 1618750050, '20:47:30', 'log out'),
(11, 1, 1618750072, '20:47:52', 'log in'),
(12, 1, 1618750179, '20:49:39', 'log out'),
(13, 1, 1618750185, '20:49:45', 'log in'),
(14, 1, 1618750191, '20:49:51', 'log out'),
(17, 1, 1618751182, '21:06:22', 'log in'),
(18, 1, 1618752715, '21:31:55', 'log out'),
(23, 1, 1618752878, '21:34:38', 'log in'),
(24, 1, 1618753401, '21:43:21', 'log out'),
(27, 1, 1618753557, '21:45:57', 'log in'),
(28, 1, 1618754429, '22:00:29', 'log out'),
(30, 1, 1618762860, '00:21:00', 'log in'),
(31, 1, 1618763007, '00:23:27', 'log out'),
(34, 1, 1618764411, '00:46:51', 'log in'),
(35, 1, 1618765639, '01:07:19', 'log out'),
(36, 1, 1618765684, '01:08:04', 'log in'),
(37, 1, 1618766384, '01:19:44', 'log out'),
(40, 1, 1618766423, '01:20:23', 'log in'),
(41, 1, 1618766440, '01:20:40', 'log out'),
(44, 1, 1618766489, '01:21:29', 'log in'),
(45, 1, 1618769290, '02:08:10', 'remove admin'),
(46, 1, 1618805640, '12:14:00', 'log in'),
(47, 1, 1618805714, '12:15:14', 'add new user '),
(48, 1, 1618805926, '12:18:46', 'add new user '),
(49, 1, 1618805958, '12:19:18', 'log out'),
(50, 2, 1618805971, '12:19:31', 'log in'),
(51, 2, 1618806049, '12:20:49', 'add new report'),
(52, 2, 1618806073, '12:21:13', 'log out'),
(53, 3, 1618806090, '12:21:30', 'log in'),
(54, 3, 1618806116, '12:21:56', 'log out'),
(55, 1, 1618806122, '12:22:02', 'log in'),
(56, 1, 1618806166, '12:22:46', 'comfirm report staff'),
(57, 1, 1618806267, '12:24:27', 'log out'),
(58, 3, 1618806276, '12:24:36', 'log in'),
(59, 3, 1618806312, '12:25:12', 'comfirm report staff'),
(60, 1, 1618901284, '14:48:04', 'log in'),
(61, 1, 1618901519, '14:51:59', 'log out'),
(62, 1, 1618909997, '17:13:17', 'log in'),
(63, 1, 1618910032, '17:13:52', 'change password'),
(64, 1, 1618913235, '18:07:15', 'log in'),
(65, 1, 1618913524, '18:12:04', 'log out'),
(66, 2, 1618913533, '18:12:13', 'log in'),
(67, 2, 1618913781, '18:16:21', 'add new report'),
(68, 2, 1618913837, '18:17:17', 'log out'),
(69, 1, 1621951119, '21:58:39', 'log in'),
(70, 1, 1621951479, '22:04:39', 'print report '),
(71, 1, 1621956616, '23:30:16', 'log in'),
(72, 1, 1621957605, '23:46:45', 'print report '),
(73, 1, 1621958477, '00:01:17', 'print report '),
(74, 1, 1621958593, '00:03:13', 'print report '),
(75, 1, 1621958628, '00:03:48', 'print report '),
(76, 1, 1621958744, '00:05:44', 'print report '),
(77, 1, 1621958801, '00:06:41', 'print report '),
(78, 1, 1621959098, '00:11:38', 'print report '),
(79, 1, 1621959505, '00:18:25', 'log out'),
(80, 3, 1621959574, '00:19:34', 'log in'),
(81, 3, 1621959597, '00:19:57', 'log out'),
(82, 3, 1621959604, '00:20:04', 'log in'),
(83, 3, 1621959656, '00:20:56', 'log out'),
(84, 2, 1621959664, '00:21:04', 'log in'),
(85, 2, 1621960157, '00:29:17', 'print report '),
(86, 2, 1621960167, '00:29:27', 'print report '),
(87, 2, 1621960245, '00:30:45', 'print report '),
(88, 2, 1621960518, '00:35:18', 'print report '),
(89, 2, 1621960522, '00:35:22', 'print report '),
(90, 2, 1621960560, '00:36:00', 'print report '),
(91, 2, 1621960562, '00:36:02', 'print report '),
(92, 2, 1621960570, '00:36:10', 'print report '),
(93, 2, 1621960921, '00:42:01', 'print report '),
(94, 2, 1621961103, '00:45:03', 'print report '),
(95, 2, 1621961154, '00:45:54', 'print report '),
(96, 2, 1621961172, '00:46:12', 'print report '),
(97, 2, 1621961174, '00:46:14', 'print report '),
(98, 2, 1621961174, '00:46:14', 'print report '),
(99, 2, 1621961190, '00:46:30', 'print report '),
(100, 2, 1621961234, '00:47:14', 'print report '),
(101, 2, 1621961340, '00:49:00', 'print report '),
(102, 2, 1621961343, '00:49:03', 'print report '),
(103, 2, 1621961354, '00:49:14', 'print report '),
(104, 2, 1621961356, '00:49:16', 'print report '),
(105, 2, 1621961367, '00:49:27', 'print report '),
(106, 2, 1621961384, '00:49:44', 'print report '),
(107, 2, 1621961393, '00:49:53', 'print report '),
(108, 2, 1621961398, '00:49:58', 'print report '),
(109, 2, 1621961434, '00:50:34', 'print report '),
(110, 2, 1621961464, '00:51:04', 'print report '),
(111, 2, 1621961531, '00:52:11', 'print report '),
(112, 2, 1621961550, '00:52:30', 'print report '),
(113, 2, 1621961740, '00:55:40', 'print report '),
(114, 2, 1621961764, '00:56:04', 'print report '),
(115, 2, 1621961847, '00:57:27', 'print report '),
(116, 2, 1621961881, '00:58:01', 'print report '),
(117, 2, 1621961977, '00:59:37', 'print report '),
(118, 2, 1621961978, '00:59:38', 'print report '),
(119, 2, 1621961986, '00:59:46', 'print report '),
(120, 2, 1621962004, '01:00:04', 'print report '),
(121, 2, 1621962026, '01:00:26', 'print report '),
(122, 2, 1621962250, '01:04:10', 'print report '),
(123, 2, 1621962275, '01:04:35', 'print report '),
(124, 2, 1621962406, '01:06:46', 'print report '),
(125, 2, 1621962860, '01:14:20', 'print report '),
(126, 2, 1621962863, '01:14:23', 'print report '),
(127, 2, 1621962874, '01:14:34', 'print report '),
(128, 2, 1621962886, '01:14:46', 'print report '),
(129, 2, 1621962919, '01:15:19', 'print report '),
(130, 2, 1621962937, '01:15:37', 'print report '),
(131, 2, 1621963037, '01:17:17', 'print report '),
(132, 2, 1621963121, '01:18:41', 'print report '),
(133, 2, 1621963363, '01:22:43', 'print report '),
(134, 2, 1621963418, '01:23:38', 'print report '),
(135, 2, 1621963689, '01:28:09', 'print report '),
(136, 2, 1621963691, '01:28:11', 'print report '),
(137, 2, 1621963826, '01:30:26', 'print report '),
(138, 2, 1621963837, '01:30:37', 'print report '),
(139, 2, 1621963839, '01:30:39', 'print report '),
(140, 2, 1621963845, '01:30:45', 'print report '),
(141, 2, 1621963847, '01:30:47', 'print report '),
(142, 2, 1621963854, '01:30:54', 'print report '),
(143, 2, 1621963888, '01:31:28', 'print report '),
(144, 2, 1621963935, '01:32:15', 'print report '),
(145, 2, 1621963960, '01:32:40', 'print report '),
(146, 2, 1621963998, '01:33:18', 'print report '),
(147, 2, 1621964070, '01:34:30', 'print report '),
(148, 2, 1621964093, '01:34:53', 'print report '),
(149, 2, 1621964124, '01:35:24', 'print report '),
(150, 2, 1621964134, '01:35:34', 'print report '),
(151, 2, 1621964214, '01:36:54', 'print report '),
(152, 2, 1621964230, '01:37:10', 'print report '),
(153, 2, 1621964239, '01:37:19', 'print report '),
(154, 2, 1621964246, '01:37:26', 'print report '),
(155, 2, 1621964358, '01:39:18', 'print report '),
(156, 2, 1621964376, '01:39:36', 'print report '),
(157, 2, 1621964594, '01:43:14', 'print report '),
(158, 2, 1621964627, '01:43:47', 'print report '),
(159, 2, 1621964660, '01:44:20', 'print report '),
(160, 2, 1621964911, '01:48:31', 'print report '),
(161, 2, 1621964938, '01:48:58', 'print report '),
(162, 2, 1621965121, '01:52:01', 'add new image on report'),
(163, 2, 1621965135, '01:52:15', 'add new image on report'),
(164, 2, 1621965209, '01:53:29', 'print report '),
(165, 2, 1621965214, '01:53:34', 'print report '),
(166, 2, 1621965242, '01:54:02', 'print report '),
(167, 2, 1621965331, '01:55:31', 'print report '),
(168, 2, 1621965332, '01:55:32', 'print report '),
(169, 2, 1621965338, '01:55:38', 'print report '),
(170, 2, 1621965374, '01:56:14', 'print report '),
(171, 2, 1621965381, '01:56:21', 'print report '),
(172, 2, 1621965397, '01:56:37', 'print report '),
(173, 2, 1621965407, '01:56:47', 'print report '),
(174, 2, 1621965455, '01:57:35', 'print report '),
(175, 2, 1621965488, '01:58:08', 'print report '),
(176, 2, 1621965489, '01:58:09', 'print report '),
(177, 2, 1621965512, '01:58:32', 'print report '),
(178, 2, 1621965530, '01:58:50', 'print report '),
(179, 2, 1621965532, '01:58:52', 'print report '),
(180, 2, 1621965550, '01:59:10', 'print report '),
(181, 2, 1621965566, '01:59:26', 'print report '),
(182, 2, 1621965579, '01:59:39', 'print report '),
(183, 2, 1621965603, '02:00:03', 'print report '),
(184, 2, 1621965616, '02:00:16', 'print report '),
(185, 2, 1621965642, '02:00:42', 'print report '),
(186, 2, 1621965673, '02:01:13', 'print report '),
(187, 2, 1621965692, '02:01:32', 'print report '),
(188, 2, 1621965703, '02:01:43', 'print report '),
(189, 2, 1621965727, '02:02:07', 'print report '),
(190, 2, 1621965761, '02:02:41', 'print report '),
(191, 2, 1621965782, '02:03:02', 'print report '),
(192, 2, 1621965815, '02:03:35', 'print report '),
(193, 2, 1621965847, '02:04:07', 'print report '),
(194, 2, 1621965861, '02:04:21', 'print report '),
(195, 2, 1621965869, '02:04:29', 'print report '),
(196, 2, 1621965876, '02:04:36', 'print report '),
(197, 2, 1621965883, '02:04:43', 'print report '),
(198, 2, 1622014486, '15:34:46', 'log in'),
(199, 2, 1622014499, '15:34:59', 'print report '),
(200, 2, 1622014544, '15:35:44', 'print report '),
(201, 2, 1622014567, '15:36:07', 'print report '),
(202, 2, 1622014636, '15:37:16', 'print report '),
(203, 2, 1622014750, '15:39:10', 'print report '),
(204, 2, 1622014793, '15:39:53', 'print report '),
(205, 2, 1622014993, '15:43:13', 'print report '),
(206, 2, 1622015016, '15:43:36', 'print report '),
(207, 2, 1622015035, '15:43:55', 'print report '),
(208, 2, 1622015088, '15:44:48', 'print report '),
(209, 2, 1622015143, '15:45:43', 'print report '),
(210, 2, 1622015179, '15:46:19', 'print report '),
(211, 2, 1622015231, '15:47:11', 'print report '),
(212, 2, 1622015282, '15:48:02', 'print report '),
(213, 2, 1622015303, '15:48:23', 'print report '),
(214, 2, 1622015356, '15:49:16', 'print report '),
(215, 2, 1622015380, '15:49:40', 'print report '),
(216, 2, 1622015427, '15:50:27', 'print report '),
(217, 2, 1622015439, '15:50:39', 'print report '),
(218, 2, 1622015494, '15:51:34', 'print report '),
(219, 2, 1622015513, '15:51:53', 'print report '),
(220, 2, 1622015593, '15:53:13', 'print report '),
(221, 2, 1622015666, '15:54:26', 'print report '),
(222, 2, 1622015701, '15:55:01', 'print report '),
(223, 2, 1622015720, '15:55:20', 'print report '),
(224, 2, 1622015741, '15:55:41', 'print report '),
(225, 2, 1622015763, '15:56:03', 'print report '),
(226, 2, 1622015805, '15:56:45', 'print report '),
(227, 2, 1622015913, '15:58:33', 'print report '),
(228, 2, 1622015952, '15:59:12', 'print report '),
(229, 2, 1622015978, '15:59:38', 'print report '),
(230, 2, 1622016006, '16:00:06', 'print report '),
(231, 2, 1622016033, '16:00:33', 'print report '),
(232, 2, 1622016052, '16:00:52', 'print report '),
(233, 2, 1622016070, '16:01:10', 'print report '),
(234, 2, 1622016079, '16:01:19', 'print report '),
(235, 2, 1622016090, '16:01:30', 'print report '),
(236, 2, 1622016106, '16:01:46', 'print report '),
(237, 2, 1622016182, '16:03:02', 'print report '),
(238, 2, 1622016247, '16:04:07', 'print report '),
(239, 2, 1622016282, '16:04:42', 'print report '),
(240, 2, 1622016459, '16:07:39', 'print report '),
(241, 2, 1622016489, '16:08:09', 'print report '),
(242, 2, 1622016516, '16:08:36', 'print report '),
(243, 2, 1622016552, '16:09:12', 'print report '),
(244, 2, 1622016572, '16:09:32', 'print report '),
(245, 2, 1622016828, '16:13:48', 'print report '),
(246, 2, 1622016839, '16:13:59', 'print report '),
(247, 2, 1622016851, '16:14:11', 'print report '),
(248, 2, 1622016895, '16:14:55', 'print report '),
(249, 2, 1622016947, '16:15:47', 'print report '),
(250, 2, 1622016983, '16:16:23', 'print report '),
(251, 2, 1622017078, '16:17:58', 'print report '),
(252, 2, 1622017097, '16:18:17', 'print report '),
(253, 2, 1622017167, '16:19:27', 'print report '),
(254, 2, 1622017183, '16:19:43', 'print report '),
(255, 2, 1622017243, '16:20:43', 'print report '),
(256, 2, 1622017639, '16:27:19', 'print report '),
(257, 2, 1622017726, '16:28:46', 'print report '),
(258, 2, 1622017732, '16:28:52', 'print report '),
(259, 2, 1622017755, '16:29:15', 'print report '),
(260, 2, 1622017759, '16:29:19', 'print report '),
(261, 2, 1622017779, '16:29:39', 'print report '),
(262, 2, 1622017946, '16:32:26', 'print report '),
(263, 2, 1622017956, '16:32:36', 'print report '),
(264, 2, 1622017975, '16:32:55', 'print report '),
(265, 2, 1622018275, '16:37:55', 'print report '),
(266, 2, 1622018319, '16:38:39', 'print report '),
(267, 2, 1622018345, '16:39:05', 'print report '),
(268, 2, 1622018681, '16:44:41', 'print report '),
(269, 2, 1622018726, '16:45:26', 'print report '),
(270, 2, 1622018813, '16:46:53', 'print report '),
(271, 2, 1622018928, '16:48:48', 'print report '),
(272, 2, 1622019044, '16:50:44', 'print report '),
(273, 2, 1622021570, '17:32:50', 'error enter restriction page'),
(274, 2, 1622021578, '17:32:58', 'log out'),
(275, 2, 1622021586, '17:33:06', 'log in'),
(276, 2, 1622021611, '17:33:31', 'print report ');

-- --------------------------------------------------------

--
-- Table structure for table `comfirm`
--

CREATE TABLE `comfirm` (
  `id_report` int(11) NOT NULL,
  `id_kj` int(11) NOT NULL,
  `date_comfirm` int(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comfirm`
--

INSERT INTO `comfirm` (`id_report`, `id_kj`, `date_comfirm`, `id`) VALUES
(1, 3, 1618806323, 1),
(2, 3, 5465464, 3);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`) VALUES
(1, 'jtmk', 1),
(2, 'jke', 1),
(3, 'jmsk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_report`
--

CREATE TABLE `gallery_report` (
  `id` int(11) NOT NULL,
  `id_report` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `figure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_report`
--

INSERT INTO `gallery_report` (`id`, `id_report`, `image`, `figure`) VALUES
(1, 2, 'paper-1074131_1920.jpg', 'dasdad'),
(2, 2, 'wood-591631_1920.jpg', 'dsadsadas');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`) VALUES
(2, 'dsadasdsadsa');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `status`) VALUES
(1, 'lecturer', 1),
(2, 'pegawai I.T', 1),
(3, 'lec', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `position` int(255) NOT NULL,
  `department` int(255) NOT NULL,
  `status` int(11) NOT NULL,
  `comfirmation` int(11) NOT NULL,
  `date_send` int(255) NOT NULL,
  `title` text NOT NULL,
  `intro` text NOT NULL,
  `objective` text NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `time_program` time NOT NULL,
  `time_program_end` time NOT NULL,
  `place` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `target_people` varchar(255) NOT NULL,
  `impak` text NOT NULL,
  `summary_program` text NOT NULL,
  `total_people` varchar(11) NOT NULL,
  `admin_comfirm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `id_user`, `position`, `department`, `status`, `comfirmation`, `date_send`, `title`, `intro`, `objective`, `date_start`, `date_end`, `time_program`, `time_program_end`, `place`, `level`, `target_people`, `impak`, `summary_program`, `total_people`, `admin_comfirm`) VALUES
(1, 2, 1, 1, 1, 1, 1618806049, 'wood', '<p>kjhkhj</p>', '<p>khjk</p>', '04/19/2021', '04/19/2021', '12:20:00', '14:20:00', 'das', 'dsadasdsadsa', 'eeee', '<p>kjhkhj</p>', '<p>jhkhj</p>', '3', '1'),
(2, 2, 1, 1, 1, 1, 1618913782, 'program pengujian ujian dalam projek fyp pelajar', '<p>Views are never called directly, they must be loaded by a controller. Remember that in an MVC framework, the Controller acts as the traffic cop, so it is responsible for fetching a particular view. If you have not read the Controllers page you should do so before continuing.</p>', '<p>Views are never called directly, they must be loaded by a controller. Remember that in an MVC framework, the Controller acts as the traffic cop, so it is responsible for fetching a particular view. If you have not read the Controllers page you should do so before continuing.</p>', '21/04/2021', '19/04/2021', '18:15:00', '18:16:00', 'kuala terengganu', 'Negeri', 'pelajar, komuniti', '<p>Views are never called directly, they must be loaded by a controller. Remember that in an MVC framework, the Controller acts as the traffic cop, so it is responsible for fetching a particular view. If you have not read the Controllers page you should do so before continuing.</p>', '<p>Views are never called directly, they must be loaded by a controller. Remember that in an MVC framework, the Controller acts as the traffic cop, so it is responsible for fetching a particular view. If you have not read the Controllers page you should do so before continuing.</p>', '33', '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'ketua jabatan');

-- --------------------------------------------------------

--
-- Table structure for table `target_people`
--

CREATE TABLE `target_people` (
  `id` int(11) NOT NULL,
  `people` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target_people`
--

INSERT INTO `target_people` (`id`, `people`) VALUES
(2, 'eeee');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ic`, `password`, `name`, `phone`, `email`, `image`, `role`, `status`, `department`, `position`) VALUES
(1, '1111', '$2y$10$y0k2PcuBrcI4FsN4wcIssehvkci/Tjm1wfQARMnUKFopbJ7v3fuoi', 'abu ', '014845234', 'john@gmail.com', 'paper-1074131_1920.jpg', 1, 1, 1, 1),
(2, '12', '$2y$10$mKOJ/zIPru2h074mrydWruvduNIFm64nRz/Li6bvnxK04.ogzSbW2', 'p', '01484', 'john@gmail.com', 'empty.png', 2, 1, 1, 1),
(3, '23', '$2y$10$xRuB89e4ABH.nRq8UnQmB.cOhWq1a4prD4OKWWQYAfL/xOv7RYPAG', 'o', '0148452347', 'john@gmail.com', 'empty.png', 3, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `ic` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_ibfk_1` (`id_user`);

--
-- Indexes for table `comfirm`
--
ALTER TABLE `comfirm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_report` (`id_report`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gallery_report`
--
ALTER TABLE `gallery_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_report_ibfk_1` (`id_report`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `position` (`position`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_ibfk_1` (`id_user`),
  ADD KEY `reports_ibfk_2` (`department`),
  ADD KEY `reports_ibfk_3` (`position`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_people`
--
ALTER TABLE `target_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ic` (`ic`),
  ADD KEY `role` (`role`),
  ADD KEY `department` (`department`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ic` (`ic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `comfirm`
--
ALTER TABLE `comfirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_report`
--
ALTER TABLE `gallery_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `target_people`
--
ALTER TABLE `target_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comfirm`
--
ALTER TABLE `comfirm`
  ADD CONSTRAINT `comfirm_ibfk_1` FOREIGN KEY (`id_report`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery_report`
--
ALTER TABLE `gallery_report`
  ADD CONSTRAINT `gallery_report_ibfk_1` FOREIGN KEY (`id_report`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`department`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_3` FOREIGN KEY (`position`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`department`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`position`) REFERENCES `positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
