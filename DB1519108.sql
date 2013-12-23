-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2013 at 08:10 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db1519108`
--
CREATE DATABASE IF NOT EXISTS `db1519108` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db1519108`;

-- --------------------------------------------------------

--
-- Table structure for table `client_address`
--

CREATE TABLE IF NOT EXISTS `client_address` (
  `address_id` int(8) NOT NULL,
  `client_id` varchar(15) NOT NULL,
  `street` varchar(45) NOT NULL,
  `house_no` int(11) NOT NULL,
  `postal_code` varchar(15) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contract_partner` varchar(45) DEFAULT NULL,
  `address_type` varchar(25) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `fk_client_address_client_basic_info1_idx` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_address_analysis`
--

CREATE TABLE IF NOT EXISTS `client_address_analysis` (
  `address_id` int(11) NOT NULL,
  `peak_usage` varchar(20) NOT NULL,
  `peak_usage_details` varchar(100) DEFAULT NULL,
  `energy_usage_details` varchar(150) DEFAULT NULL,
  `living_area` varchar(10) NOT NULL,
  `no_of_floors` smallint(6) NOT NULL,
  `new_building` tinyint(1) NOT NULL,
  `year_built` char(4) NOT NULL,
  `house_or_flat` varchar(10) NOT NULL,
  `building_details` varchar(45) NOT NULL,
  `no_of_people` char(2) NOT NULL,
  `energy_saving_optimized` tinyint(1) NOT NULL,
  `past_energy_usage_change` tinyint(1) NOT NULL,
  `past_details` varchar(100) DEFAULT NULL,
  `future_energy_usage_change` tinyint(1) NOT NULL,
  `future_details` varchar(100) DEFAULT NULL,
  `plan_to_move` tinyint(1) NOT NULL,
  `moving_date` date DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `fk_client_address_analysis_client_address1_idx` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_address_has_client_private_tariff_wish`
--

CREATE TABLE IF NOT EXISTS `client_address_has_client_private_tariff_wish` (
  `address_id` int(11) NOT NULL,
  `wish_id` int(11) NOT NULL,
  PRIMARY KEY (`address_id`,`wish_id`),
  KEY `fk_client_address_has_client_private_tariff_wish_client_pri_idx` (`wish_id`),
  KEY `fk_client_address_has_client_private_tariff_wish_client_add_idx` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_bank`
--

CREATE TABLE IF NOT EXISTS `client_bank` (
  `client_id` varchar(15) NOT NULL,
  `account_owner` varchar(100) DEFAULT NULL,
  `iban` varchar(45) DEFAULT NULL,
  `bic` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`client_id`),
  KEY `fk_client_bank_client_basic_info1_idx` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_basic_info`
--

CREATE TABLE IF NOT EXISTS `client_basic_info` (
  `client_id` varchar(15) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gender` varchar(10) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `birth_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `client_id_UNIQUE` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_business_tariff_wish`
--

CREATE TABLE IF NOT EXISTS `client_business_tariff_wish` (
  `wish_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`wish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_contact`
--

CREATE TABLE IF NOT EXISTS `client_contact` (
  `client_id` varchar(15) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_method` varchar(10) NOT NULL,
  `contact_timing` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`client_id`),
  KEY `fk_client_contact_client_basic_info1_idx` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_documents`
--

CREATE TABLE IF NOT EXISTS `client_documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(45) NOT NULL,
  `file_type` varchar(45) NOT NULL,
  `file_size` varchar(45) NOT NULL,
  `file_content` mediumblob NOT NULL,
  `document_type` varchar(45) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`document_id`),
  KEY `fk_client_documents_client_order1_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_meter`
--

CREATE TABLE IF NOT EXISTS `client_meter` (
  `meter_id` int(11) NOT NULL AUTO_INCREMENT,
  `meter_type` tinyint(4) NOT NULL,
  `meter_no` varchar(45) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`meter_id`),
  KEY `fk_client_meter_client_address1_idx` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_meter_contract`
--

CREATE TABLE IF NOT EXISTS `client_meter_contract` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_no` varchar(45) NOT NULL,
  `contract_account_no` varchar(45) DEFAULT NULL,
  `contract_no` varchar(45) DEFAULT NULL,
  `contract_start_date` date NOT NULL,
  `contract_period` varchar(45) NOT NULL,
  `contract_cancellation_deadline` varchar(45) NOT NULL,
  `price_guarantee_period` varchar(45) DEFAULT NULL,
  `deposit_amount` varchar(10) DEFAULT NULL,
  `bonus_amount` varchar(10) DEFAULT NULL,
  `payment_method` varchar(45) NOT NULL,
  `partial_payment_no` smallint(6) NOT NULL,
  `amount_per_payement` varchar(10) NOT NULL,
  `base_unit_price` varchar(10) NOT NULL,
  `secondary_unit_price` varchar(10) DEFAULT NULL,
  `high_power_kw_price` varchar(10) DEFAULT NULL,
  `monthly_base_price` varchar(10) NOT NULL,
  `meter_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  PRIMARY KEY (`contract_id`,`meter_id`),
  KEY `fk_client_meter_contract_client_meter1_idx` (`meter_id`),
  KEY `fk_client_meter_contract_providers1_idx` (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_meter_usage`
--

CREATE TABLE IF NOT EXISTS `client_meter_usage` (
  `usage_id` int(11) NOT NULL AUTO_INCREMENT,
  `reading_date` date DEFAULT NULL,
  `meter_reading` varchar(45) DEFAULT NULL,
  `meter_id` int(11) NOT NULL,
  PRIMARY KEY (`usage_id`),
  KEY `fk_client_meter_usage_client_meter1_idx` (`meter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_order`
--

CREATE TABLE IF NOT EXISTS `client_order` (
  `order_id` int(10) NOT NULL,
  `contract_type` varchar(45) NOT NULL,
  `client_id` varchar(15) NOT NULL,
  `sending_method` tinyint(1) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_client_order_client_basic_info1_idx` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_private_tariff_wish`
--

CREATE TABLE IF NOT EXISTS `client_private_tariff_wish` (
  `wish_id` int(11) NOT NULL AUTO_INCREMENT,
  `energy_source_type` varchar(45) NOT NULL,
  `energy_source_details` varchar(100) DEFAULT NULL,
  `tariff_type` varchar(15) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_period` varchar(15) NOT NULL,
  `deposit` tinyint(1) NOT NULL,
  `package_tariff` tinyint(1) NOT NULL,
  `price_guarantee` varchar(20) NOT NULL,
  `preferred_runtime` varchar(25) NOT NULL,
  `bonus` tinyint(1) NOT NULL,
  `usage_calc_tariff` tinyint(1) NOT NULL,
  `meter_id` int(11) NOT NULL,
  PRIMARY KEY (`wish_id`),
  KEY `fk_client_private_tariff_wish_client_meter1_idx` (`meter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE IF NOT EXISTS `employee_info` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` smallint(2) NOT NULL,
  `vp_id` smallint(3) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `postal_code` char(5) NOT NULL,
  `city` varchar(45) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_login_attempts`
--

CREATE TABLE IF NOT EXISTS `employee_login_attempts` (
  `employee_id` int(11) NOT NULL,
  `log_time` varchar(30) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_login_info`
--

CREATE TABLE IF NOT EXISTS `employee_login_info` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE IF NOT EXISTS `providers` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_type_id` smallint(6) NOT NULL,
  `provider_name` varchar(45) NOT NULL,
  `provider_street` varchar(45) NOT NULL,
  `provider_postal_code` varchar(10) NOT NULL,
  `provider_city` varchar(45) NOT NULL,
  `provider_phone` varchar(20) NOT NULL,
  `provider_fax` varchar(20) NOT NULL,
  `provider_email` varchar(45) NOT NULL,
  PRIMARY KEY (`provider_id`),
  KEY `provider_type_id` (`provider_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `provider_type`
--

CREATE TABLE IF NOT EXISTS `provider_type` (
  `provider_type_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`provider_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_address`
--
ALTER TABLE `client_address`
  ADD CONSTRAINT `fk_client_address_client_basic_info1` FOREIGN KEY (`client_id`) REFERENCES `client_basic_info` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_address_analysis`
--
ALTER TABLE `client_address_analysis`
  ADD CONSTRAINT `fk_client_address_analysis_client_address1` FOREIGN KEY (`address_id`) REFERENCES `client_address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_address_has_client_private_tariff_wish`
--
ALTER TABLE `client_address_has_client_private_tariff_wish`
  ADD CONSTRAINT `fk_client_address_has_client_private_tariff_wish_client_addre1` FOREIGN KEY (`address_id`) REFERENCES `client_address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_client_address_has_client_private_tariff_wish_client_priva1` FOREIGN KEY (`wish_id`) REFERENCES `client_private_tariff_wish` (`wish_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_bank`
--
ALTER TABLE `client_bank`
  ADD CONSTRAINT `fk_client_bank_client_basic_info1` FOREIGN KEY (`client_id`) REFERENCES `client_basic_info` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_contact`
--
ALTER TABLE `client_contact`
  ADD CONSTRAINT `fk_client_contact_client_basic_info1` FOREIGN KEY (`client_id`) REFERENCES `client_basic_info` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_documents`
--
ALTER TABLE `client_documents`
  ADD CONSTRAINT `fk_client_documents_client_order1` FOREIGN KEY (`order_id`) REFERENCES `client_order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_meter`
--
ALTER TABLE `client_meter`
  ADD CONSTRAINT `fk_client_meter_client_address1` FOREIGN KEY (`address_id`) REFERENCES `client_address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_meter_contract`
--
ALTER TABLE `client_meter_contract`
  ADD CONSTRAINT `fk_client_meter_contract_client_meter1` FOREIGN KEY (`meter_id`) REFERENCES `client_meter` (`meter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_client_meter_contract_providers1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`provider_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_meter_usage`
--
ALTER TABLE `client_meter_usage`
  ADD CONSTRAINT `fk_client_meter_usage_client_meter1` FOREIGN KEY (`meter_id`) REFERENCES `client_meter` (`meter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_order`
--
ALTER TABLE `client_order`
  ADD CONSTRAINT `fk_client_order_client_basic_info1` FOREIGN KEY (`client_id`) REFERENCES `client_basic_info` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_private_tariff_wish`
--
ALTER TABLE `client_private_tariff_wish`
  ADD CONSTRAINT `fk_client_private_tariff_wish_client_meter1` FOREIGN KEY (`meter_id`) REFERENCES `client_meter` (`meter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `providers_ibfk_1` FOREIGN KEY (`provider_type_id`) REFERENCES `provider_type` (`provider_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
