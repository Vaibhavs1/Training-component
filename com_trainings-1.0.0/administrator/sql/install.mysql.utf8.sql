CREATE TABLE IF NOT EXISTS `#__trainings_list` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`trainingid` VARCHAR(255)  NOT NULL ,
`topicname` VARCHAR(255)  NOT NULL ,
`titleen` VARCHAR(255)  NOT NULL ,
`descriptionen` text NOT NULL ,
`startdate` VARCHAR(255)  NOT NULL ,
`starttime` VARCHAR(255)  NOT NULL ,
`testdate` VARCHAR(255)  NOT NULL ,
`traininglanguage` VARCHAR(255)  NOT NULL ,
`businessunitcode` VARCHAR(255)  NOT NULL ,
`businessunitname` VARCHAR(255)  NOT NULL ,
`topiclogo` VARCHAR(255)  NOT NULL ,
`trainingtype` VARCHAR(255)  NOT NULL ,
`trainingtypecode` VARCHAR(255)  NOT NULL ,
`availableseats` VARCHAR(255)  NOT NULL ,
`isloggedin` VARCHAR(255)  NOT NULL ,
`issubscribed` VARCHAR(255)  NOT NULL ,
`topiccovered` VARCHAR(500)  NOT NULL ,
`topicrequirements` VARCHAR(500)  NOT NULL ,
`topicprice` VARCHAR(255)  NOT NULL ,
`categoriesname` VARCHAR(255)  NOT NULL ,
`targetaudience` VARCHAR(255)  NOT NULL ,
`sessionduration` VARCHAR(255)  NOT NULL ,
`locationname` VARCHAR(255)  NOT NULL ,
`locationurl` VARCHAR(255)  NOT NULL ,
`topicpaid` VARCHAR(255)  NOT NULL ,
`topicdesc` VARCHAR(255)  NOT NULL ,
`trainername` VARCHAR(255)  NOT NULL ,
`schedulelist` text  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;



CREATE TABLE IF NOT EXISTS `#__trainings_faq` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`modified_by` INT(11)  NOT NULL ,
`categoryname` VARCHAR(255)  NOT NULL ,
`question` VARCHAR(255)  NOT NULL ,
`answer` text NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__trainer_details` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`modified_by` INT(11)  NOT NULL ,
`trainerimage` TEXT NOT NULL ,
`trainerdesc` TEXT NOT NULL ,
`trainername` VARCHAR(255)  NOT NULL ,
`trainerdesignation` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;



