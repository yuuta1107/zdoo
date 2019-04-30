<?php
/**
 * The reimburse view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('createtrade', "type={$type}&refundID={$refundID}")?>'>
  <?php if($type == 'single'):?>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->trade->depositor;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select("depositor[$refund->id]", $depositorList, isset($this->config->refund->depositor) ? $this->config->refund->depositor : '', "class='form-control chosen'");?>
      </td>
      <td class='w-20px'></td>
    </tr>
    <tr>
      <th class='w-60px'><?php echo $lang->trade->category;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select("category[$refund->id]", $categoryList, $refund->category, "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->dept;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select("dept[$refund->id]", $deptList, $refund->dept, "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->money;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::input("money[$refund->id]", $refund->money, "class='form-control' readonly");?>
          <span class='input-group-addon'><?php echo zget($lang->currencyList, $refund->currency, $refund->currency);?></span>
        </div>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->handlers;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select("handlers[$refund->id][]", $userList, $refund->related, "class='form-control chosen' multiple");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->desc;?></th>
      <td><?php echo html::textarea("desc[$refund->id]", $refund->name . ($refund->desc ? "\n" . $refund->desc : ''), "rows='3' class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
  <?php else:?>
  <div class='panel'>
    <table class='table table-condensed table-hover'>
      <thead>
        <tr>
          <th class='w-160px'><?php echo $lang->trade->depositor;?></th>
          <th class='w-160px'><?php echo $lang->trade->category;?></th>
          <th class='w-160px'><?php echo $lang->trade->dept;?></th>
          <th class='w-160px'><?php echo $lang->trade->money;?></th>
          <th class='w-160px'><?php echo $lang->trade->handlers;?></th>
          <th><?php echo $lang->trade->desc;?></th>
        </tr>
      </thead>
      <?php foreach($refundList as $refund):?>
      <tr>
        <td><?php echo html::select("depositor[$refund->id]", $depositorList, isset($this->config->refund->depositor) ? $this->config->refund->depositor : '', "class='form-control chosen'");?></td>
        <td><?php echo html::select("category[$refund->id]", $categoryList, $refund->category, "class='form-control chosen'");?></td>
        <td><?php echo html::select("dept[$refund->id]", $deptList, $refund->dept, "class='form-control chosen'");?></td>
        <td>
          <div class='input-group'>
            <?php echo html::input("money[$refund->id]", $refund->money, "class='form-control' readonly");?>
            <span class='input-group-addon'><?php echo zget($lang->currencyList, $refund->currency, $refund->currency);?></span>
          </div>
        </td>
        <td><?php echo html::select("handlers[$refund->id][]", $userList, $refund->related, "class='form-control chosen' multiple");?></td>
        <td><?php echo html::textarea("desc[$refund->id]", $refund->name . ($refund->desc ? "\n" . $refund->desc : ''), "rows='1' class='form-control'");?></td>
      </tr>
      <?php endforeach;?>
      <tr>
        <td colspan='6' class='text-center'><?php echo html::submitButton();?></td>
      </tr>
    </table>
  </div>
  <?php endif;?>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
