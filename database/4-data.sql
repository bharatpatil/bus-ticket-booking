SET foreign_key_checks=0;
truncate route;


CREATE TABLE `city` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL DEFAULT '',
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `city` (`id`, `name`, `added_by`, `added_on`, `updated_by`, `updated_on`)
VALUES
	(1, 'City1', 1, '2014-11-28 10:44:34', 1, '2014-11-28 10:44:34'),
	(2, 'City2', 1, '2014-11-28 10:44:34', 1, '2014-11-28 10:44:34'),
	(3, 'City3', 1, '2014-11-28 10:44:34', 1, '2014-11-28 10:44:34'),
	(4, 'City4', 1, '2014-11-28 10:44:34', 1, '2014-11-28 10:44:34');


ALTER TABLE `route` 
CHANGE COLUMN `from` `from` BIGINT(20) UNSIGNED NOT NULL DEFAULT '' ,
CHANGE COLUMN `to` `to` BIGINT(20) UNSIGNED NOT NULL DEFAULT '' ,
ADD INDEX `fk_city_from_idx` (`from` ASC),
ADD INDEX `fk_city_to_idx` (`to` ASC);
ALTER TABLE `route` 
ADD CONSTRAINT `fk_city_from`
  FOREIGN KEY (`from`)
  REFERENCES `city` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_city_to`
  FOREIGN KEY (`to`)
  REFERENCES `city` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

INSERT INTO `route` (`id`, `from`, `to`, `journey_duration`, `distance`, `added_by`, `added_on`, `updated_by`, `updated_on`, `is_available`)
VALUES
	(1, 1, 2, 480, 250, 1, '2014-11-28 10:00:23', 1, '2014-11-28 10:00:23', 1),
	(2, 2, 1, 480, 250, 1, '2014-11-28 10:00:23', 1, '2014-11-28 10:00:23', 1),
	(3, 2, 3, 240, 150, 1, '2014-11-28 10:00:23', 1, '2014-11-28 10:00:23', 1),
	(4, 3, 2, 240, 150, 1, '2014-11-28 10:00:23', 1, '2014-11-28 10:00:23', 1);


SET foreign_key_checks=1;