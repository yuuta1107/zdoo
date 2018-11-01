<?php
/**
 * The browse view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     refund
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<div class='panel xuanxuan-card'>
  <table class='table table-hover table-striped tablesorter table-data table-fixed text-center' id='refundTable'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "date=$date&type=&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->refund->name);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->refund->category);?></th>
        <th class='w-100px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->refund->money);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->refund->status);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('createdBy', $orderBy, $vars, $lang->refund->createdBy);?></th>
      </tr>
    </thead>
    <?php foreach($refunds as $refund):?>
    <tr id='refund<?php echo $refund->id;?>' data-url='<?php echo $this->createLink('refund', 'view', "refundID={$refund->id}&mode={$mode}");?>'>
      <td class='text-left' title='<?php echo $refund->name;?>'><?php echo $refund->name;?></td>
      <td class='text-left' title='<?php echo zget($categories, $refund->category);?>'><?php echo zget($categories, $refund->category, ' ');?></td>
      <td class='text-right'><?php echo zget($currencySign, $refund->currency) . $refund->money;?></td>
      <td class='refund-<?php echo $refund->status?>' title='<?php echo $refund->statusLabel;?>'><?php echo $refund->statusLabel;?></td>
      <td><?php echo zget($userPairs, $refund->createdBy);?></td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class='table-footer'>
    <?php $totalMoney = $this->refund->total($refunds);?>
    <?php if($totalMoney):?>
    <div class='pull-left text-danger'><?php echo $lang->refund->total . $totalMoney;?></div>
    <?php endif;?>
    <?php $pager->show($align = 'right', $type = 'short');?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
