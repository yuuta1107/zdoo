<?php
/**
 * The thread module english file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     thread
 * @version     $Id: en.php 4029 2016-08-26 06:50:41Z liugang $
 * @link        http://www.zdoo.org
 */
$lang->thread->common    = 'Thread';

$lang->thread->id         = 'Id';
$lang->thread->title      = 'Title';
$lang->thread->board      = 'Board';
$lang->thread->author     = 'Author';
$lang->thread->content    = 'Content ';
$lang->thread->file       = 'File ';
$lang->thread->postedDate = 'Posted';
$lang->thread->replies    = 'Reply';
$lang->thread->views      = 'Views';
$lang->thread->lastReply  = 'Last reply';

$lang->thread->post         = 'Post';
$lang->thread->postTo       = 'Post to';
$lang->thread->browse       = 'Thread';
$lang->thread->stick        = 'Sticky';
$lang->thread->edit         = 'Edit';
$lang->thread->view         = 'View';
$lang->thread->delete       = 'Delete';
$lang->thread->status       = 'Status';
$lang->thread->hide         = 'Hide';
$lang->thread->show         = 'Show';
$lang->thread->transfer     = 'Transfer';
$lang->thread->switchStatus = 'Switch Status';
$lang->thread->deleteFile   = 'Delete File';

$lang->thread->sticks[0] = 'Don\'t stick';
$lang->thread->sticks[1] = 'Board stick';
$lang->thread->sticks[2] = 'Global stick';

$lang->thread->statusList['hidden'] = 'hidden';
$lang->thread->statusList['normal'] = 'normal';

$lang->thread->confirmDeleteThread = "Do you want to delete this thread?";
$lang->thread->confirmHideReply    = "Do you want to hide this reply?";
$lang->thread->confirmHideThread   = "Do you want to hide this thread?";
$lang->thread->confirmDeleteReply  = "Do you want to delete this reply?";
$lang->thread->confirmDeleteFile   = "Do you want to delete this file?";

$lang->thread->lblEdited       = '%s last edited, %s';
$lang->thread->message         = '%s reply at #%s in forum, the thread is: %s, the content is: %s';
$lang->thread->readonly        = 'Read only';
$lang->thread->successStick    = 'Successfully sticky.';
$lang->thread->successUnstick  = 'Successfully unsticky.';
$lang->thread->successHide     = 'Successfully hide it.';
$lang->thread->successShow     = 'Successfully show it.';
$lang->thread->readonlyMessage = 'The thread has been set as <strong>READONLY</strong>，so you cannot post new reply。';
$lang->thread->successTransfer = 'Successfully Transfered.';

/* Adjust the pager. */
if(!isset($lang->pager->settedInForum))
{
    $lang->pager->noRecord = '';
    $lang->pager->digest   = str_replace('records', 'replies', $lang->pager->digest);
}
