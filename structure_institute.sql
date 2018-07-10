-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 10:16 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `structure_institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_core`
--

CREATE TABLE `about_us_core` (
  `core_id` int(11) NOT NULL COMMENT 'START WITH 1',
  `core_text` varchar(999) COLLATE latin1_bin NOT NULL,
  `core2_text` varchar(999) COLLATE latin1_bin NOT NULL,
  `core3_text` varchar(999) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `about_us_core`
--

INSERT INTO `about_us_core` (`core_id`, `core_text`, `core2_text`, `core3_text`) VALUES
(24, 'Maintaining quality trainings in structural analysis and design of buildings.', 'Constantly looking for innovations and advancements in structural engineering.', 'Geared not to do different things but to do things differently.');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_mission`
--

CREATE TABLE `about_us_mission` (
  `mission_id` int(50) NOT NULL COMMENT 'START WITH 1',
  `mission_text` varchar(999) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `about_us_mission`
--

INSERT INTO `about_us_mission` (`mission_id`, `mission_text`) VALUES
(25, 'To bridge the gap between formal theory and the industry practice');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_vision`
--

CREATE TABLE `about_us_vision` (
  `vision_id` int(11) NOT NULL COMMENT 'START WITH 1',
  `vision_text` varchar(999) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `about_us_vision`
--

INSERT INTO `about_us_vision` (`vision_id`, `vision_text`) VALUES
(24, 'Provide a Civil Engineering student with a good forethought in preparation to the structural engineering field. Help young Civil Engineers perceive the importance of the physical meaning of the computer output, in order to develop the \"gut feel\" and better understanding on structural behaviour. Allow an experienced Structural Engineer compare the worlwide state of practice and advancements with tall building projects.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `user_name`, `user_pass`) VALUES
(3, 'torts', 'torts'),
(4, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(50) NOT NULL COMMENT 'START WITH 1',
  `con_address` varchar(999) COLLATE latin1_bin NOT NULL,
  `con_telno` varchar(999) COLLATE latin1_bin NOT NULL,
  `con_email` varchar(999) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `con_address`, `con_telno`, `con_email`) VALUES
(5, '2F Concepcion-Villaroman Bldg, Espana Ave., Corner P. Campa St., Sampaloc, Metro Manila (near Morayta Footbridge and St. Thomas Square Bldg.)', '+1 5589 55488 55', 'structureinstitute@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(50) NOT NULL COMMENT 'START WITH 1',
  `course1_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `course1_desc` varchar(999) COLLATE latin1_bin NOT NULL,
  `course2_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `course2_desc` varchar(999) COLLATE latin1_bin NOT NULL,
  `course3_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `course3_desc` varchar(999) COLLATE latin1_bin NOT NULL,
  `course4_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `course4_desc` varchar(999) COLLATE latin1_bin NOT NULL,
  `course5_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `course5_desc` varchar(999) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course1_name`, `course1_desc`, `course2_name`, `course2_desc`, `course3_name`, `course3_desc`, `course4_name`, `course4_desc`, `course5_name`, `course5_desc`) VALUES
(9, 'ETABS', 'The innovative and revolutionary new ETABS is the ultimate integrated software package for the structural analysis and design of buildings.', 'SAFE', 'SAFE is the ultimate tool for designing concrete floor and foundation systems.', 'SAP2000', 'SAP2000 follows in the same tradition featuring a very sophisticated, intuitive and versatile user interface powered by an unmatched analysis engine and design tools for engineers working on transportation, industrial, public works, sports, and other facilities.', 'PERFORM 3D', 'Traditionally, earthquake-resistant design has been strength-based, using linear elastic analysis. PERFORM-3D allows you to use displacement-based design.', 'CSI COL', 'CSiCOL is a comprehensive software package used for the analysis and design of columns.');

-- --------------------------------------------------------

--
-- Table structure for table `free_training`
--

CREATE TABLE `free_training` (
  `course_id` int(50) NOT NULL COMMENT 'START WITH 1',
  `course1_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `course1_desc` varchar(999) COLLATE latin1_bin NOT NULL,
  `course2_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `course2_desc` varchar(999) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `free_training`
--

INSERT INTO `free_training` (`course_id`, `course1_name`, `course1_desc`, `course2_name`, `course2_desc`) VALUES
(4, 'ETABS', 'Every Monday and Wednesday from 6:00pm to 9:00pm', 'SAFE', 'Every Sunday from 10:00am to 12:00nn');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(20) NOT NULL COMMENT 'START WITH 1',
  `image1` text COLLATE latin1_bin NOT NULL,
  `image2` text COLLATE latin1_bin NOT NULL,
  `image3` text COLLATE latin1_bin NOT NULL,
  `image4` text COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `image1`, `image2`, `image3`, `image4`) VALUES
(22, '4.jpg', '2.jpg', '3.jpg', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `inst_id` int(50) NOT NULL COMMENT 'START WITH 1',
  `inst_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `inst_desc` varchar(999) COLLATE latin1_bin NOT NULL,
  `inst_fb` varchar(999) COLLATE latin1_bin NOT NULL,
  `inst_image` text COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`inst_id`, `inst_name`, `inst_desc`, `inst_fb`, `inst_image`) VALUES
(16, 'Earl P. Bonita', 'MASTER OF SCIENCE IN CIVIL ENGINEERING', 'https://www.facebook.com/structureinstitute.trainingsii', 'earl.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registrants`
--

CREATE TABLE `registrants` (
  `reg_id` int(50) NOT NULL COMMENT 'START WITH 1',
  `reg_name` varchar(999) COLLATE latin1_bin NOT NULL,
  `reg_email` varchar(999) COLLATE latin1_bin NOT NULL,
  `reg_number` varchar(999) COLLATE latin1_bin NOT NULL,
  `reg_subject` varchar(999) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `registrants`
--

INSERT INTO `registrants` (`reg_id`, `reg_name`, `reg_email`, `reg_number`, `reg_subject`) VALUES
(1, 'Arjay Veliganio', 'arjayveliganio@yahoo.com', '09178888888', 'SAFE'),
(2, 'Cristine Sia', 'cristinesia@yahoo.com', '09174444444', 'SAP2000'),
(3, 'Abraham Magpantay', 'abemagpantay@yahoo.com', '0928999999', 'PERFORM 3D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_core`
--
ALTER TABLE `about_us_core`
  ADD PRIMARY KEY (`core_id`);

--
-- Indexes for table `about_us_mission`
--
ALTER TABLE `about_us_mission`
  ADD PRIMARY KEY (`mission_id`);

--
-- Indexes for table `about_us_vision`
--
ALTER TABLE `about_us_vision`
  ADD PRIMARY KEY (`vision_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `free_training`
--
ALTER TABLE `free_training`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `registrants`
--
ALTER TABLE `registrants`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_core`
--
ALTER TABLE `about_us_core`
  MODIFY `core_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `about_us_mission`
--
ALTER TABLE `about_us_mission`
  MODIFY `mission_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `about_us_vision`
--
ALTER TABLE `about_us_vision`
  MODIFY `vision_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `free_training`
--
ALTER TABLE `free_training`
  MODIFY `course_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `inst_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `registrants`
--
ALTER TABLE `registrants`
  MODIFY `reg_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'START WITH 1', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
