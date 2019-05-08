<?php
if(!isset($lang->leave)) $lang->leave = new stdclass();
$lang->leave->common     = 'Leave';
$lang->leave->browse     = 'Leave';
$lang->leave->view       = 'View';
$lang->leave->create     = 'Create';
$lang->leave->edit       = 'Edit';
$lang->leave->delete     = 'Delete';
$lang->leave->review     = 'Review';
$lang->leave->cancel     = 'Cancel';
$lang->leave->commit     = 'Submit';
$lang->leave->back       = 'Back';
$lang->leave->export     = 'Export';
$lang->leave->reviewBack = 'Review return date';

$lang->leave->personal       = 'My Leave';
$lang->leave->browseReview   = 'Review List';
$lang->leave->company        = 'All';
$lang->leave->setReviewer    = 'Set Reviewer';
$lang->leave->personalAnnual = 'Annual Leave';
$lang->leave->batchReview    = 'Batch Review';
$lang->leave->batchPass      = 'Batch Pass';

$lang->leave->id           = 'ID';
$lang->leave->year         = 'Year';
$lang->leave->begin        = 'Begin';
$lang->leave->end          = 'End';
$lang->leave->start        = 'Begin';
$lang->leave->finish       = 'End';
$lang->leave->hours        = 'Hours';
$lang->leave->backDate     = 'Return';
$lang->leave->type         = 'Type';
$lang->leave->desc         = 'Description';
$lang->leave->status       = 'Status';
$lang->leave->createdBy    = 'Created by';
$lang->leave->createdDate  = 'Created';
$lang->leave->reviewedBy   = 'Reviewer';
$lang->leave->reviewedDate = 'Reviewed';
$lang->leave->date         = 'Date';
$lang->leave->time         = 'Time';
$lang->leave->rejectReason = 'Reject Reason';
$lang->leave->account      = 'Account';
$lang->leave->dateRange    = 'Timeframe';
$lang->leave->totalAnnual  = 'Annual Leave Settings';

$lang->leave->typeList['affairs']   = 'Private';
$lang->leave->typeList['sick']      = 'Sick';
$lang->leave->typeList['annual']    = 'Annual';
$lang->leave->typeList['lieu']      = 'Lieu';
$lang->leave->typeList['home']      = 'Home';
$lang->leave->typeList['marry']     = 'Marriage';
$lang->leave->typeList['maternity'] = 'Maternity';

$lang->leave->paid   = 'Paid Leave';
$lang->leave->unpaid = 'Unpaid Leave';

$lang->leave->statusList['draft']  = 'Draft';
$lang->leave->statusList['wait']   = 'Wait';
$lang->leave->statusList['doing']  = 'Doing';
$lang->leave->statusList['pass']   = 'Pass';
$lang->leave->statusList['reject'] = 'Reject';
$lang->leave->statusList['back']   = 'Back';

$lang->leave->notExist      = 'The record does not exist';
$lang->leave->denied        = 'Access is denied.';
$lang->leave->unique        = 'There was a Leave in %s.';
$lang->leave->sameMonth     = 'Leaves must be in the same month.';
$lang->leave->wrongEnd      = 'End time should be > begin time.';
$lang->leave->wrongBackDate = 'Back time should be > begin time.';
$lang->leave->nodata        = 'No data is selected.';
$lang->leave->reviewSuccess = 'Reviewed';

$lang->leave->confirmReview['pass']   = 'Do you want to pass it?';
$lang->leave->confirmReview['reject'] = 'Do you want to reject it?';

$lang->leave->hoursTip  = 'Hours';
$lang->leave->annualTip = 'You have %s days Annual Leave left.';

$lang->leave->reviewStatusList['pass']   = 'Pass';
$lang->leave->reviewStatusList['reject'] = 'Reject';

$lang->leave->settings = new stdclass();
$lang->leave->settings->setReviewer    = "Reviewer|leave|setreviewer";
$lang->leave->settings->personalAnnual = "Annual leave|leave|personalannual";
