ALTER TABLE `sys_entry` ADD `status` ENUM('online','offline')  NOT NULL  DEFAULT 'online'  AFTER `category`;
ALTER TABLE `sys_entry` ADD `package` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `block`;
ALTER TABLE `sys_entry` ADD `version` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `buildin`;
ALTER TABLE `sys_entry` ADD `target` VARCHAR(255) NOT NULL DEFAULT ',ranzhi,' AFTER `version`;
