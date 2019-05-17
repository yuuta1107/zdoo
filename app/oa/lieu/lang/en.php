<?php
if(!isset($lang->lieu)) $lang->lieu = new stdclass();
$lang->lieu->common = 'Lieu';
$lang->lieu->browse = 'Lieu';
$lang->lieu->create = 'Create';
$lang->lieu->edit   = 'Edit';
$lang->lieu->view   = 'View';
$lang->lieu->delete = 'Delete';
$lang->lieu->review = 'Review';
$lang->lieu->cancel = 'Cancel';
$lang->lieu->commit = 'Submit';

$lang->lieu->personal     = 'My Lieu';
$lang->lieu->browseReview = 'Review';
$lang->lieu->company      = 'All';
$lang->lieu->setReviewer  = 'Settings';
$lang->lieu->batchReview  = 'Batch Review';
$lang->lieu->batchPass    = 'Batch Pass';

$lang->lieu->id           = 'ID';
$lang->lieu->year         = 'Year';
$lang->lieu->begin        = 'Begin';
$lang->lieu->end          = 'End';
$lang->lieu->start        = 'Start';
$lang->lieu->finish       = 'Finish';
$lang->lieu->hours        = 'Hours';
$lang->lieu->overtime     = 'Overtime';
$lang->lieu->trip         = 'Trip';
$lang->lieu->status       = 'Status';
$lang->lieu->desc         = 'Description';
$lang->lieu->createdBy    = 'Created By';
$lang->lieu->createdDate  = 'Created';
$lang->lieu->reviewedBy   = 'Reviewed By';
$lang->lieu->reviewedDate = 'Reviewed';
$lang->lieu->date         = 'Date';
$lang->lieu->time         = 'Time';
$lang->lieu->rejectReason = 'Reject Reason';

$lang->lieu->statusList['draft']  = 'Draft';
$lang->lieu->statusList['wait']   = 'Wait';
$lang->lieu->statusList['doing']  = 'Doing';
$lang->lieu->statusList['pass']   = 'Pass';
$lang->lieu->statusList['reject'] = 'Reject';

$lang->lieu->confirmReview['pass']   = 'Do you want to pass it?';
$lang->lieu->confirmReview['reject'] = 'Do you want to reject it?';

$lang->lieu->notExist      = 'The record does not exist.';
$lang->lieu->checkHours    = 'Check Hours';
$lang->lieu->denied        = 'Access is denied.';
$lang->lieu->unique        = 'There was s Lieu in %s.';
$lang->lieu->sameMonth     = 'Lieus must be in the same month.';
$lang->lieu->wrongEnd      = 'End time should be > begin time.';
$lang->lieu->nodata        = 'No data is selected.';
$lang->lieu->reviewSuccess = 'Reviewed';
$lang->lieu->wrongHours    = 'The total hours of overtime and trip are <strong>%s</strong> hours. Lieu can not be > the total time.';
$lang->lieu->nobccomp      = 'Please install the extension php-bcmath.';
$lang->lieu->bothEmpty     = '<strong>Overtime</strong> records and <strong>trip</strong> records cannot be empty at the same time.';

$lang->lieu->hoursTip = 'Hours';

$lang->lieu->checkHoursList['0'] = 'Not check';
$lang->lieu->checkHoursList['1'] = 'Lieu hours can not be > overtime hours (%s)';

$lang->lieu->reviewStatusList['pass']   = 'Pass';
$lang->lieu->reviewStatusList['reject'] = 'Reject';
