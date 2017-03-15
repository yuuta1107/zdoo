UPDATE `sys_block` SET `app`='sys',`source`='proj' WHERE `app`='sys' AND `source`='oa' AND `block` in ('project','task');
