<?php
/**
 * The depositor module en file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     depositor
 * @version     $Id$
 * @link        http://www.zdoo.org
 */
if(!isset($lang->depositor)) $lang->depositor = new stdclass();
$lang->depositor->common          = 'Account';
$lang->depositor->id              = 'ID';
$lang->depositor->abbr            = 'Alias';
$lang->depositor->serviceProvider = 'Provider';
$lang->depositor->bankProvider    = 'Bank';
$lang->depositor->title           = 'Title';
$lang->depositor->tags            = 'Tags';
$lang->depositor->account         = 'Account';
$lang->depositor->bankcode        = 'Account No.';
$lang->depositor->public          = 'Public';
$lang->depositor->type            = 'Type';
$lang->depositor->currency        = 'Currency';
$lang->depositor->status          = 'Status';
$lang->depositor->createdBy       = 'Created By';
$lang->depositor->createdDate     = 'Created';
$lang->depositor->editedBy        = 'Edited By';
$lang->depositor->editedDate      = 'Edited';

$lang->depositor->all            = 'All';
$lang->depositor->create         = 'Create';
$lang->depositor->browse         = 'Account';
$lang->depositor->edit           = 'Edit';
$lang->depositor->delete         = 'Delete';
$lang->depositor->view           = 'View';
$lang->depositor->forbid         = 'Disable';
$lang->depositor->activate       = 'Activate';
$lang->depositor->export         = 'Export';
$lang->depositor->balance        = 'Balance';
$lang->depositor->saveBalance    = 'Save';
$lang->depositor->detail         = 'Details';
$lang->depositor->normalBrowse   = 'Active Account';
$lang->depositor->disabledBrowse = 'Disabled Account';

$lang->depositor->check         = 'Check';
$lang->depositor->start         = 'Begin';
$lang->depositor->end           = 'End';
$lang->depositor->originValue   = 'Starting';
$lang->depositor->actualValue   = 'Actual';
$lang->depositor->computedValue = 'Calculated';
$lang->depositor->result        = 'Result';
$lang->depositor->success       = "<span class='text-success'>Ok</span>";
$lang->depositor->more          = "<span class='text-danger'>%s</span>";
$lang->depositor->less          = "<span class='text-danger'>%s</span>";

$lang->depositor->createBalance = 'Please Add Balance first.';

$lang->depositor->typeList['cash']   = 'Cash';
$lang->depositor->typeList['bank']   = 'Debit';
$lang->depositor->typeList['online'] = 'Electronic';

$lang->depositor->publicList['1'] = 'Public';
$lang->depositor->publicList['0'] = 'Personal';

$lang->depositor->providerList['']       = '';
$lang->depositor->providerList['alipay'] = 'Alipay';
$lang->depositor->providerList['paypal'] = 'Paypal';
$lang->depositor->providerList['tenpay'] = 'Tenpay';
$lang->depositor->providerList['wechat'] = 'Wechat Pay';

$lang->depositor->statusList['normal']  = 'Active';
$lang->depositor->statusList['disable'] = 'Disable';

$lang->depositor->placeholder = new stdclass();
$lang->depositor->placeholder->tags     = 'Please separate tags with comma.';
$lang->depositor->placeholder->noBccomp = 'Please install bccmom extension first.';
