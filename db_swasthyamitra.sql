-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 03:28 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_swasthyamitra`
--

-- --------------------------------------------------------

--
-- Table structure for table `sm_category`
--

CREATE TABLE `sm_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_category`
--

INSERT INTO `sm_category` (`id`, `category`, `slug`, `status`) VALUES
(1, 'Hospital', 'hospital', 1),
(2, 'Diagnostics Centre', 'diagnostics-centre', 1),
(3, 'Nursing Home', 'nursing-home', 1),
(4, 'Optical Shop', 'optical-shop', 1),
(5, 'Pharmacy', 'pharmacy', 1),
(6, 'Physiotherapy Clinic', 'physiotherapy-clinic', 1),
(7, 'Ayurveda', 'ayurveda', 1),
(8, 'Doctor Booking', 'doctor-booking', 1),
(9, 'Laboratory', 'laboratory', 1),
(10, 'Yoga & Fitness Centre', 'yoga-fitness-centre', 1),
(11, 'Dental Clinic', 'dental-clinic', 1),
(12, 'Home Collection', 'home-collection', 1),
(13, 'Tele Medicine / Virtual Clinic', 'tele-medicine-virtual-clinic', 1),
(14, 'Other Health Care', 'other-health-care', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_constituency`
--

CREATE TABLE `sm_constituency` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_constituency`
--

INSERT INTO `sm_constituency` (`id`, `name`, `parent_id`) VALUES
(1, 'Simna', 1),
(2, 'Mohanpur', 1),
(3, 'Bamutia', 1),
(4, 'Barjala', 1),
(5, 'Khayerpur', 1),
(6, 'Agartala', 1),
(7, 'Ramnagar', 1),
(8, 'Town Bordowali', 1),
(9, 'Banamalipur', 1),
(10, 'Majlishpur', 1),
(11, 'Mandaibazar', 1),
(13, 'Pratapgarh', 1),
(14, 'Badharghat', 1),
(15, 'Surjyamani Nagar', 1),
(16, 'Bishalgarh', 2),
(17, 'Golaghati', 2),
(18, 'Takarjala', 2),
(19, 'Charilam', 2),
(20, 'Boxanagar', 2),
(21, 'Nalchar', 2),
(22, 'Kamalasagar', 2),
(23, 'Dhanpur', 2),
(24, 'Matarbari', 3),
(25, 'Kakraban-Salgarh', 3),
(26, 'Ampinagar', 3),
(27, 'Amarpur', 3),
(28, 'Karbook', 3),
(29, 'Bagma', 4),
(30, 'Radhakishorepur', 4),
(31, 'Rajnagar', 4),
(32, 'Belonia', 4),
(33, 'Santirbazar', 4),
(34, 'Hrishyamukh', 4),
(35, 'Jolaibari', 4),
(36, 'Manu', 4),
(37, 'Sabroom', 4),
(38, 'Ramchandraghat', 5),
(39, 'Khowai', 5),
(40, 'Asharambari', 5),
(41, 'Kalyanpur-Pramodenagar', 5),
(42, 'Teliamura', 5),
(43, 'Krishnapur', 5),
(44, 'Raima Valley', 6),
(45, 'Kamalpur', 6),
(46, 'Surma', 6),
(47, 'Ambassa', 6),
(48, 'Karmachhara', 6),
(49, 'Chawamanu', 6),
(50, 'Pabiachhara', 7),
(51, 'Fatikroy', 7),
(52, 'Chandipur', 7),
(53, 'Kailashahar', 7),
(54, 'Kadamtala-Kurti', 8),
(55, 'Bagbassa', 8),
(56, 'Dharmanagar', 8),
(57, 'Jubarajnaga', 8),
(58, 'Panisagar', 8),
(59, 'Kanchanpur', 8),
(60, 'Pancharthal', 7),
(61, 'Constituency 1', 9),
(62, 'Constituency 2', 9),
(63, 'Constituency 3', 9);

-- --------------------------------------------------------

--
-- Table structure for table `sm_discount_slab`
--

CREATE TABLE `sm_discount_slab` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_discount_slab`
--

INSERT INTO `sm_discount_slab` (`id`, `name`, `type`, `category_id`, `status`) VALUES
(1, 'OPD Diagnostics', 'percent', 1, 1),
(2, 'IPD Diagnostics', 'percent', 1, 1),
(3, 'IPD Bed Rent', 'percent', 1, 1),
(4, 'Surgical Packages', 'percent', 1, 1),
(5, 'Consultation', 'amount', 1, 1),
(6, 'Medicine', 'percent', 1, 1),
(7, 'Laboratory', 'percent', 2, 1),
(8, 'USG', 'percent', 2, 1),
(9, 'X-Ray', 'percent', 2, 1),
(10, 'ECG', 'percent', 2, 1),
(11, 'TMT', 'percent', 2, 1),
(12, 'Echo', 'percent', 2, 1),
(13, 'Holter', 'percent', 2, 1),
(14, 'PFT', 'percent', 2, 1),
(15, 'Uroflowmetry', 'percent', 2, 1),
(16, 'Endoscopy / Colonoscopy', 'percent', 2, 1),
(17, 'Consultation Fee', 'amount', 2, 1),
(18, 'Others', 'percent', 2, 1),
(19, 'Surgical Packages', 'percent', 3, 1),
(20, 'Investigations', 'percent', 3, 1),
(21, 'Optics Purchase', 'percent', 4, 1),
(22, 'Others', 'percent', 4, 1),
(23, 'Medicine Purchase', 'percent', 5, 1),
(24, 'Cosmetics', 'percent', 5, 1),
(25, 'Therapy (per Seating)', 'percent', 6, 1),
(26, 'Packages', 'percent', 6, 1),
(27, 'Medicine Purchase', 'percent', 7, 1),
(28, 'Consultation', 'percent', 7, 1),
(29, 'Therapy', 'percent', 7, 1),
(30, 'Lab Test', 'percent', 9, 1),
(31, 'Others', 'percent', 9, 1),
(32, 'Per Seating', 'percent', 10, 1),
(33, 'Packages', 'percent', 10, 1),
(34, 'Dental Procedure', 'percent', 11, 1),
(35, 'Consultation Fee', 'percent', 11, 1),
(36, 'Home Blood Collection Charge', 'percent', 12, 1),
(37, 'Consultation Charge', 'percent', 13, 1),
(38, 'Home Care', 'percent', 13, 1),
(39, 'Services', 'percent', 13, 1),
(40, 'Other Health Care', 'percent', 14, 1),
(41, 'Services', 'percent', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_district`
--

CREATE TABLE `sm_district` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_district`
--

INSERT INTO `sm_district` (`id`, `name`) VALUES
(1, 'West Tripura'),
(2, 'Sepahijala Tripura'),
(3, 'Gomati Tripura'),
(4, 'South Tripura'),
(5, 'Khowai Tripura'),
(6, 'Dhalai Tripura'),
(7, 'Unakoti Tripura'),
(8, 'North Tripura'),
(9, 'Tripura');

-- --------------------------------------------------------

--
-- Table structure for table `sm_hospital`
--

CREATE TABLE `sm_hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `location_id` int(11) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_images`
--

CREATE TABLE `sm_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_members`
--

CREATE TABLE `sm_members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `amobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `ward` int(11) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(20) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `cardfile` varchar(255) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `referral_code` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `refid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_reviews`
--

CREATE TABLE `sm_reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `hospital_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_sidebar`
--

CREATE TABLE `sm_sidebar` (
  `id` int(11) NOT NULL,
  `activate_menu` varchar(255) NOT NULL,
  `activate_not` varchar(255) NOT NULL,
  `base_url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_state`
--

CREATE TABLE `sm_state` (
  `id` int(11) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_state`
--

INSERT INTO `sm_state` (`id`, `state`) VALUES
(1, 'Jammu and Kashmir'),
(2, 'Himachal Pradesh'),
(3, 'Punjab'),
(4, 'Chandigarh'),
(5, 'Uttarakhand'),
(6, 'Haryana'),
(7, 'Delhi'),
(8, 'Rajasthan'),
(9, 'Uttar Pradesh'),
(10, 'Bihar'),
(11, 'Sikkim'),
(12, 'Arunachal Pradesh'),
(13, 'Nagaland'),
(14, 'Manipur'),
(15, 'Mizoram'),
(16, 'Tripura'),
(17, 'Meghalaya'),
(18, 'Assam'),
(19, 'West Bengal'),
(20, 'Jharkhand'),
(21, 'Odisha'),
(22, 'Chattisgarh'),
(23, 'Madhya Pradesh'),
(24, 'Gujarat'),
(25, 'Daman and Diu'),
(26, 'Dadra and Nagar Haveli'),
(27, 'Maharashtra'),
(28, 'Karnataka'),
(29, 'Goa'),
(30, 'Lakshadweep Islands'),
(31, 'Kerala'),
(32, 'Tamil Nadu'),
(33, 'Pondicherry'),
(34, 'Andaman and Nicobar Islands'),
(35, 'Telangana'),
(36, 'Andhra Pradesh');

-- --------------------------------------------------------

--
-- Table structure for table `sm_users`
--

CREATE TABLE `sm_users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `vp` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sm_users`
--

INSERT INTO `sm_users` (`id`, `username`, `mobile`, `name`, `email`, `password`, `vp`, `role`, `salt`, `otp`, `token`, `status`, `created_on`, `updated_on`) VALUES
(1, 'admin', '7894561230', 'Admin', 'admin@gmail.com', '$2y$10$mF8Uapcuw4exB74P9URWceTTk.BpVYMLo0WPKxRprZffGNnoHhUyC', '12345', 'admin', 'GWzvqSPLxUkrKCM0', '5e74a5b009e1b7c3f7c49c40bbba95fc', '', 1, '2020-01-07 17:05:51', '2022-02-04 20:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `sm_user_discounts`
--

CREATE TABLE `sm_user_discounts` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_ward`
--

CREATE TABLE `sm_ward` (
  `id` int(11) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `hca_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sm_working_hours`
--

CREATE TABLE `sm_working_hours` (
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `24hours` tinyint(1) NOT NULL DEFAULT 0,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sm_category`
--
ALTER TABLE `sm_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_constituency`
--
ALTER TABLE `sm_constituency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_discount_slab`
--
ALTER TABLE `sm_discount_slab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_district`
--
ALTER TABLE `sm_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_hospital`
--
ALTER TABLE `sm_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_images`
--
ALTER TABLE `sm_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_members`
--
ALTER TABLE `sm_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_reviews`
--
ALTER TABLE `sm_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_sidebar`
--
ALTER TABLE `sm_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_state`
--
ALTER TABLE `sm_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_users`
--
ALTER TABLE `sm_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sm_user_discounts`
--
ALTER TABLE `sm_user_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_ward`
--
ALTER TABLE `sm_ward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_working_hours`
--
ALTER TABLE `sm_working_hours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sm_category`
--
ALTER TABLE `sm_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sm_constituency`
--
ALTER TABLE `sm_constituency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `sm_discount_slab`
--
ALTER TABLE `sm_discount_slab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sm_district`
--
ALTER TABLE `sm_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sm_hospital`
--
ALTER TABLE `sm_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_images`
--
ALTER TABLE `sm_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_members`
--
ALTER TABLE `sm_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_reviews`
--
ALTER TABLE `sm_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_sidebar`
--
ALTER TABLE `sm_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_state`
--
ALTER TABLE `sm_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sm_users`
--
ALTER TABLE `sm_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sm_user_discounts`
--
ALTER TABLE `sm_user_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_ward`
--
ALTER TABLE `sm_ward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_working_hours`
--
ALTER TABLE `sm_working_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
