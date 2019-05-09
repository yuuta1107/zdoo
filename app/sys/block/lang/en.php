<?php
/**
 * The en file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block 
 * @version     $Id$
 * @link        http://www.zdoo.org
 */
$lang->block->common = 'Block';
$lang->block->name   = 'Name';
$lang->block->style  = 'Style';
$lang->block->grid   = 'Grid';
$lang->block->color  = 'Color';

$lang->block->lblEntry = 'Entry';
$lang->block->lblBlock = 'Block';
$lang->block->lblRss   = 'RSS';
$lang->block->lblNum   = 'Number';
$lang->block->lblHtml  = 'HTML';

$lang->block->params = new stdclass();
$lang->block->params->name  = 'Name';
$lang->block->params->value = 'Value';

$lang->block->createBlock        = 'Create';
$lang->block->editBlock          = 'Edit';
$lang->block->ordersSaved        = 'Order is saved.';
$lang->block->confirmRemoveBlock = 'Do you want to remove Block [{0}] ?';

$lang->block->allEntries  = 'All';
$lang->block->dynamic     = 'Dynamics';
$lang->block->dynamicInfo = "%s, %s <em>%s</em> %s <a href='%s' %s>%s</a>。";

$lang->block->default['oa']['1']['title'] = 'Calendar';
$lang->block->default['oa']['1']['block'] = 'attend';
$lang->block->default['oa']['1']['grid']  = 6;

$lang->block->default['oa']['2']['title'] = 'Announcement';
$lang->block->default['oa']['2']['block'] = 'announce';
$lang->block->default['oa']['2']['grid']  = 4;

$lang->block->default['oa']['2']['params']['num'] = 15;

$lang->block->default['proj']['3']['title'] = 'My Task';
$lang->block->default['proj']['3']['block'] = 'task';
$lang->block->default['proj']['3']['grid']  = 4;

$lang->block->default['proj']['3']['params']['num']     = 15;
$lang->block->default['proj']['3']['params']['orderBy'] = 'id_desc';
$lang->block->default['proj']['3']['params']['status']  = array();
$lang->block->default['proj']['3']['params']['type']    = 'assignedTo';

$lang->block->default['proj']['4']['title'] = 'Project';
$lang->block->default['proj']['4']['block'] = 'project';
$lang->block->default['proj']['4']['grid']  = 4;

$lang->block->default['proj']['4']['params']['num']     = 15;
$lang->block->default['proj']['4']['params']['orderBy'] = 'id_desc';
$lang->block->default['proj']['4']['params']['status']  = 'doing';

$lang->block->default['crm']['1']['title'] = 'My Order';
$lang->block->default['crm']['1']['block'] = 'order';
$lang->block->default['crm']['1']['grid']  = 4;

$lang->block->default['crm']['1']['params']['num']     = 15;
$lang->block->default['crm']['1']['params']['orderBy'] = 'id_desc';
$lang->block->default['crm']['1']['params']['type']    = 'createdBy';
$lang->block->default['crm']['1']['params']['status']  = array();

$lang->block->default['crm']['2']['title'] = 'My Contract';
$lang->block->default['crm']['2']['block'] = 'contract';
$lang->block->default['crm']['2']['grid']  = 4;

$lang->block->default['crm']['2']['params']['num']     = 15;
$lang->block->default['crm']['2']['params']['orderBy'] = 'id_desc';
$lang->block->default['crm']['2']['params']['type']    = 'returnedBy';
$lang->block->default['crm']['2']['params']['status']  = array();

$lang->block->default['crm']['3']['title'] = 'This week';
$lang->block->default['crm']['3']['block'] = 'customer';
$lang->block->default['crm']['3']['grid']  = 4;

$lang->block->default['crm']['3']['params']['num']     = 15;
$lang->block->default['crm']['3']['params']['orderBy'] = 'id_desc';
$lang->block->default['crm']['3']['params']['type']    = 'thisweek';

$lang->block->default['cash']['1']['title'] = 'Depositor';
$lang->block->default['cash']['1']['block'] = 'depositor';
$lang->block->default['cash']['1']['grid']  = 4;

$lang->block->default['cash']['1']['params'] = array();

$lang->block->default['cash']['2']['title'] = 'Trade';
$lang->block->default['cash']['2']['block'] = 'depositor';
$lang->block->default['cash']['2']['grid']  = 4;

$lang->block->default['cash']['2']['params']['num']     = 15;
$lang->block->default['cash']['2']['params']['orderBy'] = 'id_desc';

$lang->block->default['cash']['3']['title'] = 'Suppliers';
$lang->block->default['cash']['3']['block'] = 'depositor';
$lang->block->default['cash']['3']['grid']  = 4;

$lang->block->default['cash']['3']['params']['num']     = 15;
$lang->block->default['cash']['3']['params']['orderBy'] = 'id_desc';

$lang->block->default['team']['1']['title'] = 'Latest Blogs';
$lang->block->default['team']['1']['block'] = 'blog';
$lang->block->default['team']['1']['grid']  = 4;

$lang->block->default['team']['1']['params']['num'] = 15;

$lang->block->default['team']['2']['title'] = 'Latest Threads';
$lang->block->default['team']['2']['block'] = 'thread';
$lang->block->default['team']['2']['grid']  = 4;

$lang->block->default['team']['2']['params']['num'] = 15;
$lang->block->default['team']['2']['params']['type'] = 'new';

$lang->block->default['team']['3']['title'] = 'Sticky Thread';
$lang->block->default['team']['3']['block'] = 'thread';
$lang->block->default['team']['3']['grid']  = 4;

$lang->block->default['team']['3']['params']['num']  = 15;
$lang->block->default['team']['3']['params']['type'] = 'stick';

$lang->block->default['sys']['1'] = $lang->block->default['oa']['1'];
$lang->block->default['sys']['1']['source'] = 'oa';
$lang->block->default['sys']['2']['title']  = 'Dynamics';
$lang->block->default['sys']['2']['block']  = 'dynamic';
$lang->block->default['sys']['2']['grid']   = 6;
$lang->block->default['sys']['2']['source'] = '';
$lang->block->default['sys']['3'] = $lang->block->default['oa']['2'];
$lang->block->default['sys']['3']['source'] = 'oa';
$lang->block->default['sys']['4'] = $lang->block->default['crm']['2'];
$lang->block->default['sys']['4']['source'] = 'crm';
$lang->block->default['sys']['5'] = $lang->block->default['crm']['1'];
$lang->block->default['sys']['5']['source'] = 'crm';
$lang->block->default['sys']['6'] = $lang->block->default['cash']['1'];
$lang->block->default['sys']['6']['source'] = 'cash';
$lang->block->default['sys']['7'] = $lang->block->default['team']['1'];
$lang->block->default['sys']['7']['source'] = 'team';
$lang->block->default['sys']['8'] = $lang->block->default['team']['2'];
$lang->block->default['sys']['8']['source'] = 'team';

$lang->block->moreLinkList = new stdclass();
$lang->block->moreLinkList->order['assinedTo']    = 'AssignedToMe|sys|my|order|type=assinedTo';
$lang->block->moreLinkList->order['createdBy']    = 'CreatedByMe|sys|my|order|type=createdBy';
$lang->block->moreLinkList->order['signedBy']     = 'SignedByMe|sys|my|order|type=signedBy';
$lang->block->moreLinkList->order['normalstatus'] = 'All|crm|order|browse|mode=all';
$lang->block->moreLinkList->order['signedstatus'] = 'All|crm|order|browse|mode=all';
$lang->block->moreLinkList->order['closedstatus'] = 'All|crm|order|browse|mode=all';

$lang->block->moreLinkList->contract['returnedBy']     = 'ReturnedByMe|sys|my|contract|type=returnedBy';
$lang->block->moreLinkList->contract['deliveredBy']    = 'DeliveredByMe|sys|my|contract|type=deliveredBy';
$lang->block->moreLinkList->contract['normalstatus']   = 'Unfinished|crm|contract|browse|mode=unfinished';
$lang->block->moreLinkList->contract['closedstatus']   = 'Finished|crm|contract|browse|mode=finished';
$lang->block->moreLinkList->contract['canceledstatus'] = 'Cancelled|crm|contract|browse|mode=canceled';

$lang->block->moreLinkList->customer['today']    = 'Today|crm|customer|browse|type=today';
$lang->block->moreLinkList->customer['thisweek'] = 'This Week|crm|customer|browse|type=thisweek';

$lang->block->moreLinkList->trade     = 'Trade|cash|trade|browse|';
$lang->block->moreLinkList->depositor = 'Depositor|cash|depositor|index|';
$lang->block->moreLinkList->provider  = 'Supplier|cash|provider|browse|';

$lang->block->moreLinkList->announce = 'Announce|oa|announce|browse|';
$lang->block->moreLinkList->attend   = 'Attend|sys|todo|calendar|';

$lang->block->moreLinkList->task['assignedTo'] = 'AssignedToMe|sys|my|task|type=assignedTo';
$lang->block->moreLinkList->task['createdBy']  = 'CreatedByMe|sys|my|task|type=createdBy';
$lang->block->moreLinkList->task['finishedBy'] = 'FinishedByMe|sys|my|task|type=finishedBy';
$lang->block->moreLinkList->task['closedBy']   = 'ClosedByMe|sys|my|task|type=closedBy';
$lang->block->moreLinkList->task['canceledBy'] = 'CancelledByMe|sys|my|task|type=canceledBy';

$lang->block->moreLinkList->project['doing']    = 'Doing|proj|project|index|status=doing';
$lang->block->moreLinkList->project['finished'] = 'Finished|proj|project|index|status=finished';
$lang->block->moreLinkList->project['suspend']  = 'Suspended|proj|project|index|status=suspend';

$lang->block->moreLinkList->blog = 'Latest Blog|team|blog|index|';
$lang->block->moreLinkList->thread['new']   = 'Latest Thread|team|forum|index|';
$lang->block->moreLinkList->thread['stick'] = 'Sticky Thread|team|forum|index|';

$lang->block->moreLinkList->report = 'Report|cash|trade|report|';
