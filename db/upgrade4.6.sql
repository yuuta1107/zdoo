INSERT INTO `sys_category` (type,name,alias,parent,grade) SELECT 'product', value, `key`, 0, 1 from sys_lang WHERE module = 'product' AND section = 'lineList';
UPDATE `sys_category` SET path = concat(',', id , ',') WHERE type = 'product' AND path = '';
UPDATE `sys_product`, `sys_category` SET `sys_product`.line = `sys_category`.id WHERE `sys_product`.line = `sys_category`.alias and  `sys_category`.type = 'product';
ALTER TABLE `sys_product` CHANGE line category mediumint(8) UNSIGNED NOT NULL DEFAULT 0;
ALTER TABLE `sys_product` ADD `order` mediumint(8) UNSIGNED NOT NULL DEFAULT 0;
