<?php
/**
 * The browse view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     contract
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<div class='panel xuanxuan-card'>
  <table class='table table-hover table-striped table-bordered tablesorter table-data table-fixed' id='contractList'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "mode={$mode}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='w-80px'><?php commonModel::printOrderLink('code',     $orderBy, $vars, $lang->contract->code);?></th>
        <th>               <?php commonModel::printOrderLink('name',     $orderBy, $vars, $lang->contract->name);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('amount',   $orderBy, $vars, $lang->contract->amount);?></th>
        <th class='w-70px'><?php commonModel::printOrderLink('return',   $orderBy, $vars, $lang->contract->return);?></th>
        <th class='w-70px'><?php commonModel::printOrderLink('delivery', $orderBy, $vars, $lang->contract->delivery);?></th>
        <th class='w-60px'><?php commonModel::printOrderLink('status',   $orderBy, $vars, $lang->contract->status);?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($contracts as $contract):?>
      <tr class='text-center' data-url='<?php echo inlink('view', "contractID=$contract->id"); ?>'>
        <td class='text-left' title='<?php echo $contract->code;?>'><?php echo $contract->code;?></td>
        <td class='text-left' title='<?php echo $contract->name;?>'><?php echo $contract->name;?></td>
        <td class='text-right'><?php echo zget($currencySign, $contract->currency, '') . formatMoney($contract->amount);?></td>
        <td><?php echo $lang->contract->returnList[$contract->return];?></td>
        <td><?php echo $lang->contract->deliveryList[$contract->delivery];?></td>
        <td class='<?php echo "contract-{$contract->status}";?>'><?php echo $lang->contract->statusList[$contract->status];?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'>
    <?php $pager->show($align = 'right', $type = 'short');?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
