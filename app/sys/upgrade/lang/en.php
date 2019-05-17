<?php
/**
 * The upgrade module English file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     upgrade
 * @version     $Id: en.php 4185 2016-10-21 07:44:16Z liugang $
 * @link        http://www.zdoo.org
 */
$lang->upgrade = new stdclass();
$lang->upgrade->common  = 'Upgrade';

$lang->upgrade->result  = 'Result';
$lang->upgrade->fail    = 'Failed';
$lang->upgrade->success = 'Upgraded';
$lang->upgrade->tohome  = 'Back';

$lang->upgrade->index         = 'Upgrad Zdoo';
$lang->upgrade->backup        = 'Back Up';
$lang->upgrade->selectVersion = 'Select version to upgrade';
$lang->upgrade->confirm       = 'Confirm the SQL to be excuted.';
$lang->upgrade->execute       = 'Execute';
$lang->upgrade->next          = 'Next';
$lang->upgrade->redeploy      = 'Please re-deploy the App directory before upgrade.';
$lang->upgrade->redeployDesc  = "<h5>If any code changes, the App directory has to be deployed.</h5><div class='text-important'>operating steps: delete app directory before copy new package.</div>";
$lang->upgrade->removeTodo    = 'Please remove %s directory before upgrading.';
$lang->upgrade->removeTodoTip = "<h5>If any code changes, %s directory has to be removed.</h5><div class='text-important'>operating steps: delete directory of %s.</div>";
$lang->upgrade->updateLicense = 'The Zdoo license has changed to Z PUBLIC LICENSE(ZPL) 1.1.';

$lang->upgrade->majorList['3_5'] = array();
$lang->upgrade->majorList['3_5']['1'] = 'Primary Income';
$lang->upgrade->majorList['3_5']['2'] = 'Primary Income';
$lang->upgrade->majorList['3_5']['3'] = 'Non-Primary Expense';
$lang->upgrade->majorList['3_5']['4'] = 'Non-Primary Expense';

$lang->upgrade->majorList['3_6'] = array();
$lang->upgrade->majorList['3_6']['5'] = 'Invest Profit';
$lang->upgrade->majorList['3_6']['6'] = 'Invest loss';
$lang->upgrade->majorList['3_6']['7'] = 'Fee';
$lang->upgrade->majorList['3_6']['8'] = 'Loan interest';

$lang->upgrade->backupData = <<<EOT
<pre>
<strong>Using phpMyAdmin or mysqldump to back up the database.</strong>
<code class='red'>$ mysqldump -u %s</span> -p%s %s > ranzhi.sql</code>
</pre>
EOT;

$lang->upgrade->versionNote = "Please choose the version to upgrade.";

$lang->upgrade->deleteTips   = 'You have to delete some files. The commands in Linux are:<br />';
$lang->upgrade->deleteDir    = '<code>rm -fr %s</code>';
$lang->upgrade->deleteFile   = '<code>rm %s</code>';
$lang->upgrade->afterDeleted = '<br />Refresh after delete.';

include 'version.php';
