<?php
/**
 * The tree category zh-cn file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id: en.php 4103 2016-09-30 09:22:14Z daitingting $
 * @link        http://www.zdoo.org
 */
$lang->tree->common      = "Tree";
$lang->tree->add         = "Add";
$lang->tree->edit        = "Edit";
$lang->tree->children    = "Add Child";
$lang->tree->delete      = "Delete";
$lang->tree->browse      = "Area, Industry, Income Category, Expend Category, Forum Board, Blog Category, Department";
$lang->tree->manage      = "Manage";
$lang->tree->fix         = "Fix data";
$lang->tree->merge       = "Merge";

$lang->tree->noCategories  = 'No category yet. Add one first.';
$lang->tree->noBoards      = 'No board yet. Add one first.';
$lang->tree->timeCountDown = "Jump to %s to manage the page in <strong id='countDown'>3</strong> seconds.";
$lang->tree->redirect      = 'Create now';
$lang->tree->aliasRepeat   = 'Alias: %s exists。';
$lang->tree->aliasConflict = 'Alias: %s conflicts with system modules';
$lang->tree->hasChildren   = "This category has children, so it cannot be deleted.";
$lang->tree->hasThreads    = "This board has threads, so it cannot be deleted.";
$lang->tree->hasProducts   = "This category has products, so it cannot be deleted.";
$lang->tree->confirmDelete = "Do you want to delete it?";
$lang->tree->successFixed  = "Fixed.";
$lang->tree->asParent      = "[%s] has child, so it cannot be merged.";

/* Lang items for article, products. */
$lang->category = new stdclass();
$lang->category->common   = 'Category';
$lang->category->name     = 'Name';
$lang->category->alias    = 'Alias';
$lang->category->parent   = 'Parent';
$lang->category->desc     = 'Description';
$lang->category->keywords = 'Tag';
$lang->category->children = "Child";
$lang->category->rights   = 'Permission';
$lang->category->users    = 'Users';
$lang->category->groups   = 'Groups';
$lang->category->origin   = 'Origin Category';
$lang->category->target   = 'Target Category';

/* Lang items for area. */
$lang->area = new stdclass();
$lang->area->common   = 'Area';
$lang->area->name     = 'Name';
$lang->area->alias    = 'Alias';
$lang->area->parent   = 'Parent';
$lang->area->desc     = 'Description';
$lang->area->keywords = 'Tags';
$lang->area->children = 'Child';

/* Lang items for industry. */
$lang->industry = new stdclass();
$lang->industry->common   = 'Industry';
$lang->industry->name     = 'Name';
$lang->industry->alias    = 'Alias';
$lang->industry->parent   = 'Parent';
$lang->industry->desc     = 'Description';
$lang->industry->keywords = 'Tags';
$lang->industry->children = "Child";

/* Lang items for income. */
$lang->in = new stdclass();
$lang->in->common   = 'Income';
$lang->in->name     = 'Name';
$lang->in->alias    = 'Alias';
$lang->in->parent   = 'Parent';
$lang->in->desc     = 'Description';
$lang->in->keywords = 'Tags';
$lang->in->children = "Child";
$lang->in->merge    = 'Merge Category';

/* Lang items for expend. */
$lang->out = new stdclass();
$lang->out->common   = 'Expense';
$lang->out->name     = 'Name';
$lang->out->alias    = 'Alias';
$lang->out->parent   = 'Parent';
$lang->out->desc     = 'Description';
$lang->out->keywords = 'Tags';
$lang->out->children = "Child";
$lang->out->rights   = 'Permission';
$lang->out->refund   = 'Reimbursement';
$lang->out->merge    = 'Merge Category';

$lang->out->refundList[1] = 'Yes';
$lang->out->refundList[0] = 'No';

/* Lang items for forum. */
$lang->board = new stdclass();
$lang->board->common     = 'Board';
$lang->board->name       = 'Board';
$lang->board->alias      = 'Alias';
$lang->board->parent     = 'Parent';
$lang->board->desc       = 'Description';
$lang->board->keywords   = 'Tags';
$lang->board->children   = "Child";
$lang->board->readonly   = 'Read Only';
$lang->board->moderators = 'Board Moderator';
$lang->board->users      = 'Users';
$lang->board->groups     = 'Groups';

$lang->board->readonlyList[0] = 'Pulic';
$lang->board->readonlyList[1] = 'Read Only';

$lang->board->placeholder = new stdclass();
$lang->board->placeholder->moderators  = "Board Moderator accounts. Separated with" . '","';
$lang->board->placeholder->setChildren = 'Only forums with two-level boards can be seen.';
