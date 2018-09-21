<?php
/**
 * The browse view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<div class='panel xuanxuan-card'>
  <table class='table table-hover table-striped table-bordered tablesorter table-data table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "mode={$mode}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='text-left'><?php commonModel::printOrderLink('customer', $orderBy, $vars, $lang->order->customer);?></th>
        <th class='w-130px'><?php commonModel::printOrderLink('product', $orderBy, $vars, $lang->order->product);?></th>
        <th class='w-90px'><?php commonModel::printOrderLink('real', $orderBy, $vars, $lang->order->real);?></th>
        <th class='w-60px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->order->status);?></th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($orders)) foreach($orders as $order):?>
      <?php $status = $order->status != 'closed' ? "order-{$order->status}" : "order-{$order->closedReason}"?>
      <tr class='text-center' data-url='<?php echo $this->createLink('order', 'view', "orderID=$order->id");?>'>
        <?php $products = ''; foreach($order->products as $product) $products .= $product . ' ';?>
        <td class='text-left' title='<?php echo $order->customerName;?>'><?php echo $order->customerName;?></td>
        <td title='<?php echo $products;?>'><?php echo $products;?></td>
        <td class='text-right'><?php echo zget($currencySign, $order->currency, '') . formatMoney($order->real);?></td>
        <td class="<?php echo $status;?>">
          <?php if($order->status != 'closed') echo isset($lang->order->statusList[$order->status]) ? $lang->order->statusList[$order->status] : $order->status;?>
          <?php if($order->status == 'closed') echo $lang->order->closedReasonList[$order->closedReason];?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'>
    <?php if(isset($totalAmount)):?>
    <div class='pull-left text-danger'>
      <?php if(!empty($totalAmount)) printf($lang->order->totalAmount, implode('，', $totalAmount['plan']), implode('，', $totalAmount['real']));?>
    </div>
    <?php endif;?>
    <?php $pager->show($align='right', $type = 'short');?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
