<?php
if(!isset($lang->leads)) $lang->leads = new stdclass();

$lang->leads->common         = 'Leads';
$lang->leads->assignedToNull = 'Assign To Null';
$lang->leads->browse         = 'Leads';
$lang->leads->create         = 'Create';
$lang->leads->edit           = 'Edit';
$lang->leads->delete         = 'Delete';
$lang->leads->view           = 'Leads';
$lang->leads->apply          = 'Apply';
$lang->leads->assign         = 'Assign';
$lang->leads->transform      = 'Confirm';
$lang->leads->ignore         = 'Ignroe';
$lang->leads->settings       = 'Settings';
$lang->leads->applyRule      = 'Distribution';

$lang->leads->list = 'Leads';

$lang->leads->applyLimit   = 'Maximum per request';
$lang->leads->applyRemain  = 'Maximum on hold';
$lang->leads->ignoreReason = 'Reasons';

$lang->leads->tips = new stdclass();
$lang->leads->tips->apply       = 'Please take care of the existing contacts.';
$lang->leads->tips->applyRemain = 'You can apply when the number of records on hold is lower than it.';
