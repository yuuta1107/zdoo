ALTER TABLE `cash_trade` CHANGE `exchangeRate` `exchangeRate` decimal(12,4) NOT NULL DEFAULT 1;
ALTER TABLE `sys_product` CHANGE `line` `line` varchar(30) NOT NULL;

UPDATE `cash_trade` SET `exchangeRate` = 1 WHERE `currency` = (SELECT `value` FROM `sys_config` WHERE `owner` = 'system' AND `app` = 'sys' AND `module` = 'setting' AND `key` = 'mainCurrency');
UPDATE `sys_product` SET `line` = '' WHERE `line` = 'default';
