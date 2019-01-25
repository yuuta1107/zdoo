ALTER TABLE `sys_team` ADD `rate` decimal(6,2) unsigned NOT NULL;
ALTER TABLE `sys_team` ADD `status` enum('wait', 'accept', 'reject') NOT NULL DEFAULT 'wait';
ALTER TABLE `sys_schema` ADD `handlers` char(10) NOT NULL;
ALTER TABLE `cash_trade` ADD `time` time NOT NULL AFTER `date`;
