ALTER TABLE `sys_config` ADD `app` varchar(30) COLLATE 'utf8_general_ci' NOT NULL DEFAULT 'sys' AFTER `owner`;
ALTER TABLE `sys_config` ADD UNIQUE `unique` (`owner`, `app`, `module`, `section`, `key`),
DROP INDEX `unique`;

CREATE TABLE IF NOT EXISTS `crm_product` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `code` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `summary` text NOT NULL,
  `createdBy` varchar(60) NOT NULL,
  `createDate` datetime NOT NULL,
  `editedBy` varchar(60) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;
