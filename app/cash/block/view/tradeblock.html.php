<?php
/**
 * The trade block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<div class='panel-body has-table scrollbar-hover'>
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-trade'>
    <thead>
      <tr>
        <?php if($longBlock):?>
        <th><?php echo $lang->trade->trader;?></th>
        <th>
          <?php if($type != 'out'):?>
          <?php echo $lang->trade->product . $lang->slash . $lang->trade->category;?>
          <?php else:?>
          <?php echo $lang->trade->category;?>
          <?php endif;?>
        </th>
        <?php endif;?>
        <th class='w-100px'><?php echo $lang->trade->depositor;?></th>
        <th class='w-60px text-center'><?php echo $lang->trade->type;?></th>
        <th class='w-120px text-right'><?php echo $lang->trade->money;?></th>
        <th class='w-100px text-center'><?php echo $lang->trade->date;?></th>
      </tr>
    </thead>
    <tbody>
      <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
      <?php foreach($trades as $id => $trade):?>
      <?php 
      $trader   = zget($customerList, $trade->trader, '');
      $product  = zget($productList, $trade->product, '');
      $category = zget($categories, $trade->category, '');
      $product  = $product ? $product . $lang->slash . $category : $category;
      ?>
      <tr>
        <?php if($longBlock):?>
        <td title='<?php echo $trader;?>'><?php echo $trader;?></td>
        <?php if($trade->type == 'in'):?>
        <td title='<?php echo $product;?>'><?php echo $product;?></td>
        <?php else:?>
        <td class='text-nowrap text-ellipsis' title='<?php echo $category;?>'><?php echo $category;?></td>
        <?php endif;?>
        <?php endif;?>
        <td><?php echo zget($depositorList, $trade->depositor);?></td>
        <td class='text-center'><?php echo zget($lang->trade->typeList, $trade->type);?></td>
        <td class='text-right'><?php echo zget($currencySign, $trade->currency) . $trade->money?></td>
        <td class='text-center'><?php echo formatTime($trade->date, DT_DATE1);?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
