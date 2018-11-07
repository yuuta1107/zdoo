ALTER TABLE `crm_plan` ADD `tradeID` mediumint(8) UNSIGNED NOT NULL AFTER id;
ALTER TABLE `oa_lieu` ADD `trip` char(255) NOT NULL AFTER `overtime`;
ALTER TABLE `oa_refund` ADD `invoice` DECIMAL(12,2)  NOT NULL  AFTER `money`;
UPDATE `oa_refund` SET `invoice` = `money`;
ALTER TABLE `sys_user` ADD `weixin` char(50) NOT NULL AFTER `qq`;
