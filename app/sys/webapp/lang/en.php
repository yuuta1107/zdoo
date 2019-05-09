<?php
/**
 * The webapp module en file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     webapp
 * @version     $Id$
 * @link        http://www.zdoo.org
 */
if(!isset($lang->webapp)) $lang->webapp = new stdclass();
$lang->webapp->common = 'App';
$lang->webapp->index  = 'View App';
$lang->webapp->obtain = 'Get App';

$lang->webapp->install    = 'Install';
$lang->webapp->uninstall  = 'Remove';
$lang->webapp->useapp     = 'Run';
$lang->webapp->view       = 'Info';
$lang->webapp->preview    = 'Preview';
$lang->webapp->installed  = 'Installed';
$lang->webapp->edit       = 'Edit App';
$lang->webapp->create     = 'Create App';
$lang->webapp->manageTree = 'Category';

$lang->webapp->id          = 'ID';
$lang->webapp->name        = 'Name';
$lang->webapp->url         = 'URL';
$lang->webapp->icon        = 'Icon';
$lang->webapp->module      = 'Category';
$lang->webapp->author      = 'Author';
$lang->webapp->abstract    = 'Abstract';
$lang->webapp->desc        = 'Description';
$lang->webapp->target      = 'Open with';
$lang->webapp->size        = 'Size';
$lang->webapp->height      = 'Height';
$lang->webapp->addedTime   = 'Added';
$lang->webapp->updatedTime = 'Updated';
$lang->webapp->downloads   = 'Downloads';
$lang->webapp->grade       = 'Ratings';
$lang->webapp->addType     = 'Add Type';
$lang->webapp->addedBy     = 'Added By';
$lang->webapp->addedDate   = 'Added';
$lang->webapp->views       = 'Views';
$lang->webapp->packup      = 'Fold';
$lang->webapp->custom      = 'Custom';

$lang->webapp->byDownloads   = 'Top Downloaded';
$lang->webapp->byAddedTime   = 'Latest Added';
$lang->webapp->byUpdatedTime = 'Latest Update';
$lang->webapp->bySearch      = 'Search';
$lang->webapp->byCategory    = 'Category';

$lang->webapp->selectModule = 'Select Category:';
$lang->webapp->allModule    = 'All';
$lang->webapp->noModule     = 'Uncategorized';

$lang->webapp->targetList['']       = '';
$lang->webapp->targetList['blank']  = 'Blank';
$lang->webapp->targetList['iframe'] = 'Iframe';

$lang->webapp->width  = 'Width';
$lang->webapp->height = 'Height';

$lang->webapp->sizeList['']         = "";
$lang->webapp->sizeList['1024x600'] = "1024 x 600";
$lang->webapp->sizeList['900x600']  = "900 x 600";
$lang->webapp->sizeList['700x600']  = "700 x 600";
$lang->webapp->sizeList['600x500']  = "600 x 500";
$lang->webapp->sizeList['custom']   = "Custom size";

$lang->webapp->addTypeList['system'] = 'System App';
$lang->webapp->addTypeList['custom'] = 'Custom App';

$lang->webapp->errorOccurs        = 'Error:';
$lang->webapp->errorGetModules    = "Failed to get extension category data from the www.zdoo.org. ";
$lang->webapp->errorGetExtensions = 'Failed to get extensions from www.zdoo.org. ';
$lang->webapp->noApps             = 'No extensions found in this category.';
$lang->webapp->successInstall     = 'Installed.';
$lang->webapp->confirmDelete      = 'Do you want to delete this app?';
$lang->webapp->noticeAbstract     = 'Application description in 30 words.';
$lang->webapp->noticeIcon         = 'The size of icon is 72x72.';
