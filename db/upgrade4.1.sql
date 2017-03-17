UPDATE `sys_block` SET `app`='sys',`source`='proj' WHERE `app`='sys' AND `source`='oa' AND `block` in ('project','task');

ALTER TABLE `crm_contract` ADD `address` varchar(255) NOT NULL AFTER `contact`;
