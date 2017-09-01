UPDATE `cash_trade` SET `exchangeRate` = 1 WHERE `currency` = (SELECT `value` FROM `sys_config` WHERE `owner` = 'system' AND `app` = 'sys' AND `module` = 'setting' AND `key` = 'mainCurrency');
