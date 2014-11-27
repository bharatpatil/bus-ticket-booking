# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.20)
# Database: bus_book
# Generation Time: 2014-11-27 08:53:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table booking
# ------------------------------------------------------------

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bus_id` bigint(20) unsigned NOT NULL,
  `route_id` bigint(20) unsigned NOT NULL,
  `number_of_adults` int(10) unsigned DEFAULT NULL,
  `number_of_children` int(10) unsigned DEFAULT NULL,
  `booking_datetime` datetime NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email_address` varchar(512) NOT NULL DEFAULT '0',
  `contact_number` int(10) NOT NULL DEFAULT '0',
  `is_canceled` int(1) NOT NULL DEFAULT '0' COMMENT '0 - not canceled, 1 - canceled',
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `added_by` (`added_by`),
  KEY `updated_by` (`updated_by`),
  KEY `bus_id` (`bus_id`),
  KEY `route_id` (`route_id`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`),
  CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`),
  CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `booking_ibfk_6` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table booking_seat_mapping
# ------------------------------------------------------------

DROP TABLE IF EXISTS `booking_seat_mapping`;

CREATE TABLE `booking_seat_mapping` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `seat_id` bigint(20) unsigned NOT NULL,
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `added_by` (`added_by`),
  KEY `updated_by` (`updated_by`),
  KEY `booking_id` (`booking_id`),
  KEY `seat_id` (`seat_id`),
  CONSTRAINT `booking_seat_mapping_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`),
  CONSTRAINT `booking_seat_mapping_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `booking_seat_mapping` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table bus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bus`;

CREATE TABLE `bus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL COMMENT '0 NON-AC, 1 AC',
  `arrangement` int(1) NOT NULL COMMENT '0 non-sleeper, 1 sleeper',
  `registration_number` varchar(255) NOT NULL DEFAULT '' COMMENT 'police registration number',
  `capacity` int(3) DEFAULT NULL COMMENT 'total seats',
  `is_available` int(1) DEFAULT NULL COMMENT '0 under maintanance, 1 available, 2 not-available',
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_bus_added_by` (`added_by`),
  KEY `idx_user_bus_updated_by` (`updated_by`),
  CONSTRAINT `fk_user_bus_added_by` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_bus_modified_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table bus_travel_company_mapping
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bus_travel_company_mapping`;

CREATE TABLE `bus_travel_company_mapping` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bus_id` bigint(20) unsigned NOT NULL,
  `travel_company_id` bigint(20) unsigned NOT NULL,
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_bus_travel_company_mapping_added_by` (`added_by`),
  KEY `idx_user_bus_travel_company_mapping_updated_by` (`updated_by`),
  KEY `fk_bus_bus_travel_company_mapping_bus_id` (`bus_id`),
  KEY `fk_bus_bus_travel_company_mapping_travel_company_id` (`travel_company_id`),
  CONSTRAINT `fk_bus_bus_travel_company_mapping_bus_id` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`),
  CONSTRAINT `fk_bus_bus_travel_company_mapping_travel_company_id` FOREIGN KEY (`travel_company_id`) REFERENCES `bus_travel_company_mapping` (`id`),
  CONSTRAINT `fk_user_bus_travel_company_mapping_added_by` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_bus_travel_company_mapping_modified_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table fare
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fare`;

CREATE TABLE `fare` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bus_id` bigint(20) unsigned NOT NULL,
  `route_id` bigint(20) unsigned NOT NULL,
  `fare_type` int(1) unsigned NOT NULL COMMENT '0 - adult, 1-children',
  `fare_amount` int(20) unsigned NOT NULL,
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `added_by` (`added_by`),
  KEY `updated_by` (`updated_by`),
  KEY `bus_id` (`bus_id`),
  KEY `route_id` (`route_id`),
  CONSTRAINT `fare_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fare_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fare_ibfk_3` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`),
  CONSTRAINT `fare_ibfk_4` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table frequency
# ------------------------------------------------------------

DROP TABLE IF EXISTS `frequency`;

CREATE TABLE `frequency` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `monday` int(10) unsigned NOT NULL DEFAULT '0',
  `tuesday` int(10) unsigned NOT NULL DEFAULT '0',
  `wednesday` int(10) unsigned NOT NULL DEFAULT '0',
  `thursday` int(10) unsigned NOT NULL DEFAULT '0',
  `friday` int(10) unsigned NOT NULL DEFAULT '0',
  `saturday` int(10) unsigned NOT NULL DEFAULT '0',
  `sunday` int(10) unsigned NOT NULL DEFAULT '0',
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `added_by` (`added_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `frequency_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `frequency_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table route
# ------------------------------------------------------------

DROP TABLE IF EXISTS `route`;

CREATE TABLE `route` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(512) NOT NULL DEFAULT '',
  `to` varchar(512) NOT NULL DEFAULT '',
  `journey_duration` int(10) NOT NULL COMMENT 'duration in minutes',
  `distance` int(10) DEFAULT NULL COMMENT 'distance in km',
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `is_available` int(1) NOT NULL DEFAULT '0' COMMENT '0 - no, 1 - yes',
  PRIMARY KEY (`id`),
  KEY `idx_user_route_added_by` (`added_by`),
  KEY `idx_user_route_updated_by` (`updated_by`),
  CONSTRAINT `fk_user_route_added_by` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_route_modified_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table schedule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bus_id` bigint(20) unsigned NOT NULL,
  `route_id` bigint(20) unsigned NOT NULL,
  `frequency_id` bigint(20) unsigned NOT NULL,
  `departure_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valid_until` timestamp NULL DEFAULT NULL,
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bus_id` (`bus_id`),
  KEY `route_id` (`route_id`),
  KEY `frequency_id` (`frequency_id`),
  KEY `added_by` (`added_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`),
  CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`),
  CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`frequency_id`) REFERENCES `frequency` (`id`),
  CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table seat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seat`;

CREATE TABLE `seat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bus_id` bigint(20) unsigned NOT NULL,
  `seat_name` varchar(255) NOT NULL DEFAULT '',
  `is_window_seat` int(1) DEFAULT NULL COMMENT '0 - not window seat, 1 - window seat',
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `added_by` (`added_by`),
  KEY `updated_by` (`updated_by`),
  KEY `bus_id` (`bus_id`),
  CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `seat_ibfk_3` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table travel_company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `travel_company`;

CREATE TABLE `travel_company` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL DEFAULT '',
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_travel_company_added_by` (`added_by`),
  KEY `idx_user_travel_company_updated_by` (`updated_by`),
  CONSTRAINT `fk_user_travel_company_added_by` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_travel_company_modified_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(512) NOT NULL DEFAULT '',
  `password` varchar(512) NOT NULL DEFAULT '',
  `role` int(1) NOT NULL COMMENT '0 - admin, 1-user',
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_user_added_by` (`added_by`),
  KEY `idx_user_user_updated_by` (`updated_by`),
  CONSTRAINT `fk_user_user_added_by` FOREIGN KEY (`added_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_user_modified_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
