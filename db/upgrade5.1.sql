ALTER TABLE `sys_product` ADD `subject` mediumint(8) unsigned NOT NULL DEFAULT '0' AFTER `category`;
ALTER TABLE `sys_category` ADD `deleted` enum('0', '1') NOT NULL DEFAULT '0';
