<?php
/**
 * The customer module en file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.zdoo.org
 */
if(!isset($lang->customer)) $lang->customer = new stdclass();

$lang->customer->common        = 'Customer';
$lang->customer->id            = 'ID';
$lang->customer->name          = 'Name';
$lang->customer->depositor     = 'Account';
$lang->customer->contact       = 'Contact';
$lang->customer->type          = 'Type';
$lang->customer->source        = 'Source';
$lang->customer->sourceNote    = 'Note';
$lang->customer->size          = 'Size';
$lang->customer->industry      = 'Industry';
$lang->customer->area          = 'Area';
$lang->customer->status        = 'Status';
$lang->customer->level         = 'Level';
$lang->customer->intension     = 'Intention';
$lang->customer->phone         = 'Phone';
$lang->customer->email         = 'Email';
$lang->customer->qq            = 'QQ';
$lang->customer->site          = 'Site';
$lang->customer->weibo         = 'Weibo';
$lang->customer->weixin        = 'WeChat';
$lang->customer->desc          = 'Description';
$lang->customer->public        = 'Public';
$lang->customer->relation      = 'Relation';
$lang->customer->createdBy     = 'Created By';
$lang->customer->createdDate   = 'Created';
$lang->customer->editedBy      = 'Edited By';
$lang->customer->editedDate    = 'Edited';
$lang->customer->assignedTo    = 'Assignee';
$lang->customer->assignedBy    = 'Assigned By';
$lang->customer->assignedDate  = 'Assigned';
$lang->customer->contactedBy   = 'Contact By';
$lang->customer->contactedDate = 'Contact';
$lang->customer->nextDate      = 'Next Contact';
$lang->customer->selectContact = 'Select Contact';

$lang->customer->browse            = 'View Customer';
$lang->customer->view              = 'View';
$lang->customer->create            = 'Add Customer';
$lang->customer->delete            = 'Delete Customer';
$lang->customer->order             = 'Orders';
$lang->customer->contact           = 'Contact';
$lang->customer->contract          = 'Contract';
$lang->customer->address           = 'Address';
$lang->customer->record            = 'Record';
$lang->customer->assign            = 'Assign Customer';
$lang->customer->batchAssign       = 'Batch Assign';
$lang->customer->linkContact       = 'Add Contact';
$lang->customer->list              = 'Customer';
$lang->customer->edit              = 'Edit';
$lang->customer->export            = 'Export';
$lang->customer->merge             = 'Merge';
$lang->customer->basicInfo         = 'Basic Info';
$lang->customer->moreInfo          = 'More Info';
$lang->customer->purchasedProducts = 'Purchased Product';

$lang->customer->sourceList['']              = '';
$lang->customer->sourceList['visit']         = 'Visit Zdoo Website';
$lang->customer->sourceList['advertisement'] = 'Advertisement';
$lang->customer->sourceList['introduce']     = 'Word of Mouth';
$lang->customer->sourceList['activity']      = 'Event';
$lang->customer->sourceList['socialPlat']    = 'Social Platform';
$lang->customer->sourceList['others']        = 'Other';

$lang->customer->typeList['']            = '';
$lang->customer->typeList['national']    = 'National';
$lang->customer->typeList['collective']  = 'Collective';
$lang->customer->typeList['corporate']   = 'Corporate';
$lang->customer->typeList['limited']     = 'Limited';
$lang->customer->typeList['partnership'] = 'Partnership';
$lang->customer->typeList['foreign']     = 'Foreign';
$lang->customer->typeList['personal']    = 'Personal';

$lang->customer->statusList['potential'] = 'Potential';
$lang->customer->statusList['intension'] = 'Intended';
$lang->customer->statusList['signed']    = 'Signed';
$lang->customer->statusList['payed']     = 'Paid';
$lang->customer->statusList['failed']    = 'Failed';

$lang->customer->sizeNameList[0] = '';
$lang->customer->sizeNameList[1] = 'Large';
$lang->customer->sizeNameList[2] = 'Medium';
$lang->customer->sizeNameList[3] = 'Small';
$lang->customer->sizeNameList[4] = 'Mini';

$lang->customer->sizeNoteList[0] = '';
$lang->customer->sizeNoteList[1] = ' > 100 employees';
$lang->customer->sizeNoteList[2] = ' 50-100 employees';
$lang->customer->sizeNoteList[3] = ' 10-50 employees';
$lang->customer->sizeNoteList[4] = ' < 10 employees';

$lang->customer->levelNameList[]    = '';
$lang->customer->levelNameList['A'] = 'A';
$lang->customer->levelNameList['B'] = 'B';
$lang->customer->levelNameList['C'] = 'C';
$lang->customer->levelNameList['D'] = 'D';
$lang->customer->levelNameList['E'] = 'E';

$lang->customer->levelNoteList[]    = '';
$lang->customer->levelNoteList['A'] = ' Make an order in a month.';
$lang->customer->levelNoteList['B'] = ' Make an order in 3 months';
$lang->customer->levelNoteList['C'] = ' Make an order in 6 months.';
$lang->customer->levelNoteList['D'] = ' Make an order beyond 6 months.';
$lang->customer->levelNoteList['E'] = ' Make no deal.';

$lang->customer->relationList['client']   = 'Client';
$lang->customer->relationList['provider'] = 'Provider';
$lang->customer->relationList['partner']  = 'Partner';

$lang->customer->search      = 'Search';
$lang->customer->searchInput = 'Enter search items.';
$lang->customer->mergeTip    = 'Merge this customer to the selected customer.';

$lang->customer->action = new stdclass();
$lang->customer->action->orderDating    = '$date, <strong>$actor</strong> created Next Contact : <strong>$extra</strong> for order <strong>$order</strong>.' . "\n";
$lang->customer->action->contractDating = '$date, <strong>$actor</strong> created Next Contact : <strong>$extra</strong> for contract <strong>$contract</strong>.' . "\n";

/* Width settings for different languages, in pixels. */
$lang->customer->actionWidth = 280;
