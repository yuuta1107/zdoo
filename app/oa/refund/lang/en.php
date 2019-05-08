<?php
if(!isset($lang->refund)) $lang->refund = new stdclass();
$lang->refund->common       = 'Reimbursement';
$lang->refund->create       = 'Create';
$lang->refund->browse       = 'List';
$lang->refund->personal     = 'My Reimbursement';
$lang->refund->company      = 'All Reimbursement';
$lang->refund->todo         = 'Pending Reimbursement';
$lang->refund->browseReview = 'Review';
$lang->refund->edit         = 'Edit';
$lang->refund->view         = 'View';
$lang->refund->delete       = 'Delete';
$lang->refund->review       = 'Review';
$lang->refund->detail       = 'Detail';
$lang->refund->reimburse    = 'Reimburse';
$lang->refund->cancel       = 'Cancel';
$lang->refund->commit       = 'Submit';
$lang->refund->settings     = 'Settings';
$lang->refund->setReviewer  = 'Set Reviewer';
$lang->refund->setCategory  = 'Set Category';
$lang->refund->setDepositor = 'Set Account';
$lang->refund->setRefundBy  = 'Set RefundBy';
$lang->refund->export       = 'Export';
$lang->refund->createTrade  = 'Create Trade';

$lang->refund->id               = 'ID';
$lang->refund->customer         = 'Customer';
$lang->refund->order            = 'Order';
$lang->refund->contract         = 'contract';
$lang->refund->project          = 'Project';
$lang->refund->dept             = 'Department';
$lang->refund->name             = 'Name';
$lang->refund->payee            = 'Payee';
$lang->refund->category         = 'Category';
$lang->refund->date             = 'Date';
$lang->refund->money            = 'Amount';
$lang->refund->invoice          = 'Invoice';
$lang->refund->currency         = 'Currency';
$lang->refund->desc             = 'Description';
$lang->refund->related          = 'Involved';
$lang->refund->status           = 'Status';
$lang->refund->createdBy        = 'Created by';
$lang->refund->createdDate      = 'Created';
$lang->refund->editedBy         = 'Edited By';
$lang->refund->editedDate       = 'Edited';
$lang->refund->firstReviewer    = '1st Reviewer';
$lang->refund->firstReviewDate  = '1st Review';
$lang->refund->secondReviewer   = '2nd Reviewer';
$lang->refund->secondReviewDate = '2nd Review';
$lang->refund->refundBy         = 'Reimbursed by';
$lang->refund->refundDate       = 'Reimbursed';
$lang->refund->reason           = 'Reason';
$lang->refund->expenseType      = 'Expense Type';
$lang->refund->reviewer         = 'Reviewer';
$lang->refund->depositor        = 'Account';
$lang->refund->reviewMoney      = 'Reimburse';
$lang->refund->files            = 'File';
$lang->refund->baseInfo         = 'Basic Info';

$lang->refund->objectTypeList['customer'] = 'Customer';
$lang->refund->objectTypeList['order']    = 'Order';
$lang->refund->objectTypeList['contract'] = 'Contract';
$lang->refund->objectTypeList['project']  = 'Project';

$lang->refund->statusList['draft']  = 'Draft';
$lang->refund->statusList['wait']   = 'Wait';
$lang->refund->statusList['doing']  = 'Doing';
$lang->refund->statusList['pass']   = 'Passed';
$lang->refund->statusList['reject'] = 'Rejected';
$lang->refund->statusList['finish'] = 'Finished';

$lang->refund->reviewStatusList['pass']   = 'Pass';
$lang->refund->reviewStatusList['reject'] = 'Reject';

$lang->refund->reviewAllStatusList['allpass']   = 'Pass All';
$lang->refund->reviewAllStatusList['allreject'] = 'Reject All';

$lang->refund->descTip = "%s requested %s.";

$lang->refund->notExist          = 'The record does not exist.';
$lang->refund->cancelSuccess     = 'Canceled.';
$lang->refund->commitSuccess     = 'Submitted.';
$lang->refund->uniqueReviewer    = 'The 1st reviewer and the 2nd reviewer should not be the same.';
$lang->refund->createTradeTip    = 'Create Trade';
$lang->refund->secondReviewerTip = 'If reimbursement requires a 2nd review. Please set a 2nd reviewer.';
$lang->refund->correctMoney      = 'The reimbursed amount should be < = the requested amount.';
$lang->refund->categoryTips      = 'Expense category is not set yet.';
$lang->refund->setExpense        = 'Set Category';
$lang->refund->moneyTip          = 'If the amount is < the settings, only 1st review is required. If not, a 2nd review is required.';
$lang->refund->total             = 'Total:';
$lang->refund->totalMoney        = '%s%s；';
$lang->refund->reviewing         = 'Waiting for <strong>%s</strong>';
$lang->refund->reviewed          = 'Review Finished';

$lang->refund->settings = new stdclass();
$lang->refund->settings->setReviewer  = "Reviewer|refund|setreviewer";
$lang->refund->settings->setCategory  = "Category|refund|setcategory";
$lang->refund->settings->setDepositor = "Account|refund|setdepositor";
$lang->refund->settings->setRefundBy  = "ReimbursedBy|refund|setrefundby";

/* Width settings for different languages, in pixels. */
$lang->refund->ActionWidth         = 60;
$lang->refund->todoActionWidth     = 160;
$lang->refund->personalActionWidth = 180;
$lang->refund->reviewActionWidth   = 100;
