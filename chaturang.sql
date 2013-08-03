-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2013 at 01:11 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chaturang`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_head`
--

CREATE TABLE IF NOT EXISTS `account_head` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_type` text NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_info`
--

CREATE TABLE IF NOT EXISTS `bank_info` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) NOT NULL,
  `bank_acc` bigint(11) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bank_info`
--

INSERT INTO `bank_info` (`bank_id`, `bank_name`, `bank_acc`) VALUES
(3, 'icici', 12),
(4, 'state bank of india', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `booking_form`
--

CREATE TABLE IF NOT EXISTS `booking_form` (
  `b_id` varchar(25) NOT NULL,
  `c_id` int(11) NOT NULL,
  `bkg_date` date NOT NULL,
  `b_se` varchar(25) NOT NULL,
  `b_office` varchar(25) NOT NULL,
  `b_pax` int(11) NOT NULL,
  `b_adult` int(11) NOT NULL,
  `b_child` int(11) NOT NULL,
  `b_total_amt` float NOT NULL,
  `b_pass` int(11) NOT NULL,
  `b_hotel` int(11) NOT NULL,
  `b_vehicle` int(11) NOT NULL,
  `b_room` int(11) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_form`
--

INSERT INTO `booking_form` (`b_id`, `c_id`, `bkg_date`, `b_se`, `b_office`, `b_pax`, `b_adult`, `b_child`, `b_total_amt`, `b_pass`, `b_hotel`, `b_vehicle`, `b_room`) VALUES
('CTPL130', 2, '2013-08-03', 'abc', 'jeevan pawar', 4, 2, 2, 10000, 0, 1, 1, 5),
('CTPL1301', 1, '2013-08-03', 'niranjan', 'jeevan pawar', 4, 2, 2, 15000, 0, 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `comp_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(25) NOT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `comp_name`) VALUES
(1, 'Chaturang Tours'),
(2, 'Chaturang Tours Pvt Ltd'),
(3, 'Chaturang Holidays');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_date` date NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_mode` varchar(25) NOT NULL,
  `e_ch` varchar(25) NOT NULL,
  `e_amt` double NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_date` date NOT NULL,
  `h_name` varchar(25) NOT NULL,
  `h_address` text NOT NULL,
  `h_reg` varchar(25) NOT NULL,
  `h_pname` varchar(100) NOT NULL,
  `h_mob` bigint(11) NOT NULL,
  `h_ph` bigint(10) NOT NULL,
  `h_email` varchar(100) NOT NULL,
  `h_pin` int(10) NOT NULL,
  `h_bank` text NOT NULL,
  `h_ac` bigint(25) NOT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`h_id`, `h_date`, `h_name`, `h_address`, `h_reg`, `h_pname`, `h_mob`, `h_ph`, `h_email`, `h_pin`, `h_bank`, `h_ac`) VALUES
(3, '2013-06-26', 'sager', 'nasik', '123456', 'jeevan gulab pawar', 4512321, 123, 'adsffs', 12133, '', 123456),
(4, '2013-07-02', 'panchavati', 'nasik', '123564', 'yogesh', 9049, 252, 'safasd', 25222, '', 0),
(5, '2013-07-20', 'sai', 'nasik', '52223', 'kishore patil', 9049402749, 2505050, 'kishore@gmail.com', 42210, 'icici', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_acomodation`
--

CREATE TABLE IF NOT EXISTS `hotel_acomodation` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `b_id` varchar(25) NOT NULL,
  `h_vendor` varchar(25) NOT NULL,
  `h_hotel` varchar(25) NOT NULL,
  `h_place` varchar(25) NOT NULL,
  `h_room` varchar(25) NOT NULL,
  `h_meal` varchar(25) NOT NULL,
  `h_cin` date NOT NULL,
  `h_cout` date NOT NULL,
  `h_amt` double NOT NULL,
  `h_pay` double NOT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `hotel_acomodation`
--

INSERT INTO `hotel_acomodation` (`h_id`, `c_id`, `b_id`, `h_vendor`, `h_hotel`, `h_place`, `h_room`, `h_meal`, `h_cin`, `h_cout`, `h_amt`, `h_pay`) VALUES
(104, 2, 'CTPL130', '', 'sager', 'nasik', 'Super Delux', 'AP', '2013-08-03', '2013-08-05', 0, 0),
(105, 1, 'CTPL1301', '', 'sager', 'nasik', 'Super Delux', 'AP', '2013-08-07', '2013-08-09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_pay`
--

CREATE TABLE IF NOT EXISTS `hotel_pay` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `b_id` varchar(25) NOT NULL,
  `h_name` varchar(25) NOT NULL,
  `h_vendor` varchar(25) NOT NULL,
  `h_date` date NOT NULL,
  `h_mode` varchar(25) NOT NULL,
  `h_no` varchar(25) NOT NULL,
  `h_amt` double NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `hotel_pay`
--

INSERT INTO `hotel_pay` (`h_id`, `c_id`, `b_id`, `h_name`, `h_vendor`, `h_date`, `h_mode`, `h_no`, `h_amt`, `p_id`) VALUES
(17, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Cheque', '', 1000, 104),
(18, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Cheque', '', 1000, 104),
(19, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Cheque', '', 1000, 104),
(20, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Cheque', '', 1000, 104),
(21, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Cheque', '', 100, 104),
(22, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Cheque', '', 120, 104),
(23, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Cheque', '123456', 100, 104),
(24, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Cash', '', 100, 104),
(25, 2, 'CTPL130', 'sager', '', '2013-08-03', 'Online Transfer', '', 1000, 104),
(26, 1, 'CTPL1301', 'sager', '', '2013-08-03', 'Cheque', '123456', 100, 105);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_service`
--

CREATE TABLE IF NOT EXISTS `hotel_service` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `b_id` varchar(25) NOT NULL,
  `s_no` int(11) NOT NULL,
  `s_detail` text NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inv`
--

CREATE TABLE IF NOT EXISTS `inv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `inc_number` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `year` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1393 ;

--
-- Dumping data for table `inv`
--

INSERT INTO `inv` (`id`, `customer_id`, `inc_number`, `invoice_number`, `year`) VALUES
(1391, 9723, 1, 0, '13'),
(1392, 6752, 2, 0, '13');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `i_no` int(11) NOT NULL AUTO_INCREMENT,
  `i_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `i_name` varchar(25) NOT NULL,
  `i_address` varchar(100) NOT NULL,
  `i_word` text NOT NULL,
  `i_advance` double NOT NULL,
  `i_tax` double NOT NULL,
  `i_date` date NOT NULL,
  PRIMARY KEY (`i_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`i_no`, `i_id`, `c_id`, `i_name`, `i_address`, `i_word`, `i_advance`, `i_tax`, `i_date`) VALUES
(27, 1, 1, 'jeevan pawar', '', '', 1000, 5, '0000-00-00'),
(28, 2, 1, 'jeevan pawar', 'nasik', '', 500, 5, '2013-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE IF NOT EXISTS `journey` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `j_from` varchar(100) NOT NULL,
  `j_to` varchar(100) NOT NULL,
  `j_airline` varchar(100) NOT NULL,
  `j_fno` int(11) NOT NULL,
  `j_pnr` int(11) NOT NULL,
  `j_yt` int(11) NOT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_sort` varchar(25) NOT NULL,
  `m_full` varchar(25) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`m_id`, `m_sort`, `m_full`) VALUES
(1, 'EP', 'Only Room'),
(2, 'CP', '+Break Fast'),
(3, 'AP', 'All Meals'),
(4, 'MAP', 'Break Fast Lunch / Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `partial_payment`
--

CREATE TABLE IF NOT EXISTS `partial_payment` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `b_id` varchar(25) NOT NULL,
  `p_mode` varchar(25) NOT NULL,
  `p_date` date NOT NULL,
  `p_check` varchar(25) NOT NULL,
  `p_amt` double NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `partial_payment`
--

INSERT INTO `partial_payment` (`p_id`, `c_id`, `b_id`, `p_mode`, `p_date`, `p_check`, `p_amt`) VALUES
(29, 2, 'CTPL130', 'Cheque', '2013-08-03', '', 1200),
(30, 2, 'CTPL130', 'Cheque', '2013-08-03', '123456', 800),
(31, 2, 'CTPL130', 'Cash', '2013-08-03', '', 1000),
(32, 2, 'CTPL130', 'Online Transfer', '2013-08-03', '', 1000),
(33, 2, 'CTPL130', 'Cheque', '2013-08-03', '', 100),
(34, 2, 'CTPL130', 'Cheque', '2013-08-03', '', 100),
(35, 1, 'CTPL1301', 'Cheque', '2013-08-03', '', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `pass_info`
--

CREATE TABLE IF NOT EXISTS `pass_info` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `b_id` varchar(25) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_mf` varchar(25) NOT NULL,
  `p_age` int(11) NOT NULL,
  `p_bdate` date NOT NULL,
  `p_contact` bigint(11) NOT NULL,
  `p_email` varchar(25) NOT NULL,
  `p_tamt` double NOT NULL,
  `p_namt` double NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=313 ;

-- --------------------------------------------------------

--
-- Table structure for table `reciept`
--

CREATE TABLE IF NOT EXISTS `reciept` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` varchar(25) NOT NULL,
  `c_id` int(11) NOT NULL,
  `b_id` varchar(25) NOT NULL,
  `r_date` date NOT NULL,
  `r_mode` varchar(100) NOT NULL,
  `r_no` varchar(100) NOT NULL,
  `r_amt` double NOT NULL,
  `r_word` text NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `reciept`
--

INSERT INTO `reciept` (`r_id`, `p_id`, `c_id`, `b_id`, `r_date`, `r_mode`, `r_no`, `r_amt`, `r_word`) VALUES
(64, 'CP2_29', 2, 'CTPL130', '2013-08-03', 'Cheque', '', 1200, 'ONE THOUSAND, TWO HUNDRED'),
(65, 'CP2_30', 2, 'CTPL130', '2013-08-03', 'Cheque', '123456', 800, 'EIGHT HUNDRED'),
(66, 'CP2_31', 2, 'CTPL130', '2013-08-03', 'Cash', '', 1000, 'ONE THOUSAND'),
(67, 'CP2_32', 2, 'CTPL130', '2013-08-03', 'Online Transfer', '', 1000, 'ONE THOUSAND'),
(68, 'CH2_18', 2, 'CTPL130', '2013-08-03', 'Cheque', '', 1000, ''),
(69, 'CP2_34', 2, 'CTPL130', '2013-08-03', 'Cheque', '', 100, 'ONE HUNDRED'),
(70, 'CH2_21', 2, 'CTPL130', '2013-08-03', 'Cheque', '', 100, 'ONE HUNDRED'),
(71, 'CH2_22', 2, 'CTPL130', '2013-08-03', 'Cheque', '', 120, 'ONE HUNDRED AND TWENTY'),
(72, 'CH2_23', 2, 'CTPL130', '2013-08-03', 'Cheque', '123456', 100, 'ONE HUNDRED'),
(73, 'CH2_24', 2, 'CTPL130', '2013-08-03', 'Cash', '', 100, 'ONE HUNDRED'),
(74, 'CH2_25', 2, 'CTPL130', '2013-08-03', 'Online Transfer', '', 1000, 'ONE THOUSAND'),
(75, 'CT2_5', 2, 'CTPL130', '2013-08-03', 'Cheque', '', 100, 'ONE HUNDRED'),
(76, 'CT2_6', 2, 'CTPL130', '2013-08-03', 'Cash', '', 100, 'ONE HUNDRED'),
(77, 'CT2_7', 2, 'CTPL130', '2013-08-03', 'Online Transfer', '', 100, 'ONE HUNDRED'),
(78, 'CT2_8', 2, 'CTPL130', '2013-08-03', 'Cash', '', 1000, 'ONE THOUSAND'),
(79, 'CP1_35', 1, 'CTPL1301', '2013-08-03', 'Cheque', '', 1000, 'ONE THOUSAND'),
(80, 'CH1_26', 1, 'CTPL1301', '2013-08-03', 'Cheque', '123456', 100, 'ONE HUNDRED');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_type` varchar(25) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`r_id`, `r_type`) VALUES
(2, 'Delux'),
(3, 'Super Delux'),
(7, 'Luxary new');

-- --------------------------------------------------------

--
-- Table structure for table `sub_invoice`
--

CREATE TABLE IF NOT EXISTS `sub_invoice` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_no` int(11) NOT NULL,
  `des` text NOT NULL,
  `rate` double NOT NULL,
  `amt` double NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sub_invoice`
--

INSERT INTO `sub_invoice` (`s_id`, `i_id`, `c_id`, `s_no`, `des`, `rate`, `amt`) VALUES
(20, 1, 1, 1, 'Hi this my first invoice', 500, 500),
(21, 1, 1, 2, 'HI this is my second invoice', 200, 1200),
(22, 2, 1, 1, 'one', 1000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `sub_quotation`
--

CREATE TABLE IF NOT EXISTS `sub_quotation` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) NOT NULL,
  `des` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`t_id`, `title`, `des`) VALUES
(1, 'Itinerary', 'The suggested itinerary is based on information & guidance from local agents/ hotels. The Itinerary is subject to change due to unavoidable circumstances. Chaturang Tours Pvt Ltd reserves the right to cancel / modify the tour   without any prior notice / permission.'),
(4, 'Hotels/Room', 'We'),
(5, 'Meals', 'The meals'),
(6, 'Vehicle/Coach', 'The vehicle'),
(7, 'Liability', 'liability'),
(8, 'Suggestions or grievances', 'suggestions'),
(9, 'Cancellation', 'cancellation'),
(10, 'Refund', 'refund'),
(11, 'Jurisdiction', 'jurisdiction');

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE IF NOT EXISTS `tourist` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `t_name` varchar(25) NOT NULL,
  `t_gender` varchar(25) NOT NULL,
  `t_age` varchar(25) NOT NULL,
  `t_dob` varchar(25) NOT NULL,
  `t_contact` varchar(25) NOT NULL,
  `t_email` varchar(25) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trans_pay`
--

CREATE TABLE IF NOT EXISTS `trans_pay` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `b_id` varchar(25) NOT NULL,
  `v_id` int(11) NOT NULL,
  `v_name` varchar(25) NOT NULL,
  `v_date` date NOT NULL,
  `v_mode` varchar(100) NOT NULL,
  `v_no` varchar(100) NOT NULL,
  `v_amt` double NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `trans_pay`
--

INSERT INTO `trans_pay` (`t_id`, `c_id`, `b_id`, `v_id`, `v_name`, `v_date`, `v_mode`, `v_no`, `v_amt`) VALUES
(5, 2, 'CTPL130', 19, '', '2013-08-03', 'Cheque', '', 100),
(6, 2, 'CTPL130', 19, '', '2013-08-03', 'Cash', '', 100),
(7, 2, 'CTPL130', 19, '', '2013-08-03', 'Online Transfer', '', 100),
(8, 2, 'CTPL130', 20, 'jeevan pawar', '2013-08-03', 'Cash', '', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(25) NOT NULL,
  `u_password` varchar(25) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_password`) VALUES
(1, 'jeevan', 'jeevan'),
(2, 'viviek', 'viviek');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(25) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `v_name`) VALUES
(1, 'marutivew'),
(2, 'honda'),
(4, 'new honda');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_transportation`
--

CREATE TABLE IF NOT EXISTS `vehicle_transportation` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `b_id` varchar(25) NOT NULL,
  `v_name` varchar(100) NOT NULL,
  `v_type` varchar(25) NOT NULL,
  `v_pdate` date NOT NULL,
  `v_ppoint` varchar(25) NOT NULL,
  `v_ddate` date NOT NULL,
  `v_dpoint` varchar(25) NOT NULL,
  `v_days` int(25) NOT NULL,
  `v_amt` double NOT NULL,
  `v_pay` double NOT NULL,
  PRIMARY KEY (`v_id`,`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `vehicle_transportation`
--

INSERT INTO `vehicle_transportation` (`v_id`, `c_id`, `b_id`, `v_name`, `v_type`, `v_pdate`, `v_ppoint`, `v_ddate`, `v_dpoint`, `v_days`, `v_amt`, `v_pay`) VALUES
(19, 2, 'CTPL130', '', 'marutivew', '2013-08-03', 'delhi', '2013-08-05', 'nsik', 5, 0, 0),
(20, 2, 'CTPL130', 'jeevan pawar', 'honda', '2013-08-03', 'nasik', '2013-08-05', 'delhi', 5, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
