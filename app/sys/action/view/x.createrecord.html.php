<?php
/**
 * The create record view file of action module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     action
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::import($jsRoot . 'date.js');?>
<?php js::set('customer', $customer);?>
<?php js::set('objectType', $objectType);?>
<?php js::set('objectID', $objectID);?>
<?php js::set('history', $history);?>
<form method='post' id='createRecordForm' action='<?php echo inlink('createrecord', "objectType={$objectType}&objectID={$objectID}")?>' class='form'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->action->record->title;?></strong>
    </div>
    <table class='table table-form table-condensed'>
      <?php if($objectType != 'contact'):?>
      <tr>
        <th class='w-80px'><?php echo $lang->action->record->contact;?></th>
        <td>
          <div class='required required-wrapper'></div>
          <div class='input-group'>
            <select id='contact' name='contact' class='form-control chosen'>
              <option></option>
              <?php foreach($contacts as $contact):?>
              <?php 
              $phone  = $contact->phone;
              $mobile = $contact->mobile;
              $phone  = empty($phone) ? $mobile : (empty($mobile) ? $phone : $phone . $lang->slash . $mobile);
              $optionPinyin = zget($pinyinContacts, $contact->realname, '');
              ?>
              <option value='<?php echo $contact->id;?>' data-phone='<?php echo $phone;?>' data-qq='<?php echo $contact->qq;?>' data-email='<?php echo $contact->email;?>' data-keys='<?php echo $optionPinyin;?>'><?php echo $contact->realname;?></option>
              <?php endforeach;?>
            </select>
            <?php echo html::input('realname', '', "class='form-control' style='display:none'");?>
            <?php if($objectType == 'customer'):?>
            <?php $style = $isCustomer ? '' : "style='min-width: 60px'";?>
            <span class='input-group-addon' <?php echo $style;?>>
              <?php echo html::checkbox('createContact', array(1 => $lang->action->createContact), '');?>
              <?php if($isCustomer) echo html::checkbox('objectType', array('order' => $lang->action->record->order, 'contract' => $lang->action->record->contract), '');?>
            </span>
            <?php endif;?>
          </div>
        </td>
        <th class='w-20px'></th>
      </tr>
      <tr id='phoneTR' class='hide'>
        <th><?php echo $lang->contact->contactInfo;?></th>
        <td id='phoneTD'></td>
      </tr>
      <tr>
        <th><?php echo $lang->action->record->date;?></th>
        <td><?php echo html::input('date', date('Y-m-d H:i:s'), "class='form-control form-datetime'");?></td>
      </tr>
      <?php elseif(!empty($customers)):?>
      <tr>
        <th class='w-80px'><?php echo $lang->action->record->customer;?></th>
        <td><?php echo html::select('customer', $customers, '', "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->action->record->date;?></th>
        <td><?php echo html::input('date', date('Y-m-d H:i:s'), "class='form-control form-datetime'");?></td>
      </tr>
      <?php endif;?>
      <?php if($isCustomer):?>
      <tr style='display:none'>
        <th><?php echo $lang->action->record->contract;?></th>
        <td><?php echo html::select('contract', $contracts, '', "class='form-control chosen'");?></td>
      </tr>
      <tr style='display:none'>
        <th><?php echo $lang->action->record->order;?></th>
        <td><?php echo html::select('order', $orders, '', "class='form-control'");?></td>
      </tr>
      <?php endif;?>
      <tr>
        <th><?php echo $lang->action->record->comment;?></th>
        <td>
          <div class='required required-wrapper'></div>
          <?php echo html::textarea('comment', '', "class='form-control' rows='3'");?>
        </td>
      </tr>
      <?php if(commonModel::hasPriv('file', 'upload')):?>
      <tr>
        <th>
          <?php echo $lang->action->record->file;?>
          <span class='text-danger'><?php echo '(' . $config->file->maxSize / 1024 / 1024 . 'M)';?>
        </th>
        <td><?php echo $this->fetch('file', 'buildForm', "fileCount=1");?></td>
      </tr>
      <?php endif;?>
    </table>
  </div>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->action->record->next;?></strong>
    </div>
    <table class='table table-form table-condensed'>
      <?php if($objectType != 'contact' && $objectType != 'leads'):?>
      <tr>
        <th class='w-80px'><?php echo $lang->action->record->contact;?></th>
        <td><?php echo html::select('nextContact', array('ditto' => $lang->action->record->sameContact) + $contactPairs, '', "class='form-control chosen'");?></td>
      </tr>
      <?php endif;?>
      <tr>
        <th class='w-80px'><?php echo $lang->action->record->contactedBy;?></th>
        <td><?php echo html::select('contactedBy', $users, $this->app->user->account, "class='form-control chosen'");?></td>
        <th class='w-20px'></th>
      </tr>
      <tr>
        <th><?php echo $lang->action->date;?></th>
        <td><?php echo html::input('nextDate', '', "class='form-control form-date'");?></td>
      </tr>
      <tr>
        <th colspan='2'><?php echo html::radio('delta', $lang->action->nextContactList , '', "onclick='computeNextDate(this.value)'");?></th>
      </tr>
      <tr>
        <th><?php echo $lang->action->record->desc;?></th>
        <td><?php echo html::textarea('desc', '', "rows='3' class='form-control'");?></td>
      </tr>
    </table>
  </div>
  <div class='page-actions'>
    <?php if($objectType == 'contact') echo html::hidden('contact', $objectID);?>
    <?php if($objectType == 'contact' && empty($customers)) echo html::hidden('date', date(DT_DATETIME1));?>
    <?php echo html::submitButton() . html::hidden('customer', $customer);?>
    <div id='duplicateError' class='hide'></div>
  </div>
  <?php if($history):?>
  <div id='actionBox'></div>
  <?php endif;?>
</form>
<div class='errorMessage hide'>
  <div class='alert alert-danger alert-dismissable'>
    <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
    <button type='submit' class='btn btn-default' id='continueSubmit'><?php echo $lang->continueSave;?></button>
  </div>
</div>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
