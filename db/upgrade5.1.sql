ALTER TABLE `oa_refund` ADD `payee` varchar(30) NOT NULL AFTER `dept`;
ALTER TABLE `sys_product` ADD `subject` mediumint(8) unsigned NOT NULL DEFAULT '0' AFTER `category`;
ALTER TABLE `sys_category` ADD `deleted` enum('0', '1') NOT NULL DEFAULT '0';

ALTER TABLE `oa_overtime` CHANGE `hours` `hours` float unsigned NOT NULL;
ALTER TABLE `oa_leave` CHANGE `hours` `hours` float unsigned NOT NULL;
ALTER TABLE `oa_lieu` CHANGE `hours` `hours` float unsigned NOT NULL;
ALTER TABLE `oa_refund` CHANGE `name` `name` char(150) NOT NULL AFTER `dept`;
ALTER TABLE `sys_team` CHANGE `hours` `hours` float unsigned NOT NULL;

UPDATE `oa_refund` SET `payee` = `createdBy` WHERE `payee` = '';
