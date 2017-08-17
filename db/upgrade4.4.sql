UPDATE `sys_product` SET `line` = '' WHERE `line` = 'default';
UPDATE `sys_file` SET `objectType` = 'avatar' WHERE `objectType` = 'files';

ALTER TABLE `crm_contract` CHANGE `address` `address` mediumint(8) unsigned NOT NULL;
