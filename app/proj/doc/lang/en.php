<?php
/**
 * The doc module english file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     doc
 * @version     $Id: en.php 824 2010-05-02 15:32:06Z wwccss $
 * @link        http://www.zdoo.org
 */
if(!isset($lang->doc)) $lang->doc = new stdclass();
$lang->doc->common         = 'Document';
$lang->doc->id             = 'ID';
$lang->doc->product        = 'Product';
$lang->doc->project        = 'Project';
$lang->doc->lib            = 'Library';
$lang->doc->category       = 'Category';
$lang->doc->title          = 'Title';
$lang->doc->digest         = 'Summary';
$lang->doc->comment        = 'Comment';
$lang->doc->type           = 'Type';
$lang->doc->content        = 'Content';
$lang->doc->keywords       = 'Tags';
$lang->doc->url            = 'URL';
$lang->doc->files          = 'File';
$lang->doc->views          = 'Views';
$lang->doc->createdBy      = 'Create by';
$lang->doc->createdDate    = 'Create on';
$lang->doc->editedBy       = 'Edite by';
$lang->doc->editedDate     = 'Edite on';
$lang->doc->basicInfo      = 'Basic Info';
$lang->doc->deleted        = 'Deleted';

$lang->doc->index          = 'Home';
$lang->doc->create         = 'Create';
$lang->doc->edit           = 'Edit';
$lang->doc->delete         = 'Delete';
$lang->doc->browse         = 'Document';
$lang->doc->view           = 'Document';
$lang->doc->manageType     = 'Manage Category';
$lang->doc->showFiles      = 'File Library';
$lang->doc->sort           = 'Sort';

$lang->doc->libName        = 'Name';
$lang->doc->libType        = 'Type';
$lang->doc->allLibs        = 'All Library';
$lang->doc->projectLibs    = 'Project Library';
$lang->doc->customLibs     = 'Custom Library';
$lang->doc->projectMainLib = 'Main Library';
$lang->doc->fileLib        = 'File Library';

$lang->doc->createLib      = 'Create Library';
$lang->doc->editLib        = 'Edit';
$lang->doc->deleteLib      = 'Delete';
$lang->doc->fixedMenu      = 'Fixed Menu';
$lang->doc->removedMenu    = 'Remove Menu';

$lang->doc->editCategory   = 'Edit Category';
$lang->doc->deleteCategory = 'Delete Category';

$lang->doc->allProject     = 'All projects';

$lang->doc->private        = 'Private';
$lang->doc->users          = 'Users';
$lang->doc->groups         = 'Groups';

$lang->doc->libTypeList = array();
$lang->doc->libTypeList['custom']  = 'Custom';
$lang->doc->libTypeList['project'] = 'Project';

$lang->doc->types['text'] = 'Document';
$lang->doc->types['url']  = 'Link';

$lang->doc->browseType = 'Browse Type';
$lang->doc->browseTypeList['list'] = 'List';
$lang->doc->browseTypeList['menu'] = 'Menu';
$lang->doc->browseTypeList['tree'] = 'Tree';

$lang->doc->confirmDelete      = "Do you want to delete this document?";
$lang->doc->confirmDeleteLib   = "Do you want to delete this document library?";
$lang->doc->errorEditSystemDoc = "System document library cannot be edited.";

$lang->doc->placeholder = new stdclass();
$lang->doc->placeholder->url = 'url';

$lang->doc->notFound     = 'The document does not exist';
$lang->doc->libNotFound  = 'The document library does not exist';
$lang->doc->errorMainLib = 'The main library can not be deleted.';
