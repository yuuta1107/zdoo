<?php
/**
 * The schema module zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     schema
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
$lang->schema->common   = 'Import Schema';
$lang->schema->browse   = 'Browse';
$lang->schema->view     = 'View';
$lang->schema->create   = 'Create Schema';
$lang->schema->edit     = 'Edit Schema';
$lang->schema->delete   = 'Delete Schema';
$lang->schema->csvFile  = 'File';

$lang->schema->name     = 'Name';
$lang->schema->feeRow   = 'The fee is a single record.';
$lang->schema->diffCol  = 'The income and expense should in different columns.';

$lang->schema->placeholder = new stdclass();
$lang->schema->placeholder->selectField = 'Select item';
$lang->schema->placeholder->common      = 'Fill in the column corresponding to the field in the statement, eg. A.';
$lang->schema->placeholder->type        = 'Fill in the column corresponding to the type of income or expense.';
$lang->schema->placeholder->date        = 'Fill in the column corresponding to the trade date.';
$lang->schema->placeholder->product     = 'Fill in the column corresponding to the product.';
$lang->schema->placeholder->handlers    = 'Fill in the column corresponding to the handlers.';
$lang->schema->placeholder->desc        = 'Fill in the column corresponding to the description of statement, can fill in multiple columns which is seperated by comma. Eg. I, O.';
$lang->schema->placeholder->in          = 'Fill in the column corresponding to the amount of income, eg. E.';
$lang->schema->placeholder->out         = 'Fill in the column corresponding to the amount of expense, eg. D.';

$lang->schema->fieldRequired = '%s is required.';
