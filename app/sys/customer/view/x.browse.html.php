<?php
/**
 * The browse view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<div class='panel xuanxuan-card'>
  <form id='browseForm' method='post' action='<?php echo inlink('batchAssign');?>'>
    <table class='table table-hover table-striped table-bordered tablesorter table-data table-fixed table-fixedHeader'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "mode={$mode}&param=&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
          <th class='w-60px'> <?php commonModel::printOrderLink('id',     $orderBy, $vars, $lang->customer->id);?></th>
          <th>                <?php commonModel::printOrderLink('name',   $orderBy, $vars, $lang->customer->name);?></th>
          <th class='w-70px'> <?php commonModel::printOrderLink('assignedTo', $orderBy, $vars, $lang->customer->assignedTo);?></th>
          <th class='w-60px'> <?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->customer->status);?></th>
          <?php
          /* The next date is searched from the table crm_dating, so use date instead of nextDate to avoid occur errors when order by this field. */
          $date = strpos(',past,today,tomorrow,thisweek,thismonth,', ",{$mode},") != false ? 'date' : 'nextDate';
          ?>
          <th class='w-100px'><?php commonModel::printOrderLink($date, $orderBy, $vars, $lang->customer->nextDate);?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($customers as $customer):?>
        <tr class='text-center'>
          <?php if(commonModel::hasPriv('customer', 'batchAssign')):?>
          <td><?php echo html::checkbox('customerIDList', array($customer->id => $customer->id));?></td>
          <?php else:?>
          <td><?php echo $customer->id;?></td>
          <?php endif;?>
          <td class='text-left' title='<?php echo $customer->name;?>'><?php if(!commonModel::printLink('customer', 'view', "customerID={$customer->id}", $customer->name)) echo $customer->name;?></td>
          <td><?php if(isset($users[$customer->assignedTo])) echo $users[$customer->assignedTo];?></td>
          <td class='<?php echo "customer-{$customer->status}";?>'><?php if($customer->status) echo $lang->customer->statusList[$customer->status];?></td>
          <td><?php echo formatTime($customer->nextDate, DT_DATE1);?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'>
      <?php if($customers && commonModel::hasPriv('customer', 'batchAssign')):?>
      <div class='pull-left batch-actions'>
        <div class='pull-left'><?php echo html::selectButton();?></div>
          <div class='input-group assign-action'>
            <?php echo html::select('assignedTo', $validUsers, '', "class='form-control chosen'");?>
            <span class='input-group-btn'><?php echo html::a('#', $lang->customer->assign, "class='btn btn-primary batchAssign'");?></span>
        </div>
      </div>
      <?php endif;?>
      <?php $pager->show($align = 'right', $type = 'short');?>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
