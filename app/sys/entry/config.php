<?php
/**
 * The config file of entry module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     entry 
 * @version     $Id: config.php 4029 2016-08-26 06:50:41Z liugang $
 * @link        http://www.ranzhi.org
 */
$config->entry = new stdclass();
$config->entry->require = new stdclass();
$config->entry->require->create = 'name,code,open,key,login';
$config->entry->require->edit   = 'name,login';

$config->entry->errcode['PARAM_CODE_MISSING']    = 401;
$config->entry->errcode['PARAM_TOKEN_MISSING']   = 401;
$config->entry->errcode['SESSION_CODE_MISSING']  = 401;
$config->entry->errcode['EMPTY_KEY']             = 401;
$config->entry->errcode['INVALID_TOKEN']         = 401;
$config->entry->errcode['SESSION_VERIFY_FAILED'] = 401;
$config->entry->errcode['IP_DENIED']             = 403;
$config->entry->errcode['ACCOUNT_UNBOUND']       = 403;
$config->entry->errcode['EMPTY_ENTRY']           = 404;
