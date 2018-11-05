ALTER TABLE `crm_plan` ADD tradeID mediumint(8) UNSIGNED NOT NULL AFTER id;
ALTER TABLE `os_oa_refund` ADD `invoice` DECIMAL(12,2)  NOT NULL  AFTER `money`;
