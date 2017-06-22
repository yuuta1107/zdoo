<?php
/**
 * The config file of RanZhi.
 *
 * Don't modify this file directly, copy the item to my.php and change it.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     config
 * @version     $Id: config.php 4211 2017-06-20 14:30:10Z pengjx $
 * @link        http://www.ranzhi.org
 */

/* 基本设置。Rangerteam basic settings. */
$config->cookiePath   = '/';                // The path of cookies.
$config->checkVersion = true;               // Auto check for new version or not.
$config->timeout      = 30 * 1000;          // The timeout of ajax request.
$config->pingInterval = 60;                 // The interval of ping request, seconds.

/* Supported charsets. */
$config->charsets['zh-cn']['utf-8'] = 'UTF-8';
$config->charsets['zh-cn']['gbk']   = 'GBK';
$config->charsets['zh-tw']['utf-8'] = 'UTF-8';
$config->charsets['zh-tw']['big5']  = 'BIG5';
$config->charsets['en']['utf-8']    = 'UTF-8';

$config->dashboard = new stdclass();
$config->dashboard->modules = 'my,todo';

/* IP white list settings.*/
$config->ipWhiteList = '*';
$config->allowedTags = '<p><span><h1><h2><h3><h4><h5><em><u><strong><br><ol><ul><li><img><a><b><font><hr><pre><div><table><td><th><tr><tbody><embed><style>';

/* Tables for basic system. */
define('TABLE_CONFIG',    '`sys_config`');
define('TABLE_PACKAGE',   '`sys_package`');
define('TABLE_USER',      '`sys_user`');
define('TABLE_GROUP',     '`sys_group`');
define('TABLE_ACTION',    '`sys_action`');
define('TABLE_FILE',      '`sys_file`');
define('TABLE_HISTORY',   '`sys_history`');
define('TABLE_CATEGORY',  '`sys_category`');
define('TABLE_ARTICLE',   '`sys_article`');
define('TABLE_EXTENSION', '`sys_extension`');
define('TABLE_WEBAPP',    '`sys_webapp`');
define('TABLE_LANG',      '`sys_lang`');
define('TABLE_ENTRY',     '`sys_entry`');
define('TABLE_SSO',       '`sys_sso`');
define('TABLE_TASK',      '`sys_task`');
define('TABLE_TEAM',      '`sys_team`');
define('TABLE_TAG',       '`sys_tag`');
define('TABLE_BLOCK',     '`sys_block`');
define('TABLE_SCHEMA',    '`sys_schema`');
define('TABLE_RELATION',  '`sys_relation`');
define('TABLE_CRON',      '`sys_cron`');
define('TABLE_USERGROUP', '`sys_usergroup`');
define('TABLE_GROUPPRIV', '`sys_grouppriv`');
define('TABLE_USERQUERY', '`sys_userquery`');

/* Tables for crm. */
define('TABLE_ADDRESS',       '`crm_address`');
define('TABLE_PRODUCT',       '`sys_product`');
define('TABLE_ORDER',         '`crm_order`');
define('TABLE_CUSTOMER',      '`crm_customer`');
define('TABLE_RESUME',        '`crm_resume`');
define('TABLE_CONTACT',       '`crm_contact`');
define('TABLE_CONTRACT',      '`crm_contract`');
define('TABLE_CONTRACTORDER', '`crm_contractorder`');
define('TABLE_PLAN',          '`crm_plan`');
define('TABLE_DELIVERY',      '`crm_delivery`');
define('TABLE_SALESGROUP',    '`crm_salesgroup`');
define('TABLE_SALESPRIV',     '`crm_salespriv`');

/* Tables for oa. */
define('TABLE_TODO',       '`oa_todo`');
define('TABLE_PROJECT',    '`oa_project`');
define('TABLE_DOC',        '`oa_doc`');
define('TABLE_DOCCONTENT', '`oa_doccontent`');
define('TABLE_DOCLIB',     '`oa_doclib`');
define('TABLE_ATTEND',     '`oa_attend`');
define('TABLE_ATTENDSTAT', '`oa_attendstat`');
define('TABLE_HOLIDAY',    '`oa_holiday`');
define('TABLE_LEAVE',      '`oa_leave`');
define('TABLE_OVERTIME',   '`oa_overtime`');
define('TABLE_LIEU',       '`oa_lieu`');
define('TABLE_TRIP',       '`oa_trip`');
define('TABLE_REFUND',     '`oa_refund`');

/* Tables for cash. */
define('TABLE_DEPOSITOR', '`cash_depositor`');
define('TABLE_BALANCE',   '`cash_balance`');
define('TABLE_TRADE',     '`cash_trade`');

/* Tables for team. */
define('TABLE_THREAD',  '`team_thread`');
define('TABLE_REPLY',   '`team_reply`');
define('TABLE_MESSAGE', '`sys_message`');

/* The mapping list of object and tables. */
$config->objectTables['announce']    = TABLE_ARTICLE;
$config->objectTables['article']     = TABLE_ARTICLE;
$config->objectTables['attend']      = TABLE_ATTEND;
$config->objectTables['blog']        = TABLE_ARTICLE;
$config->objectTables['contact']     = TABLE_CONTACT;
$config->objectTables['contract']    = TABLE_CONTRACT;
$config->objectTables['cron']        = TABLE_CRON;
$config->objectTables['customer']    = TABLE_CUSTOMER;
$config->objectTables['depositor']   = TABLE_DEPOSITOR;
$config->objectTables['doc']         = TABLE_DOC;
$config->objectTables['doclib']      = TABLE_DOCLIB;
$config->objectTables['holiday']     = TABLE_HOLIDAY;
$config->objectTables['leads']       = TABLE_CONTACT;
$config->objectTables['leave']       = TABLE_LEAVE;
$config->objectTables['lieu']        = TABLE_LIEU;
$config->objectTables['makeup']      = TABLE_OVERTIME;
$config->objectTables['order']       = TABLE_ORDER;
$config->objectTables['overtime']    = TABLE_OVERTIME;
$config->objectTables['product']     = TABLE_PRODUCT;
$config->objectTables['project']     = TABLE_PROJECT;
$config->objectTables['provider']    = TABLE_CUSTOMER;
$config->objectTables['refund']      = TABLE_REFUND;
$config->objectTables['reply']       = TABLE_REPLY;
$config->objectTables['resume']      = TABLE_RESUME;
$config->objectTables['schema']      = TABLE_SCHEMA;
$config->objectTables['task']        = TABLE_TASK;
$config->objectTables['thread']      = TABLE_THREAD;
$config->objectTables['todo']        = TABLE_TODO;
$config->objectTables['trade']       = TABLE_TRADE;
$config->objectTables['user']        = TABLE_USER;
