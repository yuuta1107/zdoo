<?php
/**
 * The customer module config file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$config->customer->require = new stdclass();
$config->customer->require->create = 'contact';
$config->customer->require->edit   = 'name';

$config->customer->editor = new stdclass();
$config->customer->editor->create = array('id' => 'desc', 'tools' => 'simple');
$config->customer->editor->edit   = array('id' => 'desc', 'tools' => 'simple');
$config->customer->editor->assign = array('id' => 'note', 'tools' => 'simple');
$config->customer->editor->view   = array('id' => 'comment,lastComment', 'tools' => 'simple');

global $lang;
$config->customer->search['module'] = 'customer';

/* If not set alias t1 for table there occurs an error caused by search them from both  TABLE_CUSTOMER and TABLE_DATING by left-join expression when search some fields such as createdBy or createdDate. */
$config->customer->search['fields']['t1.id']            = $lang->customer->id;
$config->customer->search['fields']['t1.name']          = $lang->customer->name;
$config->customer->search['fields']['t1.intension']     = $lang->customer->intension;
$config->customer->search['fields']['t1.source']        = $lang->customer->source;
$config->customer->search['fields']['t1.level']         = $lang->customer->level;
$config->customer->search['fields']['t1.contactedDate'] = $lang->customer->contactedDate;
$config->customer->search['fields']['t1.nextDate']      = $lang->customer->nextDate;
$config->customer->search['fields']['t1.status']        = $lang->customer->status;
$config->customer->search['fields']['t1.size']          = $lang->customer->size;
$config->customer->search['fields']['t1.type']          = $lang->customer->type;
$config->customer->search['fields']['t1.createdBy']     = $lang->customer->createdBy;
$config->customer->search['fields']['t1.createdDate']   = $lang->customer->createdDate;
$config->customer->search['fields']['t1.assignedTo']    = $lang->customer->assignedTo;
$config->customer->search['fields']['t1.industry']      = $lang->customer->industry;
$config->customer->search['fields']['t1.area']          = $lang->customer->area;
$config->customer->search['fields']['t1.relation']      = $lang->customer->relation;

$config->customer->search['params']['t1.id']            = array('operator' => '=', 'control' => 'input',  'values' => '');
$config->customer->search['params']['t1.name']          = array('operator' => 'include', 'control' => 'input', 'values' => '');
$config->customer->search['params']['t1.intension']     = array('operator' => 'include', 'control' => 'input', 'values' => '');
$config->customer->search['params']['t1.source']        = array('operator' => '=',  'control' => 'select', 'values' => $lang->customer->sourceList);
$config->customer->search['params']['t1.level']         = array('operator' => '=',  'control' => 'select', 'values' => $lang->customer->levelNameList);
$config->customer->search['params']['t1.contactedDate'] = array('operator' => '>=', 'control' => 'input',  'values' => '', 'class' => 'date');
$config->customer->search['params']['t1.nextDate']      = array('operator' => '>=', 'control' => 'input',  'values' => '', 'class' => 'date');
$config->customer->search['params']['t1.status']        = array('operator' => '=',  'control' => 'select', 'values' => array('' => '') + $lang->customer->statusList);
$config->customer->search['params']['t1.size']          = array('operator' => '=',  'control' => 'select', 'values' => $lang->customer->sizeNameList);
$config->customer->search['params']['t1.type']          = array('operator' => '=',  'control' => 'select', 'values' => $lang->customer->typeList);
$config->customer->search['params']['t1.createdBy']     = array('operator' => '=',  'control' => 'select', 'values' => 'users');
$config->customer->search['params']['t1.createdDate']   = array('operator' => '>=', 'control' => 'input',  'values' => '', 'class' => 'date');
$config->customer->search['params']['t1.assignedTo']    = array('operator' => '=',  'control' => 'select', 'values' => 'users');
$config->customer->search['params']['t1.industry']      = array('operator' => 'belong', 'control' => 'select', 'values' => 'set in control');
$config->customer->search['params']['t1.area']          = array('operator' => 'belong', 'control' => 'select', 'values' => 'set in control');
$config->customer->search['params']['t1.relation']      = array('operator' => '=', 'control' => 'select',  'values' => $lang->customer->relationList);

$config->customer->list = new stdclass();
$config->customer->list->exportFields = '
  id, name, type, relation, size, industry, area,
  status, level, intension, site, weibo, weixin, public,
  createdBy, createdDate, assignedBy, assignedDate, assignedTo,
  editedBy, editedDate, contactedBy, contactedDate, nextDate, desc';
