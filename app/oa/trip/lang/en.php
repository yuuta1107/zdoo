<?php
if(!isset($lang->trip)) $lang->trip = new stdclass();
$lang->trip->common = 'Trip';
$lang->trip->browse = 'Trip';
$lang->trip->create = 'Create';
$lang->trip->edit   = 'Edit';
$lang->trip->view   = 'Details';
$lang->trip->delete = 'Delete';

$lang->trip->personal   = 'My trip';
$lang->trip->department = 'Department';
$lang->trip->company    = 'Company';

$lang->trip->id          = 'ID';
$lang->trip->customer    = 'Customer/Provider';
$lang->trip->name        = 'Name';
$lang->trip->begin       = 'Start';
$lang->trip->end         = 'End';
$lang->trip->from        = 'From';
$lang->trip->to          = 'To';
$lang->trip->desc        = 'Description';
$lang->trip->createdBy   = 'Created By';
$lang->trip->createdDate = 'Created';
$lang->trip->date        = 'Date';
$lang->trip->time        = 'Time';

$lang->trip->denied    = 'Access is denied';
$lang->trip->unique    = 'There was a Trip in %s.';
$lang->trip->wrongEnd  = 'End time should be > begin time.';
$lang->trip->sameMonth = 'Trips must be in the same month.';
