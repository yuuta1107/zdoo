<?php
/**
 * The English file of entry module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     entry
 * @version     $Id: en.php 4091 2016-09-30 07:16:50Z daitingting $
 * @link        http://www.zdoo.org
 */
$lang->entry->common      = 'App';
$lang->entry->admin       = 'Apps';
$lang->entry->create      = 'Create';
$lang->entry->edit        = 'Edit';
$lang->entry->delete      = 'Delete';
$lang->entry->createKey   = 'New';
$lang->entry->order       = 'Sort';
$lang->entry->style       = 'Style';
$lang->entry->setCategory = 'Manage';
$lang->entry->online      = 'Online';
$lang->entry->offline     = 'Offline';
$lang->entry->version     = 'Version';
$lang->entry->platform    = 'Platform';

$lang->entry->name        = 'App Name';
$lang->entry->abbr        = 'Abbr';
$lang->entry->code        = 'Alias';
$lang->entry->buildin     = 'Built-in';
$lang->entry->integration = 'Integrate';
$lang->entry->key         = 'Key';
$lang->entry->block       = 'Block URL';
$lang->entry->ip          = 'IP';
$lang->entry->logo        = 'Logo';
$lang->entry->login       = 'Login URL';
$lang->entry->logout      = 'Logout URL';
$lang->entry->nothing     = 'N/A';
$lang->entry->open        = 'Open';
$lang->entry->control     = 'Window Control';
$lang->entry->size        = 'Window Size';
$lang->entry->position    = 'Position';
$lang->entry->width       = 'Width';
$lang->entry->height      = 'Height';
$lang->entry->priv        = 'Permission';
$lang->entry->category    = 'Category';

$lang->entry->chanzhi          = 'Zsite';
$lang->entry->zentao           = 'ZenTao';
$lang->entry->integrateChanzhi = 'Integrate Zsite';
$lang->entry->integrateZentao  = 'Integrate ZenTao';

$lang->entry->chanzhiPlaceholder = 'Please enter Admin URL';
$lang->entry->chanzhiURL         = 'Admin URL';
$lang->entry->zentaoPlaceholder  = 'E.g. http://www.zentaopms.com/user-login.html';
$lang->entry->zentaoURL          = 'ZenTao URL';

$lang->entry->zentaoAdmin   = 'ZenTao Admin';
$lang->entry->adminAccount  = 'ZenTao Admin';
$lang->entry->adminPassword = 'Password';
$lang->entry->bindUser      = 'Bind User';
$lang->entry->nextStep      = 'Next';
$lang->entry->createUser    = 'Create User';

$lang->entry->confirmDelete = 'Do you want to delete this App?';
$lang->entry->lblBlock      = 'Block';
$lang->entry->editWarnning  = 'This is a system application. Think before you change it.';

$lang->entry->note = new stdClass();
$lang->entry->note->name    = 'Name';
$lang->entry->note->abbr    = 'Abbreviation';
$lang->entry->note->logo    = 'Logo size 64*64. If upload the PNG file, you must keep transparency.';
$lang->entry->note->code    = 'Entry alias should be letters, digits or underline.';
$lang->entry->note->login   = 'Login URL or use App.';
$lang->entry->note->logout  = 'Logout URL ';
$lang->entry->note->visible = 'Display on the left';
$lang->entry->note->api     = 'URL of getting blocks';
$lang->entry->note->ip      = "Use comma between two IPs. IP segment is supported, e.g. 192.168.1.*";
$lang->entry->note->allip   = 'All';
$lang->entry->note->scheme  = 'The current protocol is https, and the iframe window can only open the https URL.';

$lang->entry->error = new stdClass();
$lang->entry->error->name  = 'Please enter name';
$lang->entry->error->code  = 'Please enter alias';
$lang->entry->error->key   = 'Please enter key';
$lang->entry->error->ip    = 'Please enter IP';
$lang->entry->error->url   = 'No built-in application login address. /, http:// or https:// must be included.';

$lang->entry->error->admin         = 'Wrong admin account or password.';
$lang->entry->error->zentaoSetting = 'ZenTao configuration failed. Upgrade ZenTao to continue.';
$lang->entry->error->version       = 'Your ZenTao version is lower than %s';
$lang->entry->error->zentaoUrl     = 'Wrong ZenTao login URL.';
$lang->entry->error->accessDenied  = 'Access is denied';

$lang->entry->openList['blank']  = 'Blank';
$lang->entry->openList['iframe'] = 'Iframe';

$lang->entry->sizeList['max']    = 'Maximize';
$lang->entry->sizeList['custom'] = 'Custom';

$lang->entry->positionList['default'] = 'Default';
$lang->entry->positionList['center']  = 'Center';

$lang->entry->controlList['none']   = 'None';
$lang->entry->controlList['full']   = 'Full';
$lang->entry->controlList['simple'] = 'Transparent';

$lang->entry->integrationList[1] = 'Open';
$lang->entry->integrationList[0] = 'Close';

$lang->entry->platformList['ranzhi']   = 'Zdoo';
$lang->entry->platformList['xuanxuan'] = 'XuanXuan';

$lang->entry->errmsg['PARAM_CODE_MISSING']    = 'Param code is missing.';
$lang->entry->errmsg['PARAM_TOKEN_MISSING']   = 'Param token is missing.';
$lang->entry->errmsg['SESSION_CODE_MISSING']  = 'Session code is missing.';
$lang->entry->errmsg['EMPTY_KEY']             = 'Entry key is missing.';
$lang->entry->errmsg['INVALID_TOKEN']         = 'Invalid token.';
$lang->entry->errmsg['SESSION_VERIFY_FAILED'] = 'Session verification failed.';
$lang->entry->errmsg['IP_DENIED']             = 'IP is denied.';
$lang->entry->errmsg['ACCOUNT_UNBOUND']       = 'Account is unbound.';
$lang->entry->errmsg['EMPTY_ENTRY']           = 'Entry key is missing.';

/* Width settings for different languages, in pixels. */
$lang->entry->actionWidth = 320;
