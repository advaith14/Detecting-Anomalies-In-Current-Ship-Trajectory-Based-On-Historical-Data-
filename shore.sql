-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 12:45 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shore`
--

-- --------------------------------------------------------

--
-- Table structure for table `anomaly`
--

CREATE TABLE `anomaly` (
  `id` int(11) NOT NULL,
  `lat` decimal(9,7) DEFAULT NULL,
  `lng` decimal(10,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anomaly`
--

INSERT INTO `anomaly` (`id`, `lat`, `lng`) VALUES
(1, '54.8129170', '14.00343300'),
(2, '54.9409807', '14.00811720'),
(3, '55.0288000', '14.01520000'),
(4, '55.0613300', '14.05770000'),
(5, '55.0910785', '14.09741950'),
(6, '55.1208868', '14.16466700'),
(7, '55.1974080', '14.19888000'),
(8, '55.2489550', '14.21419500'),
(9, '55.2637578', '14.23646670'),
(10, '55.2911570', '14.24988800'),
(11, '55.3120300', '14.25343300'),
(12, '55.3259800', '14.25841720'),
(13, '55.3570500', '14.26520000'),
(14, '55.3763050', '14.27770000'),
(15, '55.3927400', '14.28822200'),
(16, '55.4168880', '14.30215700'),
(17, '55.4319130', '14.33243000'),
(18, '55.4547830', '14.44081200'),
(19, '55.4727636', '14.52696965'),
(20, '55.4935330', '14.56823570'),
(21, '55.5316373', '14.58482900'),
(22, '55.5517850', '14.63020000'),
(23, '55.5766550', '14.65200000'),
(24, '55.5999670', '14.85483300'),
(25, '55.6152100', '14.90675000'),
(26, '55.6466880', '14.92241070'),
(27, '55.6753830', '15.04318220'),
(28, '55.6982030', '15.08822200'),
(29, '55.7103000', '15.10215700'),
(30, '55.7420300', '15.13324300'),
(31, '55.7689380', '15.16969650'),
(32, '55.7933280', '15.18235700'),
(33, '55.8283330', '15.18482900'),
(34, '55.8513900', '15.19553000'),
(35, '55.8731050', '15.18235700'),
(36, '55.8910520', '15.10215700'),
(37, '55.9149880', '15.13324300'),
(38, '55.9328330', '15.16969650'),
(39, '55.9549700', '15.18235700'),
(40, '55.9748550', '15.17422395'),
(41, '55.9962600', '15.18097790'),
(42, '55.9976000', '15.19533000'),
(43, '56.0008700', '15.19513000'),
(44, '56.0018267', '15.19493000'),
(45, '56.0035000', '15.19473000'),
(46, '56.0059250', '15.19453000'),
(48, '56.0091393', '15.23116800'),
(49, '56.0127000', '15.24281620'),
(50, '56.0153000', '15.26583000'),
(51, '56.0207800', '15.28164300');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `lat` decimal(9,7) DEFAULT NULL,
  `lng` decimal(10,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `lat`, `lng`) VALUES
(1, '54.8129170', '14.00343300'),
(2, '54.9409807', '14.00811720'),
(3, '55.0288000', '14.01520000'),
(4, '55.0613300', '14.05770000'),
(5, '55.0910785', '14.09741950'),
(6, '55.1208868', '14.16466700'),
(7, '55.1974080', '14.19888000'),
(8, '55.2489550', '14.21419500'),
(9, '55.2637578', '14.23646670'),
(10, '55.2911570', '14.24988800'),
(11, '55.3120300', '14.25343300'),
(12, '55.3259800', '14.25841720'),
(13, '55.3570500', '14.26520000'),
(14, '55.3763050', '14.27770000'),
(15, '55.3927400', '14.28822200'),
(16, '55.4168880', '14.30215700'),
(17, '55.4319130', '14.33243000'),
(18, '55.4547830', '14.44081200'),
(19, '55.4727636', '14.52696965'),
(20, '55.4935330', '14.56823570'),
(21, '55.5316373', '14.58482900'),
(22, '55.5517850', '14.63020000'),
(23, '55.5766550', '14.65200000'),
(24, '55.5999670', '14.85483300'),
(25, '55.6152100', '14.90675000'),
(26, '55.6466880', '14.92241070'),
(27, '55.6753830', '15.04318220'),
(28, '55.6982030', '15.08822200'),
(29, '55.7103000', '15.10215700'),
(30, '55.7420300', '15.13324300'),
(31, '55.7689380', '15.16969650'),
(32, '55.7933280', '15.18235700'),
(33, '55.8283330', '15.18482900'),
(34, '55.8513900', '15.19553000'),
(35, '55.8731050', '15.18235700'),
(36, '55.8910520', '15.10215700'),
(37, '55.9149880', '15.13324300'),
(38, '55.9328330', '15.16969650'),
(39, '55.9549700', '15.18235700'),
(40, '55.9748550', '15.17422395'),
(41, '55.9962600', '15.18097790'),
(42, '55.9976000', '15.19533000'),
(43, '56.0008700', '15.19513000'),
(44, '56.0018267', '15.19493000'),
(45, '56.0035000', '15.19473000'),
(46, '56.0059250', '15.19453000'),
(48, '56.0091393', '15.23116800'),
(49, '56.0127000', '15.24281620'),
(50, '56.0153000', '15.26583000'),
(51, '56.0207800', '15.28164300');

-- --------------------------------------------------------

--
-- Table structure for table `noanomaly`
--

CREATE TABLE `noanomaly` (
  `id` int(11) NOT NULL,
  `lat` decimal(4,2) DEFAULT NULL,
  `lng` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noanomaly`
--

INSERT INTO `noanomaly` (`id`, `lat`, `lng`) VALUES
(1, '57.38', '11.09'),
(2, '57.32', '11.20'),
(3, '57.30', '11.38'),
(4, '57.28', '11.35'),
(5, '57.23', '11.62'),
(6, '57.21', '11.61'),
(7, '57.10', '11.73'),
(8, '57.09', '11.76'),
(9, '56.92', '11.79'),
(10, '56.96', '11.80'),
(11, '56.85', '11.80'),
(12, '56.70', '11.81'),
(13, '56.65', '11.85'),
(14, '56.63', '11.84'),
(15, '56.61', '11.86'),
(16, '56.42', '12.12');

-- --------------------------------------------------------

--
-- Table structure for table `normals`
--

CREATE TABLE `normals` (
  `id` int(11) NOT NULL,
  `lat` decimal(9,7) DEFAULT NULL,
  `lng` decimal(8,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `normals`
--

INSERT INTO `normals` (`id`, `lat`, `lng`) VALUES
(1, '55.2129170', '14.263433'),
(2, '55.2098070', '14.284172'),
(3, '55.2880000', '14.652000'),
(4, '55.5161330', '14.777000'),
(5, '55.6107850', '15.128222'),
(6, '55.4088680', '15.322157'),
(7, '55.3574080', '15.353243'),
(8, '55.8089550', '15.696965'),
(9, '55.8375780', '15.712357'),
(10, '55.7311570', '15.848290'),
(11, '55.8020300', '16.205530'),
(12, '55.7305980', '15.323660'),
(13, '55.2817050', '14.876700'),
(14, '55.7363050', '15.555700'),
(15, '55.2274000', '14.295933'),
(16, '55.8068880', '15.146105'),
(17, '55.7819130', '15.847027'),
(18, '55.4227636', '14.383655'),
(19, '55.8735330', '15.363283'),
(20, '55.4463730', '14.631892'),
(21, '55.6117850', '15.055302'),
(22, '55.9766550', '16.196222'),
(23, '55.3247830', '14.440812'),
(24, '55.9999670', '16.354833'),
(25, '55.4652100', '14.596750'),
(26, '55.1366880', '14.124107'),
(27, '55.7253830', '15.431822'),
(28, '55.4782030', '14.679330'),
(29, '55.0974600', '14.119597'),
(30, '55.7019430', '15.435817'),
(31, '55.8889380', '15.898492'),
(32, '55.2033280', '14.274195'),
(33, '55.2783330', '14.364667'),
(34, '55.0413900', '14.219888'),
(35, '55.7531050', '15.465350'),
(36, '55.6810520', '15.108560'),
(37, '55.1249880', '14.146355'),
(38, '55.3128330', '14.631333'),
(39, '55.7094970', '15.628400'),
(40, '55.6048550', '15.194913'),
(41, '55.8362600', '15.840560'),
(42, '55.5059170', '14.767333'),
(43, '55.2700000', '14.327333'),
(44, '55.6728267', '15.616817'),
(45, '55.2750000', '14.346000'),
(46, '55.7499250', '15.476323'),
(47, '55.2980000', '14.364500'),
(48, '55.1041393', '14.311680'),
(49, '55.3166770', '14.428162'),
(50, '55.1933000', '14.236583'),
(51, '55.7610780', '15.581643');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `heading` varchar(256) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `abnormality_level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `heading`, `message`, `timestamp`, `status`, `abnormality_level`) VALUES
(1, 9, 'notification 1', 'First notification', '2018-03-28 05:07:00', 1, 0),
(2, 9, 'notification 2', 'Second notification', '2018-03-28 05:07:00', 0, 0),
(3, 9, 'notification 3', 'Third notification', '2018-03-28 05:07:00', 1, 0),
(10, 9, 't', 't', '2018-03-29 09:27:08', 0, 0),
(12, 1, 'head', 'mess', '2018-03-29 13:50:36', 1, 2),
(13, 1, 'DANGER', 'Hig Abnormality Detected', '2018-03-29 14:00:11', 0, 2),
(14, 1, 'DANGER', 'High Abnormality Detected', '2018-03-29 17:35:12', 0, 2),
(15, 1, 'DANGER', 'High Abnormality Detected', '2018-03-29 18:23:15', 0, 2),
(16, 1, 'DANGER', 'High Abnormality Detected', '2018-03-29 18:29:42', 0, 2),
(17, 1, 'DANGER', 'High Abnormality Detected', '2018-03-29 18:31:42', 0, 2),
(18, 1, 'DANGER', 'High Abnormality Detected', '2018-03-29 18:35:39', 0, 2),
(19, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 04:46:06', 0, 2),
(20, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 04:49:32', 0, 2),
(21, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 09:13:03', 0, 2),
(22, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 10:56:39', 0, 2),
(23, 9, 'a', 'a', '2018-03-30 10:57:38', 1, 2),
(24, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 11:02:11', 0, 2),
(25, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 11:04:56', 1, 2),
(26, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:05:40', 0, 2),
(27, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:07:20', 0, 2),
(28, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:07:52', 0, 2),
(29, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:10:27', 0, 2),
(30, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:12:27', 0, 2),
(31, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:13:49', 0, 2),
(32, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:14:31', 0, 2),
(33, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:30:03', 1, 2),
(34, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 12:37:31', 1, 2),
(35, 1, 'DANGER', 'High Abnormality Detected', '2018-03-30 13:00:38', 1, 2),
(36, 1, 'WARNING', 'The ship is moving into an abnormal position', '2018-03-31 04:16:36', 0, 1),
(37, 1, 'DANGER', 'High Abnormality Detected', '2018-03-31 04:18:19', 1, 2),
(38, 1, 'DANGER', 'High Abnormality Detected', '2018-03-31 04:22:43', 1, 2),
(39, 1, 'WARNING', 'The ship is moving into an abnormal position', '2018-03-31 04:24:10', 1, 1),
(40, 1, 'DANGER', 'High Abnormality Detected', '2018-03-31 09:27:26', 1, 2),
(41, 1, 'DANGER', 'High Abnormality Detected', '2018-03-31 09:28:34', 1, 2),
(42, 1, 'DANGER', 'High Abnormality Detected', '2018-03-31 09:29:40', 0, 2),
(43, 1, 'DANGER', 'High Abnormality Detected', '2018-03-31 09:35:11', 1, 2),
(44, 1, 'DANGER', 'High Abnormality Detected', '2018-03-31 09:55:07', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `activation_code`, `verified`) VALUES
(5, 'Swapnil Shinde', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'swapnil96@gmail.com', 'ab6c84c3299b824', 0),
(6, 'Swapnil Shinde', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'swapnil96@gmail.com', 'e8f74688d875848', 0),
(7, 'swapnil', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'swapnilshindeid3@gmail.com', '08486e7d274464d', 0),
(8, 'swapnil', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'swapnilshindeid3@gmail.com', '76ac217ff6e1d05', 0),
(9, 'swapnil', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'swapnilshindeid3@gmail.com', 'f24d2e884fa1bee', 1),
(11, 'Advaith Kamath', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'advaith14@gmail.com', '11980645d4a08a0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anomaly`
--
ALTER TABLE `anomaly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noanomaly`
--
ALTER TABLE `noanomaly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normals`
--
ALTER TABLE `normals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anomaly`
--
ALTER TABLE `anomaly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `noanomaly`
--
ALTER TABLE `noanomaly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `normals`
--
ALTER TABLE `normals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
