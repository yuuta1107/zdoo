<?php
/**
 * The order block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<div class='panel-body has-table'>
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-order'>
    <thead>
      <tr>
        <th><?php echo $lang->order->name;?></th>
        <th class='w-90px'><?php echo $lang->order->amount;?></th>
        <th class='w-70px'><?php echo $lang->order->status;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($orders as $id => $order):?>
      <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
      <tr data-url='<?php echo $this->createLink('crm.order', 'view', "orderID=$id"); ?>' <?php echo $appid?>>
        <td><?php echo $order->name;?></td>
        <td><?php echo zget($currencySign, $order->currency, '') . ($order->real == '0.00' ? $order->plan : $order->real);?></td>
        <td><?php echo zget($lang->order->statusList, $order->status, '');?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
