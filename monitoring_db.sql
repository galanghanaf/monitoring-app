-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 04:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_point`
--

CREATE TABLE `access_point` (
  `id` int(11) NOT NULL,
  `asset_description` varchar(255) DEFAULT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `pcb` varchar(255) NOT NULL,
  `assembly` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `switch` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `access_point`
--

INSERT INTO `access_point` (`id`, `asset_description`, `hostname`, `model`, `pcb`, `assembly`, `ip_address`, `mac_address`, `switch`, `port`) VALUES
(11, 'AP Cisco', 'GIDTIVPLCTRP04', 'AIR-SAP2602E-C-K9', 'FOC17454WLD', 'FGL1749X0H0', '10.203.105.52', '24e9.b37c.95ca', '10.203.105.13', '16'),
(12, 'AP Cisco', 'GIDTIVPLCTRP01', 'AIR-SAP2602E-C-K9', 'FOC174786GE', 'FGL1749X0GS', '10.203.80.57', '24e9.b35b.0811', '10.203.105.14', '32'),
(13, 'AP Cisco', 'GIDTIVPLCTRP20', 'AIR-AP2802E-F-K9', 'FOC251519BX', 'FGL2519L5AE', '10.203.105.59', 'f01d.2df6.18fc', '10.203.105.14', '47'),
(14, 'AP Cisco', 'GIDTIVPLCTRP07', 'AIR-AP1852I-F-K9', 'KWC220302S3', 'AP not connect', '10.203.80.162', '003c.107a.4c48', '10.203.105.2', '3'),
(15, 'AP Cisco', 'GIDTIVPLCTRP10', 'AIR-AP2802E-F-K9', 'FGL2451LG2G', 'FGL2451LG2G', '10.203.80.162', 'ccdb.9320.0314', '10.203.105.6', '12'),
(16, 'AP Cisco', 'GIDTIVPLCTRP13', 'AIR-AP2802E-F-K9', 'FOC24482RNL', 'FGL2451LG2J', '10.203.105.152', 'ccdb.9320.0ce4', '10.203.105.104', '7'),
(17, 'AP Cisco', 'GIDTIVPLCTRP14', 'AIR-AP2802E-F-K9', 'FOC24482R2Z', 'FGL2451LG19', '10.203.105.158', 'ccdb.9320.0d98', '10.203.105.7', '7'),
(18, 'AP Cisco', 'GIDTIVPLCTRP08', 'AIR-AP2802E-F-K9', 'FOC24482QZQ', 'FGL2451LG0L', '10.203.105.153', 'ccdb.9320.0326', '10.203.105.7', '2'),
(19, 'AP Cisco', 'GIDTIVPLCTRP19', 'AIR-AP2802E-F-K9', 'FOC25254R02', 'FGL2528L7YV', '10.203.105.157', 'b811.4b53.bc00', '10.203.105.7', '21'),
(20, 'AP Cisco', 'GIDTIVPLCTRP03', 'AIR-AP1852I-F-K9', 'KWC2203021X', 'KWC2203021X', '10.203.105.66', '003c.107a.2ed8', '10.203.105.26', '11'),
(21, 'AP Cisco', 'GIDTIVPLCTRP12', 'AIR-AP2802E-F-K9', 'FOC24482QU3', 'FGL2451LFU5', '10.203.105.82', 'ccdb.9320.0412', '10.203.105.5', '3'),
(22, 'AP Cisco', 'AP Area 220', 'AIR-AP2802E-F-K10', 'FGL2451LFZH', 'AP not connect', 'DHCP', 'Not Connected', '10.203.105.5', '1'),
(23, 'AP Cisco', 'GIDTIVPLCTRP18', 'AIR-AP1852I-F-K9', 'KWC22030296', 'KWC22030296', '10.203.105.64', '003c.107a.3700', '10.203.105.4', '3'),
(24, 'AP Cisco', 'GIDTIVPLCTRP15', 'AIR-AP2802E-F-K9', 'FOC24482RC9', 'FGL2451LFZG', '10.203.105.147', 'ccdb.9320.0422', '10.203.105.4', '1'),
(25, 'AP Cisco', 'GIDTIVPLCTRP02', 'AIR-SAP2602E-C-K9', 'FOC17478EVW', 'FGL1749X0G7', '10.203.105.250', '24e9.b36d.8fc4', '10.203.105.4', '17'),
(26, 'AP Cisco', 'GIDTIVPLCTRP09', 'AIR-AP2802E-F-K9', 'FOC24482PX0', 'FGL2451LFU8', '10.203.105.161', 'ccdb.9320.03d2', '10.203.105.7', '6'),
(27, 'AP Cisco', 'GIDTIVPLCTRP16', 'AIR-AP2802E-F-K9', 'FOC24482R1N', 'FGL2451LG1X', '10.203.105.53', 'ccdb.9320.0d9a', '10.203.105.242', '23');

-- --------------------------------------------------------

--
-- Table structure for table `ipstatic`
--

CREATE TABLE `ipstatic` (
  `id` int(11) NOT NULL,
  `port` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `host_name` varchar(255) DEFAULT NULL,
  `manufacture` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) NOT NULL,
  `asset_number` varchar(255) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipstatic`
--

INSERT INTO `ipstatic` (`id`, `port`, `ip_address`, `mac_address`, `host_name`, `manufacture`, `model`, `serial_number`, `asset_number`, `user`, `password`) VALUES
(134, '8000', '127.0.0.1', 'Running Test with Wrong Port', '', '', '', '', '', '', ''),
(136, '80', '127.0.0.1', 'Running Test with Port', '', '', '', '', '', '', ''),
(142, '', '10.203.80.1', '00:87:31:E2:23:CA', '', 'Cisco', 'Cisco WS-C3750X-24S', '', '', '', ''),
(143, '', '10.203.105.1', '18-9C-5D-08-DA-C0', 'XIDTIVPLCTRP-CSW01', '', 'Cisco WS-C3850 12S', 'FCW2032F0CB', '60007884-0', '', ''),
(144, '', '10.203.105.2', '00-22-57-FE-06-85', 'XIDTIVPLCTRP-ACSW05', '', 'Cisco WS-C2960x-48TS-L', 'FCW1917A3CF', '60008298', '', ''),
(145, '', '10.203.105.3', '18-9C-5D-08-DA-C0', 'XIDTIVPLCTRP-ACSW01', '', 'Cisco WS-C2960S-24TS-L', 'FOC1740Z2SU', '60007719', '', ''),
(146, '', '10.203.105.4', '04:76:b0:15:51:80', 'XIDTIVPLCTRP-Replace01', '', 'C9200L-24P-4G', 'JAE24370N6W', '60012155', '', ''),
(147, '', '10.203.105.5', '74:86:0B:F2:02:41', 'XIDTIVPLCTRP-ACSW10', '', 'Cisco WS-C2960X-48FPS-L', 'FCW2131B34U', '60012191', '', ''),
(148, '', '10.203.105.006', 'Empty', '', '', '3Com 48Port', '', '', '', ''),
(149, '', '10.203.105.7', 'Empty', 'XIDTIVPLCTRP-ACSW13', '', 'C9200L-24P-4G', 'JAE243707DU', '60012157', '', ''),
(150, '', '10.203.105.8', '008067FA87F2', '', '', 'EBX510', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `it_asset`
--

CREATE TABLE `it_asset` (
  `id` int(11) NOT NULL,
  `asset_number` varchar(255) NOT NULL,
  `asset_description` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_asset`
--

INSERT INTO `it_asset` (`id`, `asset_number`, `asset_description`, `serial_number`, `model`, `location`, `mac_address`, `ip_address`, `latitude`, `longitude`, `photo`) VALUES
(19, '60002967', 'Software SAP Program', 'Empty', 'Other', '', '', '', '-6.434347467622026', '106.9277322292328', ''),
(21, '60002968', 'SAP & DB2 Licence', 'Empty', 'Other', '', '', '', '-6.434230193811898', '106.92772150039674', '');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `equipment` varchar(255) DEFAULT NULL,
  `asset_number` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `ticket_show` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `return` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `name`, `department`, `equipment`, `asset_number`, `serial_number`, `ticket_show`, `description`, `date`, `return`, `signature`) VALUES
(21, 'Riyanti', 'HR', 'Laptop HP 840 G3', '60008628', '5CG7256BYJ', 'Pinjam s/d pengajuan new laptop', '', '2022-01-05', '2022-07-13', ''),
(22, 'Sitinu', 'HR', 'Laptop HP 840 G3', '60009001', '5CG8152HTL', '', 'Pinjam s/d pengajuan new laptop', '2022-01-05', '2022-07-11', ''),
(23, 'Selamet widodo', 'Logistik', 'Laptop HP 840 G1', '60007338', '5CG4422FSH', '', '', '2022-01-04', '', ''),
(24, 'Andre', 'Performance', 'Laptop HP 840 G3', '60007955', '5CG62651NK', '', 'support performance', '2022-08-02', '', ''),
(25, 'Dwi Hartati', 'Performance', 'Laptop HP 840 G3', '60008589', '5CG7256BHQ', '', 'support performance', '2022-01-04', '', ''),
(26, 'Nurul Insan', 'HR', 'Laptop HP 840 G3', '60007748', '5CG6153YT2', '', 'Support HR *cuti', '2022-06-28', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ot_asset`
--

CREATE TABLE `ot_asset` (
  `id` int(11) NOT NULL,
  `asset_number` varchar(255) NOT NULL,
  `asset_description` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `mac_address` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ot_asset`
--

INSERT INTO `ot_asset` (`id`, `asset_number`, `asset_description`, `serial_number`, `model`, `location`, `mac_address`, `ip_address`, `latitude`, `longitude`, `photo`) VALUES
(24, '60000235', 'HP SCAN JET G3010 - R. Finance', '14WD709AG1735', 'C9200L-24P-4G', '', '', '', '-6.43424085506848', '106.92778050899507', '');

-- --------------------------------------------------------

--
-- Table structure for table `switchpoint`
--

CREATE TABLE `switchpoint` (
  `id` int(11) NOT NULL,
  `asset_description` varchar(255) DEFAULT NULL,
  `hostname` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `switch` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `switchpoint`
--

INSERT INTO `switchpoint` (`id`, `asset_description`, `hostname`, `model`, `serial_number`, `ip_address`, `mac_address`, `switch`, `port`) VALUES
(1, 'AP Cisco', 'Running Test', 'Other', '', '8.8.8.8', 'Empty', '', ''),
(12, 'Switch Cisco', 'XIDTIVPLCTRP-CSW01', 'WS-C3850-12S', 'FCW2032F0CB', '10.203.105.1', '0087.31e2.23f9', '', ''),
(13, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW02', 'Cisco WS-C2960X-48FPS-L', 'FCW2024A7GF', '10.203.105.14', '0056.2bd5.64c1', '10.203.105.3', '25'),
(14, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW03', 'Cisco WS-C2960X-48FPS-L', 'FCW2032B3DZ', '10.203.105.13', '00b0.e1cf.2141', '10.203.105.3', '23'),
(15, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW04', 'Cisco WS-C2960X-48FPS-L', 'FCW2032B3CF', '10.203.105.17', ' 00b0.e162.ef41', '10.203.105.3', '24'),
(16, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW01', 'Cisco WS-C2960S-24TS-L', 'FOC1740Z2SU', '10.203.105.3', '189c.5d08.dac1', '10.203.105.1', '3'),
(17, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW10', 'Cisco WS-C2960X-48FPS-L', 'FCW2131B34U', '10.203.105.5', '7486.0bf2.0241', '10.203.105.3', '22'),
(18, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW05', 'Cisco WS-C2960x-48TS-L', 'FCW1917A3CF', '10.203.105.2', 'f078.16c2.8341', '10.203.105.1', '12'),
(19, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW12', 'C9200L-24P-4G', 'JAE243707JY', '10.203.105.6', '0476.b05f.b1f9', '10.203.105.2', '35'),
(20, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW15', 'C1000-8P-2G-L', 'PSZ24491J1B', '10.203.105.71', 'ccdb.934f.fb41', '10.203.105.6', '6'),
(21, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW14', 'WS-C2960L-8TS-L', 'FOC2503LF1H', '10.203.105.104', '44ae.2554.4741', '10.203.105.6', '21'),
(22, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW15', 'C9200-24P', 'JAE25240Q7J', '10.203.105.106', '28af.fd8b.e579', '10.203.105.26', '39'),
(23, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW17', 'C1000-8P-2G-L', 'PSZ24491H13', '10.203.105.73', 'ccdb.934f.bf41', '10.203.105.71', '9'),
(24, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW02', 'Cisco WS-C2960X-48FPS-L', 'FOC2032V1Z0', '10.203.105.26', '00b0.e1c0.c741', '10.203.105.1', '5'),
(25, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW13', 'C9200L-24P-4G', 'JAE243707DU', '10.203.105.7', '0476.b00e.89f9', '10.203.105.26', '2'),
(26, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW16', 'C1000-8P-2G-L', 'PSZ25171HPR', '10.203.105.72', '10f9.20d2.ac41', '10.203.105.71', '6'),
(27, 'Switch Cisco', 'XIDTIVPLCTRP-ACSWNew11', 'C1000-8P-2G-L', 'PSZ24491GXM', '10.203.80.254', 'ccdb.934f.b5c2', '10.203.105.71', '7'),
(28, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW16', 'C9200L-24P-4G', 'JAE24370PBA', '10.203.105.242', '0476.b071.30f9', '10.203.105.1', '4'),
(29, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW08', 'WS-C2960X-24TS-L', 'FCW1917A4RA', '10.203.105.16', 'f078.16c3.d441', '10.203.105.1', '6'),
(30, 'Switch Cisco', 'XIDTIVPLCTRP-ACSW13', 'C9200L-24P-4G', 'JAE24370N6W', '10.203.105.4', '0476.b015.51f9', '10.203.105.16', '20');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `requester` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`id`, `description`, `requester`, `start_date`, `due_date`, `status`, `notes`) VALUES
(1, 'Moving Server Room', 'Network', '2022-07-05', '2022-07-25', 'In Progress', 'Improvement Server'),
(3, 'rweq', 'fwef', '2022-07-05', '2022-07-05', 'Completed', 'fsad'),
(4, 'awfe', 'awef', '2022-07-03', '2022-07-04', 'Completed', 'awfe'),
(5, 'awef', 'gwaeg', '2022-07-08', '2022-07-11', 'In Progress', 'fawefg'),
(7, 'zzzzz', 'waeg', '2022-07-13', '2022-07-20', 'In Progress', 'awef'),
(8, 'awegwiojfoijgoiwfawg', 'f', '2022-07-04', '2022-07-05', 'In Progress', 'ewaghwafawfawgawgwaehawrawfawf'),
(9, 'awef', 'awef', '2022-07-11', '2022-07-15', NULL, 'awf'),
(11, 'galang', 'wagea', '2022-07-10', '2022-08-02', 'In Progress', 'waeg'),
(12, 'awgwagawgawegawgwaegawegwag', 'waegweagwag', '2022-07-08', '2022-07-09', 'In Progress', 'awegawg'),
(13, 'wageaw', 'fweqf', '2022-07-10', '2022-07-10', 'In Progress', 'waeg'),
(14, 'sadsv', 'sdvsav', '2022-07-15', '2022-07-30', 'Completed', 'sdv'),
(15, 'bar', 'bar', '2022-11-30', '2022-12-01', 'Completed', 'bar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_changed` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`, `is_active`, `date_created`, `date_changed`, `image`) VALUES
(62, 'Galang Hanafi', 'admin@mail.com', 'admin', 1, 1, 0, 0, 'avatar.png'),
(92, 'tgs', 'tgs', 'tgs', 3, 0, 0, 0, '96189603.jpg'),
(93, 'test', 'test@mail.com', 'test', 2, 1, 1669746044, 1669746044, 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_point`
--
ALTER TABLE `access_point`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `ipstatic`
--
ALTER TABLE `ipstatic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_asset`
--
ALTER TABLE `it_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_asset`
--
ALTER TABLE `ot_asset`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `switchpoint`
--
ALTER TABLE `switchpoint`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_point`
--
ALTER TABLE `access_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ipstatic`
--
ALTER TABLE `ipstatic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `it_asset`
--
ALTER TABLE `it_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ot_asset`
--
ALTER TABLE `ot_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `switchpoint`
--
ALTER TABLE `switchpoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
