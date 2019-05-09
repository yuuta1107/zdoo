<?php
/**
 * The English file of mail module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     mail 
 * @version     $Id: en.php 4029 2016-08-26 06:50:41Z liugang $
 * @link        http://www.zdoo.org
 */
$lang->mail->common = 'Email Settings';
$lang->mail->index  = 'Home';
$lang->mail->detect = 'Test';
$lang->mail->edit   = 'Configure';
$lang->mail->save   = 'Saved.';
$lang->mail->test   = 'Testing';
$lang->mail->reset  = 'Reset';

$lang->mail->turnon      = 'Switch';
$lang->mail->fromAddress = 'From Email';
$lang->mail->fromName    = 'From';
$lang->mail->mta         = 'MTA';
$lang->mail->host        = 'SMTP host';
$lang->mail->port        = 'SMTP port';
$lang->mail->auth        = 'Authentication';
$lang->mail->username    = 'SMTP account';
$lang->mail->password    = 'SMTP password';
$lang->mail->secure      = 'Secure';
$lang->mail->debug       = 'Debugging';

$lang->mail->turnonList[1] = 'On';
$lang->mail->turnonList[0] = 'Off';

$lang->mail->debugList[0] = 'off';
$lang->mail->debugList[1] = 'normal';
$lang->mail->debugList[2] = 'high';

$lang->mail->authList[1]  = 'required';
$lang->mail->authList[0]  = 'not required';

$lang->mail->secureList['']    = 'plain';
$lang->mail->secureList['ssl'] = 'ssl';
$lang->mail->secureList['tls'] = 'tls';

$lang->mail->inputFromEmail = 'Please enter Email address';
$lang->mail->nextStep       = 'Next';
$lang->mail->successSaved   = 'The configuration is saved.';
$lang->mail->subject        = "This is a testing Email from Zdoo.";
$lang->mail->content        = 'If you see this notice, it means that the Email notification feature is enabled!';
$lang->mail->sendSuccess    = 'Sent!';
$lang->mail->needConfigure  = "Configuration is not found. Configure it first.";

$lang->mail->mailContentTip = <<<EOT
<strong>%s</strong>(%s) Powered by <a href='https://www.zdoo.org' target='blank'>Zdoo OA</a>.<br />
<a href='http://en.easysoft.com' target='blank'>Nature Easy Soft</a>
EOT;
$lang->mail->openTip = 'Send E-mail notifications, if any changes to orders, customers and tasks, reviews and reimbursements.';
