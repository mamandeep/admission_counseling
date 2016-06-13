use cupbt;

CREATE TABLE IF NOT EXISTS `reports` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `applicant_id` varchar(20) DEFAULT NULL,
  `std_id` bigint(20) DEFAULT NULL,
  `reg_id` bigint(20) DEFAULT NULL,
  `centre` varchar(100) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


alter table students 
CHANGE COLUMN pg_result ug_result varchar(20) DEFAULT NULL AFTER `score1`,
ADD COLUMN blood_group varchar(30) NULL DEFAULT NULL AFTER `category`,
ADD COLUMN hostel_accommodation varchar(20) NULL DEFAULT NULL AFTER `blood_group`,
ADD COLUMN blindness varchar(10) NULL DEFAULT NULL AFTER `pwd`,
ADD COLUMN blindness_pertge varchar(10) NULL DEFAULT NULL AFTER `blindness`,
ADD COLUMN hearing varchar(10) NULL DEFAULT NULL AFTER `blindness_pertge`,
ADD COLUMN hearing_pertge varchar(10) NULL DEFAULT NULL AFTER `hearing`,
ADD COLUMN locomotor varchar(10) NULL DEFAULT NULL AFTER `hearing_pertge`,
ADD COLUMN locomotor_pertge varchar(10) NULL DEFAULT NULL AFTER `locomotor`,
ADD COLUMN ug_course varchar(50) NULL DEFAULT NULL AFTER `ug_result`,
ADD COLUMN ug_univ varchar(100) NULL DEFAULT NULL AFTER `ug_course`,
ADD COLUMN ug_max_marks varchar(20) NULL DEFAULT NULL AFTER `ug_univ`,
ADD COLUMN ug_marks varchar(10) NULL DEFAULT NULL AFTER `ug_max_marks`,
CHANGE COLUMN gate_year_of_passing gate_gpat_year_of_passing varchar(20) DEFAULT NULL AFTER `ug_marks`,
CHANGE COLUMN gate_rollno gate_gpat_rollno varchar(20) DEFAULT NULL AFTER `gate_gpat_year_of_passing`,
CHANGE COLUMN gate_score gate_gpat_score varchar(10) DEFAULT NULL AFTER `gate_gpat_rollno`,
CHANGE COLUMN options_locked final_submit tinyint(4) DEFAULT NULL AFTER `payment_transaction_id`;