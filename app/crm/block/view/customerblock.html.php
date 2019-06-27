<?php
/**
 * The customer block view file of block module of RanZhi.
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
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-customer'>
    <thead>
      <tr>
        <th><?php echo $lang->customer->name;?></th>
        <?php if($longBlock):?>
        <th class='w-70px text-center'><?php echo $lang->customer->level;?></th>
        <?php endif;?>
        <th class='w-70px text-center'><?php echo $lang->customer->status;?></th>
        <th class='w-100px'><?php echo $lang->customer->nextDate;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($customers as $id => $customer):?>
      <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
      <tr data-url='<?php echo $this->createLink('crm.customer', 'view', "id=$id");?>' <?php echo $appid;?>>
        <td class='nobr'><?php echo $customer->name;?></td>
        <?php if($longBlock):?>
        <td class='text-center'><?php echo zget($lang->customer->levelNameList, $customer->level);?></td>
        <?php endif;?>
        <td class='text-center'><?php echo zget($lang->customer->statusList, $customer->status);?></td>
        <td><?php echo formatTime($customer->nextDate, DT_DATE1);?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
