-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2015 at 02:38 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bwi`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `counter_village_code` int(11) NOT NULL,
  `counter_subdistrict_code` int(11) NOT NULL,
  `counter_donation_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter_village_code`, `counter_subdistrict_code`, `counter_donation_no`) VALUES
(11, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `d_donation`
--

CREATE TABLE IF NOT EXISTS `d_donation` (
  `d_don_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_don_no` varchar(20) NOT NULL,
  `m_loct_id` int(11) NOT NULL,
  `m_activity_id` int(11) NOT NULL,
  `m_activity_other` varchar(100) NOT NULL,
  `d_don_year` int(11) NOT NULL,
  `d_don_nm` varchar(75) NOT NULL,
  `d_don_addres` text NOT NULL,
  `d_don_nominal` int(11) NOT NULL,
  `d_don_bentuk` varchar(50) NOT NULL,
  `d_don_qty` int(11) NOT NULL,
  `m_unit_id` int(11) NOT NULL,
  `d_don_dim_p` int(11) NOT NULL,
  `d_don_dim_l` int(11) NOT NULL,
  `d_don_dim_t` int(11) NOT NULL,
  `d_don_desc` text NOT NULL,
  `d_don_prog` int(11) NOT NULL,
  `d_don_from` int(11) NOT NULL,
  `d_don_pengajuan` date NOT NULL,
  `d_don_diterima` date NOT NULL,
  `d_don_disetujui` date NOT NULL,
  `d_don_implementation` date NOT NULL,
  PRIMARY KEY (`d_don_id`),
  KEY `location_donation` (`m_loct_id`),
  KEY `activity_donation` (`m_activity_id`),
  KEY `unit_donation` (`m_unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `d_donation`
--


-- --------------------------------------------------------

--
-- Table structure for table `d_photo`
--

CREATE TABLE IF NOT EXISTS `d_photo` (
  `d_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_don_id` int(11) NOT NULL,
  `d_pho_nm` varchar(50) NOT NULL,
  `d_pho_file` text NOT NULL,
  `d_don_prog` int(11) NOT NULL,
  PRIMARY KEY (`d_photo_id`),
  KEY `photo_donation` (`d_don_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `d_photo`
--


-- --------------------------------------------------------

--
-- Table structure for table `d_video`
--

CREATE TABLE IF NOT EXISTS `d_video` (
  `d_video_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_don_id` int(11) NOT NULL,
  `d_video_nm` varchar(100) NOT NULL,
  `d_video_link` text NOT NULL,
  PRIMARY KEY (`d_video_id`),
  KEY `video_donation` (`d_don_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `d_video`
--


-- --------------------------------------------------------

--
-- Table structure for table `location_t`
--

CREATE TABLE IF NOT EXISTS `location_t` (
  `loct_t_id` int(11) NOT NULL AUTO_INCREMENT,
  `loct_t_nm` varchar(100) NOT NULL,
  PRIMARY KEY (`loct_t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000 ;

--
-- Dumping data for table `location_t`
--

INSERT INTO `location_t` (`loct_t_id`, `loct_t_nm`) VALUES
(1, 'kecamatan'),
(2, 'kelurahan'),
(999, 'Kabupaten');

-- --------------------------------------------------------

--
-- Table structure for table `m_activity`
--

CREATE TABLE IF NOT EXISTS `m_activity` (
  `m_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_activity_nm` varchar(100) NOT NULL,
  `m_activity_desc` text NOT NULL,
  PRIMARY KEY (`m_activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000 ;

--
-- Dumping data for table `m_activity`
--

INSERT INTO `m_activity` (`m_activity_id`, `m_activity_nm`, `m_activity_desc`) VALUES
(999, 'Lain-Lain', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_location`
--

CREATE TABLE IF NOT EXISTS `m_location` (
  `m_loct_id` int(11) NOT NULL AUTO_INCREMENT,
  `loct_t_id` int(11) NOT NULL,
  `m_loct_code` varchar(100) NOT NULL,
  `m_loct_nm` varchar(100) NOT NULL,
  `m_loct_desc` text NOT NULL,
  `m_loct_parent_id` int(11) NOT NULL,
  PRIMARY KEY (`m_loct_id`),
  KEY `FK_loc_type` (`loct_t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `m_location`
--


-- --------------------------------------------------------

--
-- Table structure for table `m_unit`
--

CREATE TABLE IF NOT EXISTS `m_unit` (
  `m_unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_unit_nm` varchar(100) NOT NULL,
  `m_unit_desc` text NOT NULL,
  PRIMARY KEY (`m_unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `m_unit`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) DEFAULT NULL,
  `user_grade_id` int(11) NOT NULL,
  `user_loct_id` int(11) NOT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_img` text NOT NULL,
  `user_active_status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_location` (`user_loct_id`),
  KEY `user_type` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `user_grade_id`, `user_loct_id`, `user_login`, `user_password`, `user_name`, `user_phone`, `user_img`, `user_active_status`) VALUES
(1, 1, 999, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '000000', 'default.jpg', 1),
(2, 3, 999, 0, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '0000', 'default.jpg', 1),
(3, 2, 999, 0, 'supervisor', '09348c20a019be0318387c08df7a783d', 'supervisor', '111', 'default.jpg', 1),
(4, 1, 1, 1, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes', '000', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type_name`) VALUES
(1, 'Admin'),
(2, 'Supervisor'),
(3, 'Pengguna');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_donation`
--
ALTER TABLE `d_donation`
  ADD CONSTRAINT `location_donation` FOREIGN KEY (`m_loct_id`) REFERENCES `m_location` (`m_loct_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `d_photo`
--
ALTER TABLE `d_photo`
  ADD CONSTRAINT `photo_donation` FOREIGN KEY (`d_don_id`) REFERENCES `d_donation` (`d_don_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `d_video`
--
ALTER TABLE `d_video`
  ADD CONSTRAINT `video_donation` FOREIGN KEY (`d_don_id`) REFERENCES `d_donation` (`d_don_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_location`
--
ALTER TABLE `m_location`
  ADD CONSTRAINT `FK_loc_type` FOREIGN KEY (`loct_t_id`) REFERENCES `location_t` (`loct_t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
