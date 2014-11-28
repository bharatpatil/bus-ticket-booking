ALTER TABLE `schedule` 
CHANGE COLUMN `departure_time` `departure_time` TIME NOT NULL ;

update schedule set departure_time = '21:00:00' where id in (1,2);
update schedule set departure_time = '12:00:00' where id in (3,4);
update schedule set departure_time = '20:30:00' where id in (5);


ALTER TABLE `route` 
DROP FOREIGN KEY `fk_city_from`,
DROP FOREIGN KEY `fk_city_to`;
ALTER TABLE `route` 
CHANGE COLUMN `from` `source_city` BIGINT(20) UNSIGNED NOT NULL ,
CHANGE COLUMN `to` `destination_city` BIGINT(20) UNSIGNED NOT NULL ;
ALTER TABLE `route` 
ADD CONSTRAINT `fk_city_from`
  FOREIGN KEY (`source_city`)
  REFERENCES `city` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_city_to`
  FOREIGN KEY (`destination_city`)
  REFERENCES `city` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
