INSERT INTO `bus` (`id`, `type`, `arrangement`, `registration_number`, `capacity`, `is_available`, `make`, `model`, `added_by`, `added_on`, `updated_by`, `updated_on`)
VALUES
	(1, 0, 0, 'MA1234', 30, 1, 'Mazda', '470AX', 1, '2014-11-28 09:29:23', 1, '2014-11-28 09:29:23'),
	(2, 1, 0, 'MA1235', 30, 1, 'TATA', '470AX', 1, '2014-11-28 09:29:23', 1, '2014-11-28 09:29:23'),
	(3, 0, 1, 'MA1236', 30, 1, 'Ashok Layland', '470AX', 1, '2014-11-28 09:29:23', 1, '2014-11-28 09:29:23'),
	(4, 1, 1, 'MA1237', 30, 1, 'Volvo', '470AX', 1, '2014-11-28 09:29:23', 1, '2014-11-28 09:29:23');


INSERT INTO `travel_company` (`id`, `name`, `added_by`, `added_on`, `updated_by`, `updated_on`)
VALUES
	(1, 'Combi Travels', 1, '2014-11-28 09:32:58', 1, '2014-11-28 09:32:58'),
	(2, 'Happy Travels', 1, '2014-11-28 09:33:38', 1, '2014-11-28 09:33:38');

INSERT INTO `bus_travel_company_mapping` (`id`, `bus_id`, `travel_company_id`, `added_by`, `added_on`, `updated_by`, `updated_on`)
VALUES
	(1, 1, 1, 1, '2014-11-28 09:34:01', 1, '2014-11-28 09:34:01'),
	(2, 2, 2, 1, '2014-11-28 09:34:01', 1, '2014-11-28 09:34:01'),
	(3, 3, 1, 1, '2014-11-28 09:34:01', 1, '2014-11-28 09:34:01'),		
	(4, 4, 2, 1, '2014-11-28 09:34:01', 1, '2014-11-28 09:34:01');
	
INSERT INTO `seat` (`id`, `bus_id`, `seat_name`, `is_window_seat`, `added_by`, `added_on`, `updated_by`, `updated_on`)
VALUES
	(1, 1, '1', 1, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(2, 1, '2', 0, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(3, 1, '3', 1, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(4, 1, '4', 0, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(5, 2, '1', 1, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(6, 2, '2', 0, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(7, 2, '3', 1, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(8, 2, '4', 0, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(9, 3, '1', 1, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(10, 3, '2', 0, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(11, 3, '3', 1, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(12, 3, '4', 0, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(13, 4, '1', 1, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(14, 4, '2', 0, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(15, 4, '3', 1, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57'),
	(16, 4, '4', 0, 1, '2014-11-28 09:37:57', 1, '2014-11-28 09:37:57');
	
ALTER TABLE schedule 
DROP FOREIGN KEY schedule_ibfk_1;
ALTER TABLE schedule 
CHANGE COLUMN bus_id bus_travel_company_mapping_id BIGINT(20) UNSIGNED NOT NULL ;
ALTER TABLE schedule 
ADD CONSTRAINT schedule_ibfk_1
  FOREIGN KEY (bus_travel_company_mapping_id)
  REFERENCES bus_travel_company_mapping (id);

INSERT INTO `frequency` (`id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `added_by`, `added_on`, `updated_by`, `updated_on`)
VALUES
	(1, 1, 1, 1, 1, 1, 1, 1, 1, '2014-11-28 10:17:30', 1, '2014-11-28 10:17:15'),
	(2, 1, 1, 1, 1, 1, 0, 0, 1, '2014-11-28 10:17:30', 1, '2014-11-28 10:17:30');


ALTER TABLE `fare` 
DROP FOREIGN KEY `fare_ibfk_3`;
ALTER TABLE `fare` 
CHANGE COLUMN `bus_id` `bus_travel_company_mapping_id` BIGINT(20) UNSIGNED NOT NULL ;
ALTER TABLE `fare` 
ADD CONSTRAINT `fare_ibfk_3`
  FOREIGN KEY (`bus_travel_company_mapping_id`)
  REFERENCES `bus_travel_company_mapping` (`id`);

INSERT INTO `schedule` (`id`, `bus_travel_company_mapping_id`, `route_id`, `frequency_id`, `departure_time`, `valid_until`, `added_by`, `added_on`, `updated_by`, `updated_on`)
VALUES
	(1, 1, 1, 1, '2014-11-28 10:19:09', '2015-11-28 10:19:05', 1, '2014-11-28 10:19:05', 1, '2014-11-28 10:19:05'),
	(2, 2, 2, 1, '2014-11-28 10:19:09', '2014-09-28 10:19:05', 1, '2014-11-28 10:19:05', 1, '2014-11-28 10:19:05'),	
	(3, 3, 3, 1, '2014-11-28 10:19:09', NULL, 1, '2014-11-28 10:19:05', 1, '2014-11-28 10:19:05'),
	(4, 4, 4, 2, '2014-11-28 10:19:09', NULL, 1, '2014-11-28 10:19:05', 1, '2014-11-28 10:19:05'),
	(5, 1, 1, 2, '2014-11-28 10:19:09', NULL, 1, '2014-11-28 10:19:05', 1, '2014-11-28 10:19:05');		

ALTER TABLE `fare` 
DROP FOREIGN KEY `fare_ibfk_3`;
ALTER TABLE `fare` 
CHANGE COLUMN `bus_id` `bus_travel_company_mapping_id` BIGINT(20) UNSIGNED NOT NULL ;
ALTER TABLE `fare` 
ADD CONSTRAINT `fare_ibfk_3`
  FOREIGN KEY (`bus_travel_company_mapping_id`)
  REFERENCES `bus_travel_company_mapping` (`id`);

INSERT INTO `fare` (`id`, `bus_travel_company_mapping_id`, `route_id`, `fare_type`, `fare_amount`, `added_by`, `added_on`, `updated_by`, `updated_on`)
VALUES
	(1, 1, 1, 0, 400, 1, '2014-11-28 10:26:31', 1, '2014-11-28 10:26:31'),
	(2, 2, 2, 0, 400, 1, '2014-11-28 10:26:31', 1, '2014-11-28 10:26:31'),
	(3, 3, 3, 0, 200, 1, '2014-11-28 10:26:31', 1, '2014-11-28 10:26:31'),
	(4, 4, 4, 0, 200, 1, '2014-11-28 10:26:31', 1, '2014-11-28 10:26:31'),
	(5, 1, 1, 0, 400, 1, '2014-11-28 10:26:31', 1, '2014-11-28 10:26:31');
	