<?php
/**
 * The project module en file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project
 * @version     $Id: zh-cn.php 824 2010-05-02 15:32:06Z wwccss $
 * @link        http://www.zdoo.org
 */
if(!isset($lang->project)) $lang->project = new stdclass();
$lang->project->common     = 'Project';
$lang->project->browse     = 'Project';
$lang->project->index      = 'Project';
$lang->project->create     = "Create Project";
$lang->project->edit       = 'Edit';
$lang->project->view       = 'Project Details';
$lang->project->finish     = 'Finish';
$lang->project->delete     = 'Delete';
$lang->project->enter      = 'Enter';
$lang->project->suspend    = 'Suspend';
$lang->project->activate   = 'Activate';
$lang->project->mine       = 'Mine : ';
$lang->project->other      = 'Other : ';
$lang->project->deleted    = 'Deleted';
$lang->project->finished   = 'Finished';
$lang->project->suspended  = 'Suspended';
$lang->project->noMatched  = 'No project including "%s" found.';
$lang->project->search     = 'Search';
$lang->project->import     = 'Import';
$lang->project->importTask = 'Import task';
$lang->project->role       = 'Role';
$lang->project->project    = 'Project';
$lang->project->dateRange  = 'Time Frame';

$lang->project->id          = 'ID';
$lang->project->name        = 'Name';
$lang->project->status      = 'Status';
$lang->project->desc        = 'Description';
$lang->project->begin       = 'Start';
$lang->project->manager     = 'Manager';
$lang->project->member      = 'Team';
$lang->project->end         = 'End';
$lang->project->createdBy   = 'Created by';
$lang->project->createdDate = 'Created';
$lang->project->fromproject = 'From Project';
$lang->project->whitelist   = 'Whitelist';
$lang->project->doc         = 'Document';

$lang->project->confirm = new stdclass();
$lang->project->confirm->activate = 'Do you want to activate this project?';
$lang->project->confirm->suspend  = 'Do you want to suspend this projcet?';

$lang->project->activateSuccess = 'Activtated!';
$lang->project->suspendSuccess  = 'Suspended!';
$lang->project->selectProject   = 'Select Project';

$lang->project->note = new stdclass();
$lang->project->note->rate = 'working hours';
$lang->project->note->task = 'The number of tasks';

$lang->project->statusList['doing']    = 'Doing';
$lang->project->statusList['finished'] = 'Finished';
$lang->project->statusList['suspend']  = 'Suspend';

$lang->project->roleList['member']  = 'Default';
$lang->project->roleList['senior']  = 'Manager';
$lang->project->roleList['limited'] = 'Limited';

$lang->project->whitelistTip        = 'Whitelist members can access projects and tasks.';
$lang->project->roleTip             = "Managers have all permissions; Default users cannot delete the unlinked tasks; Limited users can only edit their own tasks.";
$lang->project->roleTips['senior']  = "Managers can view, edit and delete all task.";
$lang->project->roleTips['member']  = "Default: view and edit all tasks and delete their own tasks.";
$lang->project->roleTips['limited'] = "Limited: view and edit their own tasks.";
