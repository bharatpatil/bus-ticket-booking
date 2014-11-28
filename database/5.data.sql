ALTER TABLE `schedule` 
CHANGE COLUMN `departure_time` `departure_time` TIME NOT NULL ;

update schedule set departure_time = '21:00:00' where id in (1,2);
update schedule set departure_time = '12:00:00' where id in (3,4);
update schedule set departure_time = '20:30:00' where id in (5);